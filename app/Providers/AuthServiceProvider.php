<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Foundation\Application;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        /**
         * Register any application authentication / authorization services.
         */

        Auth::provider('attendances', function (Application $app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...

            return new attendancesUserProvider();
        });

        Gate::define('handle-jiri', function (User $user, Jiri $jiri) {
            return $jiri->user_id === $user->id;
        });

        Gate::define('handle-contact', function (User $user, Contact $contact) {
            return $contact->user_id === $user->id;
        });

        Gate::define('handle-project', function (User $user, Project $project) {
            return $project->user_id === $user->id;
        });
    }
}
