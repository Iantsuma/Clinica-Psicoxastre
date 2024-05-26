@extends('master')

@section('title', 'Pacientes')

@section('content')
<cadastro-paciente store-route="{{ route('profile.store') }}"></cadastro-paciente>
@endsection


