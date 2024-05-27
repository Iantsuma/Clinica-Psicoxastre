@extends('master')

@section('title', 'Pacientes')

@section('content')
<alterar-paciente update-route="{{ route('profile.alterar', ['user' => $user->id]) }}" 
    :user="{{ json_encode($user) }}"></alterar-paciente>
@endsection


