<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Profiles;
use Storage;

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
      $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
      $profiles->image_path = Storage::disk('s3')->url($path);
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
    $profiles = Profiles::find($request->input('id'));
    $profiles_form = $request->all();
    if ($request->input('remove')) {
      $profiles_form['image_path'] = null;
    } elseif ($request->file('image')) {
      $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
      $profiles->image_path = Storage::disk('s3')->url($path);
    } else {
      $profiles_form['image_path'] = $profiles->image_path;
    }

    unset($profiles_form['_token']);
    unset($profiles_form['image']);
    unset($profiles_form['remove']);

    $profiles->fill($profiles_form)->save();
    return redirect('admin/profile/show');
  }

  public function show(Request $request)
  {
    $user = Auth::user();

     return view('admin.profile.show', ['user' => $user]);
  }

}
