<?php
namespace App\Repositories\User;

use App\Repositories\AbstractRepository;
use App\Http\Resources\User\UserForLogin;
use App\Repositories\User\UserInterface;

class UserRepository extends AbstractRepository implements UserInterface
{

    protected $modelClassName = 'User';
    protected $modelClassNamePath = "App\Models\User";
    protected $collectionNamePath = "App\Http\Resources\User\UserCollection";
    protected $resourceNamePath = "App\Http\Resources\User\UserResource";
    
    public function findByUserName($username)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array($username));
        return $where->get();
    }
    public function getOneForLogin($user)
    {
        return new UserForLogin($user);
    }
    public function syncRolesAndPermissions($request, &$user)
    {
        if ($request->has('roles')) {//string
            $user->syncRoles( $request->get('roles') );
        }
        if ($request->has('permissions')) {
            $user->givePermissionTo( $request->get('permissions') );
        }
    }
}