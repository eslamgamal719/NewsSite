<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Department extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'type',
        'supervisor_id',
        'editor_id',
        'writer_id',
        'parent_id'
    ];

    protected $appends = [
        'supervisor_name',
        'editor_name',
        'writer_name'
    ];



    //mutators
    public function getSupervisorNameAttribute() {
          $user = User::where('id', $this->supervisor_id)->first();
          return $user->name;
    }

    public function getEditorNameAttribute() {
        $user = User::where('id', $this->editor_id)->first();
        return $user->name;
    }

    public function getWriterNameAttribute() {
        $user = User::where('id', $this->writer_id)->first();
        return $user->name;
    }

    public function getTypeAttribute($val) {
         return $val == 1 ? "Main Department" : "Sub Department";
    }


    //Relations
    public function child() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }





}
