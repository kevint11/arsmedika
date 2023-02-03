<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Xxid
{
    /**
     * Boot function from Laravel
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = 'USER-'. mb_substr((Str::uuid()->toString()), 0, 26) ;
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
