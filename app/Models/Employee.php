<?php

declare(strict_types=1);

namespace App\Models;
use App\Models\Admin;

use App\Models\Concerns\InteractsWithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Employee extends Model
{
    use HasFactory;
    use InteractsWithUuid;
    protected $primaryKey = 'employee_id';
    protected $fillable=[
        'admin_id',
        'first_name',
        'last_name',
        'email',
    ];

    protected $hidden = [

    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


}
