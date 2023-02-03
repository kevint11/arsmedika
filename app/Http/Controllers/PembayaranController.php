<?php

namespace App\Http\Controllers;

use App\Events\PembayaranEvent;
use App\Models\DataPasien;
use App\Models\DetailPembayaran;
use App\Models\HistoryPembayaran;
use App\Models\KartuPasien;
use App\Models\Layanan;
use App\Models\Pembayaran;
use App\Models\SaldoLayanan;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function dataDiri(Request $request)
    { 
        $validation = Validator::make($request->all(), [
            'nik_id' => ['required', 'integer', 'regex:/^[0-9]{16}$/', 'unique:user'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
        ],
        [
            'nik_id.required' => 'NIK anda belum di isi', 
            'tempat_lahir.required' => 'Tempat lahir anda belum di isi', 
            'tanggal_lahir.required' => 'Tanggal lahir anda belum di isi', 
            'jenis_kelamin.required' => 'Jenis kelamin anda belum di isi',  
            'nik_id.regex' => 'Format NIK tidak sesuai, harus 16 digit angka',
            'nik_id.unique' => 'NIK ini sudah terdaftar',  
            'nik_id.integer' => 'NIK harus berupa angka', 
        ]);

        // $validation = $request->validate([
        //     'nik_id'=>['required', 'integer', 'regex:/^[0-9]{16}$/', 'unique:user'],
        //     'jenis_kelamin' => ['required'],
        //     'tempat_lahir' => ['required'],
        //     'tanggal_lahir' => ['required'],
        // ]);

        $user = User::where('id', auth()->user()->id)->first();
        $pasien = DataPasien::where('user_id', auth()->user()->id)->first();

        try {
            
            $user->update([
                'nik_id'=>$validation['nik_id']
            ]);

            $pasien->update([
                'nik'=>$validation['nik_id'],
                'jenis_kelamin' => $validation['jenis_kelamin'],
                'tempat_lahir' => $validation['tempat_lahir'],
                'tanggal_lahir' => $validation['tanggal_lahir'],
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Ada Kesalahan Sistem');
        }

        return redirect()->route('Detail Layanan');
    }

    public function dataKartu(Request $request)
    { 
        $validation = $request->validate([
            'nik_id'=>['required', 'integer', 'min:15', 'unique:user'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'kelas'=>['required'],
            'kode_pembayaran'=>['required'],
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        $pasien = DataPasien::where('user_id', auth()->user()->id)->first();
        $layanan = Layanan::where('kelas', $validation['kelas'])->get();

        try {
            
            $user->update([
                'nik_id'=>$validation['nik_id'],
                'status'=>'Aktif'
            ]);

            $pasien->update([
                'nik'=>$validation['nik_id'],
                'jenis_kelamin' => $validation['jenis_kelamin'],
                'tempat_lahir' => $validation['tempat_lahir'],
                'tanggal_lahir' => $validation['tanggal_lahir'],
            ]);

            $kartu = KartuPasien::create([
                'nik_id'=>$validation['nik_id'],
                'kelas'=>$validation['kelas'],
                'tanggal_aktif'=>date("Y-m-d"),
                'tanggal_kadaluarsa'=>Carbon::createFromFormat('Y-m-d', date("Y-m-d"))->addYears(3),
                'status'=>'Aktif',
            ]);

            foreach($layanan as $v){
                SaldoLayanan::create([
                    'kartu_id'=>$kartu->id,
                    'layanan_id'=>$v->id,
                    'kode_layanan'=>$v->kode,
                    'pembayaran'=>0,
                    'sisa_saldo'=>$v->harga,
                    'penggunaan'=>0,
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Ada Kesalahan');
        }

        return redirect()->route('Detail Layanan');
    }

    public function kelasLayanan(Request $request)
    { 
        $validation = $request->validate([
            'kelas'=>'required',
            'kode_pembayaran'=>'required',
        ]);

        $user = User::where('nik_id', auth()->user()->nik_id)->first();
        $layanan = Layanan::where('kelas', $validation['kelas'])->get();

        try {
            
            $user->update(['status'=>'Aktif']);

            $kartu = KartuPasien::create([
                'nik_id'=>auth()->user()->nik_id,
                'kelas'=>$validation['kelas'],
                'tanggal_aktif'=>date("Y-m-d"),
                'tanggal_kadaluarsa'=>Carbon::createFromFormat('Y-m-d', date("Y-m-d"))->addYears(3),
                'status'=>'Aktif',
            ]);

            foreach($layanan as $v){
                SaldoLayanan::create([
                    'kartu_id'=>$kartu->id,
                    'layanan_id'=>$v->id,
                    'kode_layanan'=>$v->kode,
                    'pembayaran'=>0,
                    'sisa_saldo'=>$v->harga,
                    'penggunaan'=>0,
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Ada Kesalahan');
        }

        return redirect()->route('Detail Layanan');
    }

    public function pembayaran()
    { 
        $this->middleware(['auth', 'permission:pembayaran']);
        return view('layanan.payment');
    }

    public function confirmPembayaran(Request $request)
    {
        $this->middleware(['auth', 'permission:confirmPembayaran']);
        
        $layananReq = $request->only('RIKAM','RIKDU','RIKDS','RIICU','RIPOK','RIPOB','RIANK','RIAMB','RILAB','RIOBT','PREMI');

        $validation = $request->validate([
            'nik_id'=>'required',
            'kode_kwitansi'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'RIKAM'=>'required_with:qRIKAM',
            'RIKDU'=>'required_with:qRIKDU',
            'RIKDS'=>'required_with:qRIKDS',
            'RIICU'=>'required_with:qRIICU',
            'RIPOK'=>'required_with:qRIPOK',
            'RIPOB'=>'required_with:qRIPOB',
            'RIAMB'=>'required_with:qRIAMB',
            'qRIKAM'=>'required_with:RIKAM',
            'qRIKDU'=>'required_with:RIKDU',
            'qRIKDS'=>'required_with:RIKDS',
            'qRIICU'=>'required_with:RIICU',
            'qRIPOK'=>'required_with:RIPOK',
            'qRIPOB'=>'required_with:RIPOB',
            'qRIAMB'=>'required_with:RIAMB',
        ],[
            'RIAMB.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'RIKAM.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'RIKDU.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'RIKDS.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'RIICU.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'RIPOK.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'RIPOB.required_with'=>'Nominal pembayaran ini harus di isi jika input jumlahnya terisi.',
            'qRIAMB.required_with'=>'Harus isi jumlah kejadian ambulans.',
            'qRIKAM.required_with'=>'Harus isi jumlah hari pemakaian kamar.',
            'qRIKDU.required_with'=>'Harus isi jumlah kunjungan dokter umum.',
            'qRIKDS.required_with'=>'Harus isi jumlah kunjungan dokter spesialis.',
            'qRIICU.required_with'=>'Harus isi jumlah hari di ICU/NIICU.',
            'qRIPOK.required_with'=>'Harus isi jumlah operasi kecil.',
            'qRIPOB.required_with'=>'Harus isi jumlah operasi besar.',
        ]);

        $kartu = KartuPasien::where('nik_id', $validation['nik_id'])->first();
        $layanan = Layanan::where('kelas', $kartu->kelas)->get();
        $saldo = SaldoLayanan::where('kartu_id', $kartu->id)->get();

        DB::beginTransaction();
        $return_status = 'Valid';

        try {
            $pembayaran = Pembayaran::create([
                'kartu_id'=>$kartu->id,
                'kode_kwitansi'=>request('kode_kwitansi'),
                'total_biaya'=>0,
                'total_potongan'=>0,
                'biaya_akhir'=>0,
            ]);

            $biaya = $potongan = $akhir = 0;
            
            foreach($layananReq as $kode=>$harga){
                
                if(!empty($harga)){

                    $qty = 'q'. $kode;
                    $idLayanan = $layanan->first(function ($item) use($kode){
                        return $item->kode == $kode;
                    });
                    
                    $saldoLayanan = $saldo->first(function ($item) use($idLayanan){
                        return $item->layanan_id == $idLayanan->id;
                    });
                    
                    $potonganSaldo = (int)$saldoLayanan->sisa_saldo;
                    $last_updated = explode(" ", $saldoLayanan->updated_at);
                    
                    if($idLayanan->batas == '90'){
                        if($last_updated[0] < date("Y-m-d")){
                            if(((int)$saldoLayanan->penggunaan + (int)request($qty)) > 90){
                                $hari = 90 - (int)$saldoLayanan->penggunaan;
                                $potonganSaldo = (int)$idLayanan->harga * $hari;
                            } else {
                                $potonganSaldo = (int)$idLayanan->harga * (int)request($qty);
                            }
                        } else if((int)$saldoLayanan->penggunaan >= 90){
                            $potonganSaldo = 0;
                        }
                    } else if($idLayanan->batas == '1'){
                        if($last_updated[0] < date("Y-m-d")){
                            $potonganSaldo = (int)$idLayanan->harga;
                        } 
                    } else if($idLayanan->batas == '0'){
                        $potonganSaldo = (int)$idLayanan->harga * (int)request($qty);
                        if($potonganSaldo > (int)$idLayanan->harga){
                            $potonganSaldo = (int)$idLayanan->harga;
                        }
                    } else if($idLayanan->batas == '365'){
                        $last_create = explode(" ", $saldoLayanan->created_at);
                        $last_created = Carbon::createFromFormat('Y-m-d', $last_create[0])->addYear();

                        if($last_updated[0] > $last_created){
                            $potonganSaldo = (int)$idLayanan->harga;
                        } 
                    }
                    
                    $biaya = $biaya + (int)$harga;
                    $potongan = $potongan + $potonganSaldo;
                    $total = (int)$harga - $potonganSaldo;
                    $akhir = $total + $akhir;
                    $sisaSaldo = $potonganSaldo - (int)$harga;

                    $detail = DetailPembayaran::create([
                        'pembayaran_id'=>$pembayaran->id,
                        'kode_layanan'=>$kode,
                        'quantity'=>request($qty) ?? 0,
                        'biaya'=>(int)$harga,
                        'potongan_harga'=>$potonganSaldo,
                        'biaya_akhir'=> $total < 0 ? 0 : $total,
                    ]);

                    HistoryPembayaran::create([
                        'detail_id'=>$detail->id,
                        'saldo_id'=>$saldoLayanan->id,
                        'pembayaran'=>(int)$harga,
                        'potongan_saldo'=>$potonganSaldo > (int)$harga ? (int)$harga : $potonganSaldo,
                        'sisa_saldo'=>$sisaSaldo < 0 ? 0 : $sisaSaldo,
                    ]);

                    $saldoLayanan->update([
                        'pembayaran'=>(int)$saldoLayanan->pembayaran + (int)$harga,
                        'sisa_saldo'=> $sisaSaldo < 0 ? 0 : $sisaSaldo,
                        'penggunaan'=>(int)$saldoLayanan->penggunaan + (int)request($qty)
                    ]);

                }
            }
            
            $pembayaran->update(['total_biaya'=>$biaya, 'total_potongan'=>$potongan, 'biaya_akhir'=>$akhir]);
            event(new PembayaranEvent($pembayaran, 'created'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Ada Kesalahan');
        }
        
        return redirect()->route('Daftar Layanan')->with('success','Pembayaran Sukses');
    }
}
