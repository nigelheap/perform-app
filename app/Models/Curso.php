<?php

namespace App\Models;

use App\Enumeration\CursoUserRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

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
        'joined',
        'owner'
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
                ->where('user_id', Auth::id())
                ->exists(),
        );
    }

    /**
     * Interact with the user's address.
     */
    protected function owner(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->users()
                ->where('role', CursoUserRoles::OWNER->value)
                ->first(),
        );
    }
}
