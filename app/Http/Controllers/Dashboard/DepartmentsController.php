<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DepartmentRequest;


class DepartmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:departments_create'])->only('create');
        $this->middleware(['permission:departments_read'])->only('index');
        $this->middleware(['permission:departments_update'])->only('edit');
        $this->middleware(['permission:departments_delete'])->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('dashboard.departments.index', compact('departments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['writers'] = User::whereRoleIs('writer')->get();
        $data['editors'] = User::whereRoleIs('editor')->get();
        $data['supervisors'] = User::whereRoleIs('supervisor')->get();

        $data['parent_departs'] = Department::where('parent_id', null)->get();
        $data['child_departs'] = Department::where('parent_id', '!=' , null)->get();

        return view('dashboard.departments.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        if($request->type == "1") {
            $request->request->add(['parent_id' => null]);
        }

        Department::create($request->except('type'));

        return redirect()->route('departments.index')->with('success', 'تم اضافه القسم بنجاح');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $data = [];
        $data['department'] = $department;
        $data['writers'] = User::whereRoleIs('writer')->get();
        $data['editors'] = User::whereRoleIs('editor')->get();
        $data['supervisors'] = User::whereRoleIs('supervisor')->get();

        $data['parent_departs'] = Department::where('parent_id', null)->get();
        $data['child_departs'] = Department::where('parent_id', '!=' , null)->get();

        return view('dashboard.departments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        if($request->type == '1') {
            $request->request->add(['parent_id' => null]);
        }

        $department->update($request->except('type'));

        return redirect()->route('departments.index')->with('success', 'تم تعديل القسم بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
            if(isset($department->child)) {
                foreach($department->child as $child) {
                    $child->delete();
                }
            }
            $department->delete();

        return redirect()->route('departments.index')->with('success', 'تم حذف القسم بنجاح');
    }
}
