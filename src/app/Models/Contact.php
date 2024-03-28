<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeContactSearch($query, $search, $gender, $category, $date)
    {
        if (!empty ($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }
        if (!empty ($gender)) {
            $query->where('gender', $gender);
        }
        if (!empty ($category)) {
            $query->where('category_id', $category);
        }
        if (!empty ($date)) {
            $query->whereDate('create_at', $date);
        }
        return $query;
    }
}
