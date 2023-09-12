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
        'dongia'
    ];

    public function nuoc_phong()
    {
        return $this->belongsTo(Phong::class, 'id_phong', 'id_phong');
    }

    public function getThanhTienAttribute()
    {
        return ($this->chiso_moi - $this->chiso_cu) * $this->dongia;
    }
}
