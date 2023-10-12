<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';


    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'ngaysinh',
        'email',
        'sdt',
        'password',
        'quyen',
        'STK'
    ];

    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function baocaoscs()
    {
        return $this->hasMany(BaoCaoSC::class, 'id_user');
    }
}
