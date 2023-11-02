<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nuoc extends Model
{
    use HasFactory;
    protected $table = 'nuoc';

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id_phong',
        'chiso_cu',
        'chiso_moi',
        'thoigian',
        'dongia',
        'thanhtien'
    ];

    public function nuoc_phong()
    {
        return $this->belongsTo(Phong::class, 'id_phong', 'id_phong');
    }


}
