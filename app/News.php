<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'title' => 'required'|unique:posts|max:255,
    'body' => 'required'|unique:posts,
  );
}
