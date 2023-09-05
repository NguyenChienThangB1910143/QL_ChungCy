<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;
    protected $table = 'hopdong';
    
    protected $primarykey = 'id_hopdong'; 

    protected $fillable = [
        'id_user',
        'id_phong',
        'id_baixe',
        'ngaybatdau',
        'ngayketthuc'
    ];
    public function hopdong_user()
    {
        return $this->hasOne(User::class, 'id_user' ,'id_user');
    }
    public function hopdong_phong()
    {
        return $this->hasOne(Phong::class, 'id_phong' ,'id_phong');
    }
    public function hopdong_baixe()
    {
        return $this->hasMany(BaiXe::class, 'id_baixe' ,'id_baixe');
    }
}
