<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Topic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
        $topics = Topic::with('children')->whereNull('parent_id')->get();
        $view->with('topics', $topics);
    });
    }

    protected $policies = [
        \App\Models\Article::class => \App\Policies\ArticlePolicy::class,
    ];
}
