@extends('layouts.profile')
@section('title', 'Myプロフィール')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール新規作成</h2>
      <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

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
            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="hobby">趣味</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="introduction">概要</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="introduction" value="{{ old('introduction') }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="title">画像</label>
          <div class="col-md-10">
            <input type="file" class="form-control-file" name="image">
          </div>
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="登録">
      </form>
    </div>
  </div>
</div>
@endsection
