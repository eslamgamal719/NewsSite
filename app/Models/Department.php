<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = [
        'name',
        'type',
        'supervisor_id',
        'editor_id',
        'writer_id',
    ];



    //mutators
    public function getSupervisorIdAttribute($val) {
          $user = User::where('id', $val)->first();
          return $user->name;
    }

    public function getEditorIdAttribute($val) {
        $user = User::where('id', $val)->first();
        return $user->name;
    }

    public function getWriterIdAttribute($val) {
        $user = User::where('id', $val)->first();
        return $user->name;
    }

    public function getTypeAttribute($val) {
         return $val == 1 ? "Main Department" : "Sub Department";
    }

}
