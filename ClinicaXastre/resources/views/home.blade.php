@extends('master')

@section('title', 'Pacientes')

@section('content')
<paginicial create-route="{{ route('profile.create') }}" index-route="{{ route('profile.index') }}" cliente-route="{{ route('agenda.index') }}"></paginicial>
@endsection

