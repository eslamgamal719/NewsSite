<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $appends = [
        'department_name',
        'editor_name',
        'writer_name',
    ];

    //mutators
    public function getDepartmentNameAttribute() {
        $department = Department::where('id', $this->department_id)->first();
        return $department->name;
    }

    public function getEditorNameAttribute() {
        $user = User::where('id', $this->editor_id)->first();
        return $user->name;
    }

    public function getWriterNameAttribute() {
        $user = User::where('id', $this->writer_id)->first();
        return $user->name;
    }

    public function getActive() {
        return $this->status == 1 ? "فعال" : "غير فعال";
    }
}
