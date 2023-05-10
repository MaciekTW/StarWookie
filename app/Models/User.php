<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $attributes = [
        'image' => "Graphics/Pokemons/1.jpg",
        'customAvatar' => false,
    ];

    protected $fillable = [
        'username',
        'email',
        'password',
        'favCharacter',
        'image',
        'customAvatar',
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

    public static function createWithCollection($data): User
    {
        $user = User::create([
            'username' => $data['username'],
            'favPokemon' => $data['favPokemon'],
            'email' => $data['email'],
            'image' => Item::getItemPhotoByName($data['favCharacter']),
            'password' => Hash::make($data['password'])
        ]);

//        $user->collection()->addToCollection(Pokemon::getPokemonByName($user->favPokemon));

        return $user;
    }

}
