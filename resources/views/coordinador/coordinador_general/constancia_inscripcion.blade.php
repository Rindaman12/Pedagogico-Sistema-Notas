@extends('layouts.app_coordinador_general')

@section('main')

    <app-layout :user-user='@json(auth()->user()->usuario)' :user-tipo='@json(auth()->user()->tipo)'
        :user-nombre='@json(auth()->user()->nombre_usuario)' :user-apellido='@json(auth()->user()->apellido_usuario)'
        :user-id='@json(auth()->user()->id)'>
    </app-layout>

@endsection
