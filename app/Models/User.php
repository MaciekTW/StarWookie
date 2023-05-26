<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Classes\Collection;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    private $collection;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->collection = new Collection($this);
    }

    protected $attributes = [
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
            'favCharacter' => $data['favCharacter'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $user->collection()->addToCollection(Item::getItemName($user->favCharacter));

        return $user;
    }


    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_user', 'user_id', 'item_id', );
    }

    public function collection(): Collection
    {
        return $this->collection;
    }


    public function getPathToProfilePhoto()
    {
        if( !$this->customAvatar)
        {
            $this->image=Item::getItemPhotoByName($this->favCharacter);
        }
        return $this->image;
    }

    public function getFavCharacter()
    {
        return Item::getItemName($this->favCharacter);
    }


}
