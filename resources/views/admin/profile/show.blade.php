@extends('layouts.app')
@section('title', 'プロフィール情報')

@section('content')
{{$user->name}}
{{$user->hobby}}

{{Auth::user()->hobby}}

@endsection
