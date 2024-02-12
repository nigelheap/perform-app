<?php
namespace App\Utilities;


use App\Models\Account;
use App\Models\Curso;
use App\Models\Listing;
use App\Models\User;
use App\Services\WordpressApi;
use App\Services\ZohoApi;
use Illuminate\Support\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SelectValues {

    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     */
    public static function users(): array|Collection|static
    {
        return User::select(['first_name', 'last_name', 'email', 'id'])
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get()
            ->map(function(User $item){
                return [
                    'name' => $item->first_name . ' ' . $item->last_name . ' (' . $item->email . ')',
                    'id' => $item->id,
                ];
            });
    }


    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     */
    public static function cursos(): array|Collection|static
    {
        return Curso::select(['name', 'id'])
            ->orderBy('name')
            ->get()
            ->map(function(Curso $item){
                return [
                    'name' => $item->name,
                    'id' => $item->id,
                ];
            });
    }


    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     */
    public static function cursosWithUsers(): array|Collection|static
    {
        return Curso::select(['name', 'id'])
            ->orderBy('name')
            ->get()
            ->map(function(Curso $item){
                return [
                    'name' => $item->name,
                    'id' => $item->id,
                    'users' => $item->users()->get()->map(function (User $user){
                        return [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email
                        ];
                    })->toArray()
                ];
            });
    }

    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     */
    public static function listings(): array|Collection|static
    {
        return Listing::select(['title', 'id', 'indigenous_title'])
            ->orderBy('title')
            ->get()
            ->filter(fn(Listing $item) => !empty($item->title))
            ->map(function(Listing $item){
                return [
                    'name' => $item->title . (!empty($item->indigenous_title) ? ' (' . $item->indigenous_title . ')' : ''),
                    'id' => $item->id,
                ];
            })
            ->values();
    }


    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function staff(): array|Collection|static
    {
        $wp = app(WordpressApi::class);

        return collect($wp->terms('authors'))
            ->filter(fn($author) => data_get($author, 'staff', false))
            ->sortBy('name')
            ->values();
    }


    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function authors(): array|Collection|static
    {
        $wp = app(WordpressApi::class);

        return collect($wp->terms('authors'))
            ->sortBy('name')
            ->values();
    }

    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function tags(): array|Collection|static
    {
        $wp = app(WordpressApi::class);



        return collect($wp->terms('tags'))
            ->map(function($item){
                if(empty($item)){
                    return null;
                }

                return [
                    'id' => $item['term_id'],
                    'name' => $item['name'],
                ];
            })
            ->sortBy('name')
            ->values();
    }


    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function categories(): array|Collection|static
    {
        $wp = app(WordpressApi::class);

        return collect($wp->terms('categories'))
            ->map(function($item){
                if(empty($item)){
                    return null;
                }

                return [
                    'id' => $item['term_id'],
                    'name' => $item['name'],
                ];
            })
            ->sortBy('name')
            ->values();
    }


    /**
     * Returns the select values for vue select
     *
     * @return Collection|static|array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function facilities(): array|Collection|static
    {
        $wp = app(WordpressApi::class);

        return collect($wp->terms('facilities'))
            ->map(function($item){
                if(empty($item)){
                    return null;
                }


                return [
                    'id' => $item['term_id'],
                    'name' => $item['name'],
                ];
            })
            ->sortBy('name')
            ->values();
    }



}
