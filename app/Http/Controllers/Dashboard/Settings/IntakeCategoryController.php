<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\BaseController;

use App\Http\Controllers\Controller;
use App\Models\IntakeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use View;
use SRS;
class IntakeCategoryController extends Controller
{


    public function __construct()
    {

    }

    public function index()
    {
        if (! Gate::allows('intake_categories-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Class Group']);
        return view('dashboard.settings.intake-category.index', $data);
    }


    public function create()
    {
        if (! Gate::allows('intake_categories-create')) {
            return abort(401);
        }
        return View::make('dashboard.settings.intake-category.modals.modal_body_create')->render();

    }

    public function getJsonIntakeCategory()
    {
        if (! Gate::allows('intake_categories-view')) {
            return abort(401);
        }
        try {
            $intakes = IntakeCategory::query();
            return DataTables::of($intakes)
                ->addIndexColumn()

                ->addColumn('action', function ($intake) {
                    $edit_link = "";
                    $delete_link = "";
                    if (Gate::allows('intake_categories-edit')) {
                        $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-intake-edit-button" data-url="' . route('intake-categories.edit', SRS::encode($intake->id)) . '"');
                    }
                    if (Gate::allows('intake_categories-delete')) {
                        $delete_link = "<a href='#' class='po' title='<b>" . ("Delete IntakeCategory =>" . $intake->name) . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('intake-categories.destroy', SRS::encode($intake->id)) . "'>"
                        . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                        . "</a>";
                    }
                   
                    $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);
                    return $action;
                })->escapeColumns('action')
                ->make(true);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
    }


    public function store(Request $request)
    {
        if (! Gate::allows('intake_categories-create')) {
            return abort(401);
        }
        $rules = [
            'name' => 'required|string|min:3'
        ];
        $messages = [
            'name.required' => 'Class Group  name required',
            'name.string' => 'Class Group  name must be a list of characters',
            'name.min' => 'The Class Group  name must be at least 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {
            IntakeCategory::create($input);

            return back()->with("message", 'Class Group created successfully');

        } catch (\Exception $ex) {
            return back()->with('error', 'A system error occurred ' . $ex->getMessage());
        }

    }

    public function show($id)
    {
        if (! Gate::allows('intake_categories-view')) {
            return abort(401);
        }
        $category = IntakeCategory::find($id);
        if (!$category) {
          //  return $this->sendError('Ticket Category Not Found');
        }

       // return $this->sendResponse(new TicketCategoryResource($category), 'Ticket Category Retrieved Successfully');

    }

    public function edit($id)
    {
        if (! Gate::allows('intake_categories-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $intake = IntakeCategory::find($id);
        $data['intake'] = $intake;
        return View::make('dashboard.settings.intake-category.modals.modal_body_edit', $data)->render();

    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('intake_categories-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $IntakeCategory = IntakeCategory::find($id);
        if (!$IntakeCategory) {
            return back()->withInput()->with('IntakeCategory not found');
        }
        $rules = [
            'name' => 'required|string|min:3'
        ];
        $messages = [
            'name.required' => 'Class Group Name Required',
                'name.string' => 'Class Group name must be a list of characters',
            'name.min' => 'The Class Group name Must be at leas 5 characters'
        ];
        $this->validate($request, $rules, $messages);
        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {

            $IntakeCategory->update($input);

            return back()->with('message', 'Class Group updated successfully');

        } catch (\Exception $ex) {
            return back()->with('A system error occurred');

        }

    }

    public function destroy($id)
    {
        if (! Gate::allows('intake_categories-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $IntakeCategory = IntakeCategory::find($id);

        if (!$IntakeCategory) {
                return response()->json('Class Group Not Found');
        }

        if ($IntakeCategory->delete()) {
            return response()->json("IntakeCategory (" . $id . ')  Class Group  has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }



}
