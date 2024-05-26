@extends('master')

@section('title', 'Pacientes')

@section('content')
<secretaria create-route="{{ route('profile.create') }}" anunciar-route="{{ route('agenda.anunciar') }}"></secretaria>
@endsection

