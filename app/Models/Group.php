<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'slug',
    ];

    public function countries(): MorphToMany
    {
        return $this->morphedByMany(Country::class, 'groupable');
    }

    public function cities(): MorphToMany
    {
        return $this->morphedByMany(City::class, 'groupable');
    }

}
