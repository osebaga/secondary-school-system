<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Requests\Roles\StoreAbilitiesRequest;
use App\Http\Requests\Roles\UpdateAbilitiesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Silber\Bouncer\Database\Ability;

class AbilitiesController extends Controller
{
    /**
     * Display a listing of Abilities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Gate::allows('abilities-view')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        $data['abilities'] = Ability::all();

        return view('dashboard.bouncer.abilities.index',$data);
    }

    /**
     * Show the form for creating new Ability.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('abilities-create')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        return view('dashboard.bouncer.abilities.create',$data);
    }

    /**
     * Store a newly created Ability in storage.
     *
     * @param  \App\Http\Requests\StoreAbilitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbilitiesRequest $request)
    {
        if (! Gate::allows('abilities-create')) {
            return abort(401);
        }
        Ability::create($request->all());

        return redirect()->route('abilities.index');
    }


    /**
     * Show the form for editing Ability.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('abilities-edit')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];

        $data['ability'] = Ability::findOrFail($id);

        return view('dashboard.bouncer.abilities.edit', $data);
    }

    /**
     * Update Ability in storage.
     *
     * @param  \App\Http\Requests\UpdateAbilitiesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbilitiesRequest $request, $id)
    {
        if (! Gate::allows('abilities-edit')) {
            return abort(401);
        }
        $ability = Ability::findOrFail($id);
        $ability->update($request->all());

        return redirect()->route('abilities.index');
    }

    public function show(Ability $ability)
    {
        if (! Gate::allows('users-view')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Roles']];
        $data['ability']=$ability;
        return view('dashboard.bouncer.abilities.show', $data);
    }

    /**
     * Remove Ability from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('abilities-delete')) {
            return abort(401);
        }
        $ability = Ability::findOrFail($id);
        $ability->delete();

        return redirect()->route('abilities.index');
    }

    /**
     * Delete all selected Ability at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('abilities-delete')) {
            return abort(401);
        }
        Ability::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
