<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use \DateTimeInterface;

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
        'photo',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that define directory for uploaded files of this model.
     * @var string
     */
    public static string $FILE_DESTINATION = 'uploaded/profile-pictures';

    /**
     * The class attributes that define roles that can be assigned to this model.
     * @var string
     */
    public static string $ROLE_ADMIN = 'admin';
    public static string $ROLE_SUPERVISOR = 'supervisor';
    public static string $ROLE_USER = 'user';

    /**
     * Check password given by user with the encrypted password
     * from user that is found using the already found email.
     *
     * @param $password
     * @return bool
     */
    public static function checkPassword($password, $encryptedPassword): bool
    {
        return Hash::check($password, $encryptedPassword);
    }


    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        /*return $date->format('d M Y, H:i:s');*/
        $long = strtotime($date->format('Y-m-d H:i:s'));
        return (string)$long;
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->foto_profil);
    }
}
