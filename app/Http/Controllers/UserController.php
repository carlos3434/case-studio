<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin|standar'])->only(['index']);
        $this->middleware(['role:admin'])->only(['create','store','show','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::query();
        if(request('search')){
            $query->where('name','LIKE','%'.request('search').'%');
        }
        
        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        } else {
            $query->orderBy('name', 'asc');
        }
        $users = $query->paginate(10);

        return Inertia::render('User/Index', [
            'users' => $query->paginate()->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
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
        $fields = $request->only(['name','email']);
        $fields['password'] = bcrypt( $request->get('password') );
        $user = User::create($fields);

        if ($request->has('role_selected')) {//string
            $user->syncRoles( $request->get('role_selected') );
        }
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

        $fields = $request->only(['name','email']);
        if ($request->has('password')) {
            $fields['password'] = bcrypt( $request->get('password') );
        }

        if ($request->has('role_selected')) {//string
            $user->syncRoles( $request->get('role_selected') );
        }
        $user->update($fields);
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
        $user->delete();
        return Redirect::route('users.index');
    }
}
