<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toa extends Model
{
    use HasFactory;
    protected $table = 'toa';
    
    protected $primaryKey = 'id_toa'; 

    protected $fillable = [
        'ten'
    ];
    public function toa_tang()
    {
        return $this->hasMany(Tang::class, 'id_toa', 'id_toa');
    }
}
