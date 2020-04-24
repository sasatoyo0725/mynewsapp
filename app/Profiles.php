<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
  protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'hobby' => 'required|max:255',
        'introduction' => 'required|max:255',
    );
}
