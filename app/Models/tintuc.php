<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'tieude',
        'id_user',
        'hinhanh',
        'noidung',
        'thoigian',
    ];
    public function tintuc_user()
    {
        return $this->belongsTo(User::class, 'id_user' ,'id');
    }
}
