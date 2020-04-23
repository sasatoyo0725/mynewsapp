<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
  protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required'|unique:posts,
        'hobby' => 'required',
        'introduction' => 'required'|max:255,
    );
}
