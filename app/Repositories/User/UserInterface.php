<?php

namespace App\Repositories\User;

use  App\Repositories\RepositoryInterface;

interface UserInterface extends RepositoryInterface 
{
    public function findByUsername($username);
    public function getOneForLogin($user);
    public function syncRolesAndPermissions($request, &$user);
}