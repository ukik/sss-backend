<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // URL::forceScheme('http');
        // Model::search(['kolom'], $data)
        Builder::macro('search', function($attributes, string $searchTerm) {
            $searchTerm = str_replace(' ', '%', $searchTerm);
            $this->where(function(Builder $query) use ($attributes, $searchTerm) {
                foreach (array_wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                }
            });
            return $this;
        });

        Builder::macro('search_space', function($attributes, string $searchTerm) {
            $searchTerm = str_replace(' ', '%', $searchTerm);
            $this->where(function(Builder $query) use ($attributes, $searchTerm) {
                foreach (array_wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'LIKE', "% {$searchTerm} %");
                }
            });
            return $this;
        });
    }
}
