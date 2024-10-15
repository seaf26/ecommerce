<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['subsection_id', 'name', 'price', 'descraption', 'stock', 'image'];

    public function subsection()
    {
        return $this->belongsTo(Subsection::class);
    }
}
