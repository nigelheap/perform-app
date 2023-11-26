<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperClassSession
 */
class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'expire_at'
    ];


    protected $casts = [
        'expire_at' => 'datetime',
    ];


    protected $appends = [
        'joined'
    ];


    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    /**
     * Interact with the user's address.
     */
    protected function joined(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->users()
                ->where('curso_id', $attributes['id'])
                ->exists(),
        );
    }
}
