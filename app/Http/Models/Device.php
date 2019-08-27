<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_device';
    protected $fillable = [
        'device_code', 'device_name', 'device_type', 'device_specs', 'device_location', 'device_in', 'device_status'
    ];

    public function borrow()
    {
        return $this->hasOne(Borrow::class);
    }
}
