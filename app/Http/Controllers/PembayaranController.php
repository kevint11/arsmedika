<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use App\Models\HistoryPembayaran;
use App\Models\KartuPasien;
use App\Models\Layanan;
use App\Models\Pembayaran;
use App\Models\SaldoLayanan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{

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

            $biaya = $potongan = 0;
            
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
            $total = $biaya - $potongan;
            $pembayaran->update(['total_biaya'=>$biaya, 'total_potongan'=>$potongan, 'biaya_akhir'=>$total < 0 ? 0 : $total]);
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Ada Kesalahan');
        }
        
        return redirect()->route('Daftar Layanan')->with('success','Pembayaran Sukses');
    }
}
