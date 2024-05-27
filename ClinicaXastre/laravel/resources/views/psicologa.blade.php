@extends('master')

@section('title', 'Pacientes')

@section('content')
<psicologa ficha-route="{{ route('profile.ficha') }}" avisos-route="{{ route('agenda.avisos') }}"></psicologa>
@endsection


