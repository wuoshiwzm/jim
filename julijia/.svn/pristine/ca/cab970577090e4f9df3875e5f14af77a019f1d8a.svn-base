<?php
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

  class ShopEloquentUserProvider extends EloquentUserProvider
{


    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        //the password from input.
        $plain = $credentials['password'];
        //the password in database
        $authPassword = $user->getAuthPassword();

        return decode($plain) == $authPassword['password'];
    }


}
