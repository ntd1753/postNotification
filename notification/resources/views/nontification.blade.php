@extends('layouts.app')

@section('content')
    @foreach ($user as $notification)
     <div>{{$notification}}</div>
    @endforeach
@endsection


