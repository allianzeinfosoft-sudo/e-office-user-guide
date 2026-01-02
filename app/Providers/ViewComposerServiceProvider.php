<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Topic;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         View::composer('*', function ($view) {
            $topics = Topic::with('children')
                ->whereNull('parent_id')
                //->orderBy('title')
                ->get();

            $view->with('topics', $topics);
        });
    
    }
}
