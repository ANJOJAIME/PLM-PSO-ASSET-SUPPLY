<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCategory extends Model
{
    use HasFactory;
    protected $table = 'class_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'class_id',
        'category',
    ];
}
