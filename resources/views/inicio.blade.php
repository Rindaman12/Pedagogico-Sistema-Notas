@extends('layouts.app')

@section('main')
    <app-layout 
        session="{{json_encode(Auth::user())}}" 
    />
@endsection