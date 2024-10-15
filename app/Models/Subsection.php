<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'img',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
