<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CredentialsRequest;
use App\Http\Requests\Dashboard\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:users_create'])->only('addEmployee');
        $this->middleware(['permission:users_read'])->only(['getSupervisors', 'getEditors', 'getWriters']);
        $this->middleware(['permission:users_update'])->only(['editSupervisor', 'editEditor', 'editWriter']);
        $this->middleware(['permission:users_delete'])->only(['deleteSupervisor', 'deleteEditor', 'deleteWriter']);
    }


    public function addEmployee() {
        return view('dashboard.users.create');
    }

    public function postAddEmployee(UsersRequest $request) {

        $request_data = $request->only(['name', 'email']);

        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);

        $user->attachRole($request->role);


      if($request->role == 'supervisor') {
            return redirect()->route('get-supervisors')->with('success', 'تم اضافه مشرف بنجاح');
        }elseif ($request->role == 'editor') {
            return redirect()->route('get-editors')->with('success', 'تم اضافه محرر بنجاح');
        }else {
            return redirect()->route('get-writers')->with('success', 'تم اضافه كاتب بنجاح');
        }

    }



    //Supervisors methods//
    public function getSupervisors() {
        $supervisors = User::whereRoleIs('supervisor')->get();
        return view('dashboard.users.supervisors.index', compact('supervisors'));
    }

    public function editSupervisor($supervisor_id) {
          $supervisor = User::FindOrFail($supervisor_id);
          return view('dashboard.users.supervisors.edit', compact('supervisor'));
    }

    public function updateSupervisor(CredentialsRequest $request, $id) {

        $supervisor = User::FindOrFail($id);

        $supervisor->update($request->only(['name', 'email']));

        return redirect()->route('get-supervisors')->with('success', 'تم التعديل بنجاح');
    }

    public function deleteSupervisor($id) {

        $supervisor = User::FindOrFail($id);
        $supervisor->delete();

        return redirect()->route('get-supervisors')->with('success', 'تم الحذف بنجاح');

    }



    //Editors Methods
    public function getEditors() {
        $editors = User::whereRoleIs('editor')->get();
        return view('dashboard.users.editors.index', compact('editors'));
    }

    public function editEditor($id) {
        $editor = User::FindOrFail($id);
        return view('dashboard.users.editors.edit', compact('editors'));
    }

    public function updateEditor(CredentialsRequest $request, $id) {

        $editor = User::FindOrFail($id);

        $editor->update($request->only(['name', 'email']));

        return redirect()->route('get-editors')->with('success', 'تم التعديل بنجاح');
    }

    public function deleteEditor($id) {

        $editor = User::FindOrFail($id);
        $editor->delete();

        return redirect()->route('get-editors')->with('success', 'تم الحذف بنجاح');

    }





    //Writers Methods
    public function getWriters() {
        $writers = User::whereRoleIs('writer')->get();
        return view('dashboard.users.writers.index', compact('writers'));
    }

    public function editWriter($id) {
        $writer = User::FindOrFail($id);
        return view('dashboard.users.writers.edit', compact('writer'));
    }

    public function updateWriter(CredentialsRequest $request, $id) {

        $writer = User::FindOrFail($id);

        $writer->update($request->only(['name', 'email']));

        return redirect()->route('get-writers')->with('success', 'تم التعديل بنجاح');
    }

    public function deleteWriter($id) {

        $writer = User::FindOrFail($id);
        $writer->delete();

        return redirect()->route('get-writers')->with('success', 'تم الحذف بنجاح');

    }



}
