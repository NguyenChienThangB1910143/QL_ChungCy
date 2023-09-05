<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;
    protected $table = 'phong';
    
    protected $primaryKey = 'id_phong'; 

    protected $fillable = [
        'id_tang',
        'ten',
        'tinhtrang',
        'gia'
    ];
    public function phong_tang()
    {
        return $this->belongsTo(Tang::class, 'id_tang' ,'id_tang');
    }
    public function phong_hopdong()
    {
        return $this->hasMany(HopDong::class, 'id_phong', 'id_phong');
    }
}
