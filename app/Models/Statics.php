<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statics extends Model
{
    use HasFactory;

    protected $table = 'statics'; // optional (Laravel auto-detects)

    protected $fillable = [
        'heading',
        'title',
        'details',
        'image',
    ];
}