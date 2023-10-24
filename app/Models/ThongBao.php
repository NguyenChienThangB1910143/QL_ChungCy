<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'thongbao';
    
    protected $primaryKey = 'id_thongbao'; 

    protected $fillable = [
        'id_user',
        'tieude',
        'noidung',
        'thoigian',
        'nhan'
    ];
}
