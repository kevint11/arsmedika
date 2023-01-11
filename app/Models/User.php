<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table= 'user';
    protected $fillable = [
        'password',
        'nik_id',
        'status',
    ];

    protected $primaryKey = 'nik_id';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function biodata(){
        return $this->belongsTo(DataPasien::class,'nik_id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    
    public function spatieRole(){
        return $this->hasOne(ModelHasRoles::class,'model_id');
    }

    
    public function findForPassport($identifier)
    {
        return User::orWhere('nik_id', $identifier)->where('status', 'Aktif')->first();
    }

    public function getRoleId()
    {
        return $this->roles()->first()->id ?? '';        
    }
}
