@extends('layouts.app')
@extends('layouts.front')
@section('title', 'プロフィール情報')

@section('content')
{{$user->name}}
{{$user->hobby}}

{{Auth::user()->hobby}}

@endsection
