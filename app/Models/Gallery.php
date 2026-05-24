<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery'; // optional (Laravel auto-detects)

    protected $fillable = [
        'heading',
        'title',
        'status',
        'image',
    ];

}