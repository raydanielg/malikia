<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomAuthServiceProvider extends ServiceProvider
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
        // Add custom validation rule for login
        Validator::extend('login', function ($attribute, $value, $parameters, $validator) {
            $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            $request = request();
            $request->merge([$field => $value]);
            $validator->setAttributeNames([$field => 'login']);
            return true;
        });

        // Add custom login validation message
        Validator::replacer('login', function ($message, $attribute, $rule, $parameters) {
            return 'The login field must be a valid email address or phone number.';
        });

        // Extend the Auth provider to support login with email or phone
        Auth::provider('eloquent', function ($app, array $config) {
            return new class($app['hash'], $config['model']) extends \Illuminate\Auth\EloquentUserProvider {
                public function retrieveByCredentials(array $credentials)
                {
                    if (empty($credentials) || (count($credentials) === 1 && array_key_exists('password', $credentials))) {
                        return null;
                    }

                    // First we will add each credential element to the query as a where clause.
                    // Then we can execute the query and, if we found a user, return it in a
                    // Eloquent User "model" that will be utilized by the Guard instances.
                    $query = $this->newModelQuery();

                    foreach ($credentials as $key => $value) {
                        if (str_contains($key, 'password')) {
                            continue;
                        }

                        if ($key === 'login') {
                            $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
                            $query->where($field, $value);
                        } else {
                            $query->where($key, $value);
                        }
                    }

                    return $query->first();
                }
            };
        });
    }
}
