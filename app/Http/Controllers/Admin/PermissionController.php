<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionInsertFormRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return DataTables::of(Role::query())->make(true);
        return view('backend.permissions.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $roles = Permission::query();
        return DataTables::of($roles)
            ->addColumn('action', function ($roles) {
                return '<a href= "' . $roles->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionInsertFormRequest $request)
    {
        $permission = new Permission();
        $permission->name = $request->get('name');
        $permission->description = $request->get('description');
        $permission->save();
        return redirect('backend/permissions/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        return view('backend/permissions/show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
//
        return view('/backend/permissions/edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionInsertFormRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->get('name');
        $permission->description = $request->get('description');
        if ($permission->update()) {
            return redirect('backend/permissions/index')->with('success', 'Successfully updated Data!');

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
        $permission = Permission::find($id);
        $permission->Delete();
        return redirect('/backend/permissions/index')->with('success', 'Successfully Deleted Data!');
    }
}
