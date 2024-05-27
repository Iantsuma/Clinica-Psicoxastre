@extends('master')

@section('title', 'Pacientes')

@section('content')
<cliente create-route="{{ route('agenda.create') }}" ler-route="{{ route('agenda.ler') }}" read-route="{{ route('agenda.read') }}" :user-id="{{ auth()->user()->id }}"></cliente>
@endsection

