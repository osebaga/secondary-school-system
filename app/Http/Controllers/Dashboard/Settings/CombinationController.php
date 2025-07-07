<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Combination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Program;
use Validator;
use App\Repositories\Common\Repository;

class CombinationController extends Controller
{

    protected $comb_model;

    function __construct()
    {
        $this->comb_model = new Repository(new Combination());
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Program::all();
        $combinations = Combination::all();

        if (! Gate::allows('institutions-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Combinations']);
        
        return view('dashboard.settings.combinations.index', $data, compact('programmes', 'combinations'));

    }

    public function showCombinations($program){
        $combinations = Combination::where('programme_id', $program)->get();
        if($combinations->count() > 0){
            return response()->json($combinations);
        }else{
            return response()->json(1);
        }
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('institutions-create')) {
            return abort(401);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('institutions-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'programme_id' => 'required',
            'combination_code' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }

        $this->comb_model->create($input);
        return back()->with('message', 'Combination Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
