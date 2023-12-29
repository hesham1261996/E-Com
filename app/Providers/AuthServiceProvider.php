<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        // Gate::define('update-item' , function(User $user){
        //     return $user->isAdmin() == true ? Response::allow() : Response::deny('You must be an administrator.') ; 
        // });

        // // Gate::define('edit-user' , function(User $user){
        // //     return $user->IsSuperAdmin() == true ? Response::allow() : Response::deny('You must be an administrator.') ; 
        // // });

        // Gate::define('edit-user' , function($user){
        //     return $user->hasAllow('edit-user') ;
        // });


        Permission::get(['name'])->map(function ($per){
            Gate::define($per->name , function ($user) use ($per){
                return $user->hasAllow($per->name) ;
            });
        });
    }
}
