<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Repositories\User\UserInterface;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware(['role:manager|admin|standar'])->only(['index']);
        $this->middleware(['role:manager|admin'])->only(['store','show', 'update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('User/Index', [
            'users' => $this->userRepository->all($request),
            'filters' => request()->all(['name', 'sortBy', 'direction'])
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $fields = $request->all();
        if ($request->has('password')) {
            $fields['password'] = bcrypt( $request->get('password') );
        }
        $user = $this->userRepository->create( $request->all() );
        $this->userRepository->syncRolesAndPermissions( $request, $user );

        return Redirect::route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render('User/Show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $role_selected = isset($user->getRoleNames()[0])? $user->getRoleNames()[0]:'';
        return Inertia::render('User/Edit', ['user' => $user,'role_selected'=>$role_selected,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $fields = $request->all();
        if ($request->has('password')) {
            $fields['password'] = bcrypt( $request->get('password') );
        }
        $user = $this->userRepository->updateOne( $fields, $user );
        $this->userRepository->syncRolesAndPermissions( $request, $user );

        return Redirect::route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userRepository->deleteOne($user);
        return Redirect::route('users.index');
    }
}
