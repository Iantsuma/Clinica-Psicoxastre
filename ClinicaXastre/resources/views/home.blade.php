@extends('master')

@section('title', 'Pacientes')

@section('content')
<paginicial secretaria-route="{{ route('profile.secretaria') }}" index-route="{{ route('profile.index') }}" 
            cliente-route="{{ route('agenda.index') }}" :user-role="{{ $role }}"></paginicial>
@endsection



