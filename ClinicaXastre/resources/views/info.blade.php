@extends('master')

@section('title', 'Pacientes')

@section('content')
<info store-route="{{ route('info.store') }}" :agendamento='@json($agendamento)'></info>
@endsection





