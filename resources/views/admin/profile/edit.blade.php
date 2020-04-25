@extends('layouts.profile')
@section('title', 'プロフィール更新')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール更新</h2>
      <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

        @if (count($errors) > 0)
        <ul>
          @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
          @endforeach
        </ul>
        @endif
        <div class="form-group row">
          <label class="col-md-2" for="name">名前</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="name" value="{{ optional($profiles_form)->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="hobby">趣味</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="hobby" value="{{ optional($profiles_form)->hobby }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="introduction">概要</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="introduction" value="{{ optional($profiles_form)->introduction }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="title">画像</label>
          <div class="col-md-10">
            <input type="file" class="form-control-file" name="image">
            <div class="form-text text-info">
                設定中: {{ optional($profiles_form)->image_path }}
            </div>
          </div>
        </div>
        <input type="hidden" name="id" value="{{ optional($profiles_form)->id }}">
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="更新">
      </form>
    </div>
  </div>
</div>
@endsection
