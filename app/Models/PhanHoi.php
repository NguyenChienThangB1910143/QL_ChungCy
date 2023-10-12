<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoi extends Model
{
    use HasFactory;
    protected $table = 'phanhoi';
    
    protected $primaryKey = 'id_phanhoi'; 

    protected $fillable = [
        'id_user',
        'id_baocao',
        'tieude',
        'noidung',
        'thoigian'
    ];
    public function baocaosc()
{
    return $this->belongsTo(BaoCaoSC::class, 'id_baocao');
}

}
