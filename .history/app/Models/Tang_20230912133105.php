<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tang extends Model
{
    use HasFactory;
    protected $table = 'tang';
    
    protected $primaryKey = 'id_tang'; 

    protected $fillable = [
        'ten',
        'id_toa'
    ];
    public function tang_phong()
    {
        return $this->hasMany(Phong::class, 'id_tang', 'id_tang');
    }
    public function tang_toa()
    {
        return $this->hasOne(Toa::class, 'id_toa', 'id_toa');
    }
}
