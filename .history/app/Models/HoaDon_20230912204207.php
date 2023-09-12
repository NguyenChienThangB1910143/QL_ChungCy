<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id_phong',
        'tiendien',
        'tiennuoc',
        'tienbaixe',
        'khac',
        'thuthem',
        'thanhtien',
        'tinhtrang'
    ];

    public function hoadon_phong()
    {
        return $this->belongsTo(Phong::class, 'id_phong', 'id_phong');
    }


}
