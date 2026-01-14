<?php
namespace App\Models;
use SimpleFramework\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = true;
    protected  $fillable = ['name', 'email', 'password'];
    protected $loaded = ['name', 'email', 'password', 'confirmPassword'];
    protected array $rules = [
        'required' => ['name', 'email', 'password', 'confirmPassword'],
        'lengthMin' =>[
            ['password', 5],
        ],
        'lengthMax' =>[
            ['name', 100],
        ],
        'email' => [
            ['email']
        ],
        'equals' => [
            ['password', 'confirmPassword']
        ],
    ];
    protected array $labels = [
        'name' => 'Поле Имя',
        'email' => 'Поле Email',
        'password' => 'Поле Пароль',
        'confirmPassword' => 'Поле Подтверждение пароля',
    ];
}