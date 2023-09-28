<?php

namespace App\Providers;

use App\Models\ModelsModel;
use App\Models\Roles;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $models = ModelsModel::all();
        if($models->count()>0){
            foreach ($models as $model) {
                $functionArr = $model->function !== null ? json_decode($model->function, true) : [];
                if(!empty($functionArr)) {
                    foreach ($functionArr as $key => $function) {
                        Gate::define("{$model->name}.{$key}", function(User $user) use ($model, $key){
                            $roleJson = $user->role->permission;
                            $roleArr = $roleJson !== null ? json_decode($roleJson, true) : [];
                            if(!empty($roleArr)) {
                                return  isRole($roleArr, $model->name, $key);
                            }
                            return false;
                        });
                    }
                }
            }
        }
    }
}
