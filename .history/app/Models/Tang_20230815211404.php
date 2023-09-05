<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tang extends Model
{
    use HasFactory;
    protected $table = 'tang';
    
    protected $primarykey = 'id_tang'; 

    protected $fillable = [
        'ten'
    ];
    public function tang_phong()
    {
        return $this->hasMany(Phong::class, 'id_tang', 'id_tang');
    }
}
