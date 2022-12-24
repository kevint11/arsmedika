<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Getid
{
    /**
     * Boot function from Laravel
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $id = str_replace("-", "", date("H-i-s-Y-m-d"));
            $random = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $new_id = $model->depan . $id . $model->belakang . $random;
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = $new_id;
            
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
