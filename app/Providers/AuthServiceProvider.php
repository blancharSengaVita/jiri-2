<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Jiri;
use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('handle-note', function (User $user, Jiri $jiri) {
            return $jiri->user_id === $user->id;
        });
    }
}
