<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function user() {
        return $this->hasOne("App\User", "users_id");
    }

    public function values() {
        return $this->hasMany("App\TemplateValues", "template_id", "id");
    }
}
