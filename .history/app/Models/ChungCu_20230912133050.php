<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungCu extends Model
{
    use HasFactory;
    protected $table = 'chungcu';
    
    protected $primaryKey = 'id_chungcu'; 

    protected $fillable = [
        'ten',
        'diachi',
        'sdt',
        'email',
        'chudautu'
    ];
}
