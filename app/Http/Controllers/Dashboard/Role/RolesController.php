<?php

namespace App\Http\Controllers\Dashboard\Role;

use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\StoreRolesRequest;
use App\Http\Requests\Roles\UpdateRolesRequest;
use Silber\Bouncer\BouncerFacade as Bouncer;

// use Bouncer;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Bouncer::allows('users-manage')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        $data['roles'] = Role::all();
        $data['roles2'] = Role::where('name','!=','SuperAdmin')->get();
        return view('dashboard.bouncer.roles.index', $data);
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        $data['abilities'] = Ability::get()->pluck('name', 'name');

        return view('dashboard.bouncer.roles.create', $data);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }
        $role = Role::create($request->all());
        $role->allow($request->input('abilities'));

        return redirect()->route('roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        $data['abilities'] = Ability::get()->pluck('name', 'name');

        $data['role'] = Role::findOrFail($id);

        return view('dashboard.bouncer.roles.edit', $data);
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->update($request->all());
        foreach ($role->getAbilities() as $ability) {
            $role->disallow($ability->name);
        }
        $role->allow($request->input('abilities'));

        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        $role->load('abilities');
         $data['role']=$role;
        return view('dashboard.bouncer.roles.show', $data);
    }

    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Bouncer::allows('users-manage')) {
            return abort(401);
        }
        Role::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
