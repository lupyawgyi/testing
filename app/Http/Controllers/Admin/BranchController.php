<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchInsertFormRequest;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.branches.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $branches = Branch::query();
//        dd($branches);
        return DataTables::of($branches)
            ->addColumn('action', function ($branches) {
                return '<a href= "' . $branches->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->editColumn('region_id',function ($branches){
                return $branches->region->name;
            })
            ->rawColumns(['action','region_id'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('backend.branches.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchInsertFormRequest $request)
    {
        $branch = new Branch();
        $branch->region_id = $request->get('region_id');
        $branch->name = $request->get('name');
        $branch->openingDate = $request->get('openingDate');
        $branch->address = $request->get('address');
        $branch->city = $request->get('city');
        $branch->phone = $request->get('phone');
        $branch->manager = $request->get('manager');
        $branch->email = $request->get('email');
        $branch->location = $request->get('location');
        $branch->dataSimOne = $request->get('dataSimOne');
        $branch->dataSimTwo = $request->get('dataSimTwo');

        $branch->save();
        return redirect('backend/branches/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::find($id);
        return view('backend/branches/show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regions = Region::all();
        $branch = Branch::find($id);
//
        return view('/backend/branches/edit', compact('branch','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchInsertFormRequest $request, $id)
    {
        $branch = Branch::find($id);
        $branch->region_id = $request->get('region_id');
        $branch->name = $request->get('name');
        $branch->openingDate = $request->get('openingDate');
        $branch->address = $request->get('address');
        $branch->city = $request->get('city');
        $branch->phone = $request->get('phone');
        $branch->manager = $request->get('manager');
        $branch->email = $request->get('email');
        $branch->dataSimOne = $request->get('dataSimOne');
        $branch->dataSimTwo = $request->get('dataSimTwo');
        $branch->location = $request->get('location');
        if ($branch->update()) {
            return redirect('backend/branches/index')->with('success', 'Successfully updated Data!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $user = User::where('email', '=', Input::get('email'))->first();
        $branch = Branch::find($id);

        $user = DB::table('users')->pluck('office_id')->toArray();

//        dd($user);
        if (in_array($id, $user, false))
            return redirect('/backend/branches/index')->with('status', 'Cannot delete.This data is using');
        else
            $branch->Delete();
        return redirect('/backend/branches/index')->with('success', 'Successfully Deleted Data!');
    }
}
