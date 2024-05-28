<?php

namespace App\Models;

use App\Enumeration\CursoUserRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin IdeHelperCurso
 */
class Curso extends Model
{
    use HasFactory;


    const TABLE = 'cursos';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'expire_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'expire_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
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
                ->where('curso_user.role', CursoUserRoles::OWNER->value)
                ->first(),
        );
    }


    /**
     * @param Builder $query
     * @param string|null $search
     * @return void
     */
    public function scopeSearch(Builder $query, ?string $search = ''): void
    {
        if(empty($search)){
            return;
        }

        $query
            ->where(function(Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', $search . '%');
            });
    }
}
