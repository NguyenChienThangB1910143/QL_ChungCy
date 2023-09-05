<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiXe extends Model
{
    use HasFactory;
    protected $table= 'baixe';
    protected $primarykey = 'id_baixe';
    protected $fillable = [
        'tinhtrang',
        'gia',
    ];
}
