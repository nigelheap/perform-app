<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enumeration\UserRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'microsoft_id',
        'microsoft_token',
        'microsoft_refresh_token',
        'google_id',
        'google_token',
        'google_refresh_token',
        'approved',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'admin',
    ];


    /**
     * @return BelongsToMany
     */
    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class);
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        return $this->role === $role;
    }

    /**
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }

    /**
     * @return bool
     */
    public function isSuper(): bool
    {
        return $this->hasAnyRole([UserRoles::SUPER->value]);
    }

    /**
     * @return bool
     */
    public function isAdminOrSuper(): bool
    {
        return $this->hasAnyRole([UserRoles::ADMIN->value, UserRoles::SUPER->value]);
    }

    /**
     * @return Attribute
     */
    public function admin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->isAdminOrSuper(),
        );
    }

    /**
     * @return Attribute
     */
    public function initials(): Attribute
    {
        return new Attribute(
            get: fn() => Str::of($this->name)->explode(' ', 2)->map(function($part){
                return substr($part, 0, 1);
            })->join('')
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
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', $search . '%');
            });
    }

}
