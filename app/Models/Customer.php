<?php

declare(strict_types=1);

namespace App\Models;
use App\Models\Admin;

use App\Models\Concerns\InteractsWithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Customer extends Model
{
    use HasFactory;
    use InteractsWithUuid;
    protected $fillable = [
        'admin_id',
        'first_name',
        'last_name',
        'email',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
}
