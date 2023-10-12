<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoCaoSC extends Model
{
    use HasFactory;
    protected $table = 'baocaosc';
    
    protected $primaryKey = 'id_baocao'; 

    protected $fillable = [
        'id_user',
        'id_phong',
        'tieude',
        'noidung',
        'thoigian'
    ];
    public function phanhois()
{
    return $this->hasMany(PhanHoi::class, 'id_baocao');
}

}
