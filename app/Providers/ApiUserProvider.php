<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
class ApiUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        // Recupera el usuario de la sesión
        $user = session('user');
        if ($user && $user->getAuthIdentifier() == $identifier) {
            return $user;
        }
        return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // No se utiliza en este ejemplo
        return null;
    }

    public function retrieveByCredentials(array $credentials)
    {
        // No se utiliza en este ejemplo
        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // No se utiliza en este ejemplo
        return null;
    }
}
