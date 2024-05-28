@extends('master')

@section('title', 'Pacientes')

@section('content')
<agendar store-route="{{ route('agenda.store') }}" :user-id="{{ auth()->user()->id }}" user-name="{{ auth()->user()->nome }}" :psicologos="{{ $psicologos->toJson() }}"></agendar>
@endsection
