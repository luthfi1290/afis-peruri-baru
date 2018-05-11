<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MacAddress extends Model
{
    use SoftDeletes;

    protected $table = 'mac_address';
    protected $primaryKey = 'id';
    protected $fillable = ['mac_address','nama_komputer','tipe_akses','aktif'];
    protected $dates = ['deleted_at'];
    
}
