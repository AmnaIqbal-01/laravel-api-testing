<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\InteractsWithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Task extends Model
{
    use HasFactory;
    use InteractsWithUuid;
    protected $fillable = [
        'customer_id',
        'employee_id',
        'task_description',
        'status',
    ];

    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }

    // public function employee()
    // {
    //     return $this->belongsToMany(Employee::class);
    // }
}
