<?php

namespace App\Http\Controllers\Admin;

use App\Error;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorInsertFormRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ErrorController extends Controller
{
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.errors.index');
    }
    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $errors = Error::query();
        return DataTables::of($errors)
            ->addColumn('action', function ($errors) {
                return '<a href= "' . $errors->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function create()
    {
        return view('backend.errors.create');
    }
    public function store(ErrorInsertFormRequest $request)
    {

        $error = new Error();
        $error->name = $request->get('name');
        $error->description = $request->get('description');
        $error->save();
        return redirect('backend/errors/index')->with('success', 'Successfully Inserted Data!');
    }
    public function show($id)
    {
        $error = Error::find($id);
        return view('backend/errors/show', compact('error'));
    }
    public function edit($id)
    {
        $error = Error::find($id);
//
        return view('/backend/errors/edit', compact('error'));
    }
    public function update(ErrorInsertFormRequest $request, $id)
    {
        $error = Error::find($id);
        $error->name = $request->get('name');
        $error->description = $request->get('description');
        if ($error->update()) {
            return redirect('backend/errors/index')->with('success', 'Successfully updated Data!');

        }
    }
    public function destroy($id)
    {
//        $user = User::where('email', '=', Input::get('email'))->first();
        $error = Error::find($id);

        $error->Delete();
        return redirect('/backend/errors/index')->with('success', 'Successfully Deleted Data!');
    }
}
