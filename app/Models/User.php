<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function userHasPosts() {
        return $this->hasMany(BlogPost::class);
    }

 
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }
    

    public static function create(array $attributes = [])
    {
        // Encrypt the password before storing it
        $attributes['password'] = bcrypt($attributes['password']);
    
        // Create a new Etudiant record and associate it with the User record
        $etudiant = Etudiant::create([
            'nom' => $attributes['name'],
            'adresse' => null,
            'phone' => null,
            'email' => $attributes['email'],
            'date_de_naissance' => null,
            'ville_id' => 0,
        ]);
    
        $attributes['etudiant_id'] = $etudiant->id;
    
        return static::query()->create($attributes);
    }
    
    
}