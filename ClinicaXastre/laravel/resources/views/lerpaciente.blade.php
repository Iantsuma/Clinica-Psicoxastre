@extends('master')

@section('title', 'Pacientes')

@section('content')
<editar-pacientes :users="{{ json_encode($user) }}"></editar-pacientes>
@endsection




