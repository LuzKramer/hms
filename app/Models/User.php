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
<<<<<<< HEAD
=======
    protected $table = 'users';
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
=======
        'email_verified_at',
        'remember_token',
        'job',
        'specialization',
        'salary',
        'descript',
        'level',
        'cpf',
        'fone',
        'img',
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
<<<<<<< HEAD
}
=======


     // Define the relationships with other tables
    //public function job()
   // {
    //    return $this->belongsTo(Job::class, 'job');
   // }

   // public function specialization()
    //{
    //    return $this->belongsTo(Specialization::class, 'specialization');
    //}
}

>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
