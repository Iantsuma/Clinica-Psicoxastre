@extends('master')

@section('title', 'Pacientes')

@section('content')
<info update-route="{{ route('agenda.update') }}" :agenda='@json($agenda)'></info>
@endsection





