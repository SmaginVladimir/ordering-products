<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryInstitution extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description"];

    /**
     * @return HasMany
     */
    public function institutions(): HasMany
    {
        return $this->hasMany(Institution::class,"category_id");
    }
}
