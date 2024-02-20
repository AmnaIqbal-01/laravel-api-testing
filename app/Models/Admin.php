<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

final class Admin extends Model
{    use HasApiTokens;
    use HasFactory;
    // use InteractsWithUuid;

    protected $table = 'admins';

    protected $fillable = [
        'username', 'password', 'email',
    ];

    protected $hidden = [
        'password',
    ];

   
    public function checkCredentials(string $name, string $email): bool
    {
        $admin = self::where('email', $email)->where('username', $name)->first();

        if (!$admin) {
            return false;
        }

        return true;
    }
}
