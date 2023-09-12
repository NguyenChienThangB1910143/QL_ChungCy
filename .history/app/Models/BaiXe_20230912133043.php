<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiXe extends Model
{
    use HasFactory;
    protected $table= 'baixe';
    protected $primaryKey = 'id_baixe';
    protected $fillable = [
        'ms',
        'loaixe',
        'tinhtrang',
        'gia',
    ];
    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'id_baixe' ,'id_baixe');
    }
}
