<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'tb_borrow_device';
    protected $fillable = [
        'id_user',
        'crew_name',
        'device_id',
        'borrow_date',
        'back_date',
        'stillBorrowed'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
