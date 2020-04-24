<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profiles;

class ProfileController extends Controller
{
  public function add()
  {
    return view('admin.profile.create');
  }

  public function create(Request $request)
  {
    $this->validate($request, Profiles::$rules);

    $profiles = new Profiles;
    $form = $request->all();

    if (isset($form['image'])) {
      $path = $request->file('image')->store('public/image');
      $profiles->image_path = basename($path);
    } else {
      $profiles->image_path = null;
    }


    unset($form['_token']);

    unset($form['image']);

    $profiles->fill($form);
    $profiles->save();

    return redirect('admin/profile/create');
  }

  public function edit(Request $request)
  {
    $profiles = Profiles::find($request->id);

     return view('admin.profile.edit', ['profiles_form' => $profiles]);
  }

  public function update(Request $request)
  {
    $this->validate($request, Profiles::$rules);

     $profiles = Profiles::find($request->id);

     $profiles_form = $request->all();
     unset($profiles_form['_token']);

     
     $profiles->fill($profiles_form)->save();

    return redirect('admin/profile/edit');
  }
}
