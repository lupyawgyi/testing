<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\UserInsertFormRequest;
use App\Mail\SuccessfulCreateAccount;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function change(PasswordUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->get('password'));
        $user->update();
        return redirect('/')->with('success', 'Successfully Changed Password');


    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $users = User::query('branch','role')->withTrashed()->get();

        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return '<a href= "' . $users->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->addColumn('state', function ($users) {
                if ($users->deleted_at != null)
                    return '<span class="fa fa-ban align-items-center" style="font-size:20px;color:red;">';
                else
                    return '<span class="fa fa-check-circle align-items-center" style="font-size:20px;color:green;">';
            })
            //$selectedRoles = $user->roles()->pluck('id')->toArray();
            ->addColumn('role', function ($users) {

//                return $users->roles->pluck('name')->toArray();

                return $users->roles->pluck('name');
            })
            //->leftJoin( 'role', 'model_id', '=', 'role_id' )
            ->addColumn('branch', function ($users) {
                return $users->branch->name;
            })
            ->rawColumns(['action', 'state','role'])
            ->make(true);
    }

    public function index()
    {
//        return  'hello';
        return view('backend/users/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('backend/users/create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsertFormRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->full_name = $request->get('real_name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        $user->password = bcrypt($password);
        $user->office_id = $request->get('office_id');
//        $data = array($user->name, $password);
        $data = [
            'name' => $user->name,
            'password' => $password,
            'link' => url()->current()
        ];

        if ($user->save()) {
//            \Mail::to([$request->get('email'),'yeemonoo22@gmail.com'],"User-Request")->send(new SuccessfulCreateAccount($data ));
            return redirect('backend/users/index')->with('success', 'Successfully Inserted Data!');

        }
//        Mail::to('dunsin.olubobokun@domain.com')
//            ->cc(['paul.yomi@domain.com','stack.overflow@domain.com','abc.xyz@domain.com','nigeria@domain.com'])
//            ->send(new document());
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::withTrashed()->find($id);
        return view('backend/users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withTrashed()->find($id);
        $roles = Role::all();
        $branches = Branch::all();
//        $selectedBranch = $user->roles()->pluck('id')->toArray();
        $selectedRoles = $user->roles()->pluck('id')->toArray();
        $permissions = Permission::all();
        $selectedPermissions = $user->permissions()->pluck('id')->toArray();
        return view('/backend/users/edit', compact('user', 'roles', 'selectedRoles', 'branches','selectedPermissions','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);
        $user->name = $request->get('name');
        $user->full_name = $request->get('full_name');
        $user->email = $request->get('email');
        if ($request->get('password') != "")
            $user->password = bcrypt($request->get('password'));
        else

            $user->office_id = $request->get('office_id');
        $user->syncRoles($request->get('role'));
        $user->givePermissionTo($request->get('permission'));
        if ($user->update()) {

            return redirect('backend/users/index')->with('success', 'Successfully updated Data!');

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
        $user = User::find($id);
        $user->ForceDelete();
        return redirect('backend/users/index')->with('success', 'Successfully Deleted Data!');
    }

    public function soft($id)
    {
        $user = User::find($id);
        $user->Delete();
        return redirect('backend/users/index')->with('success', 'Successfully Ban User');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect('backend/users/index')->with('success', 'Successfully Active User');

    }
}
