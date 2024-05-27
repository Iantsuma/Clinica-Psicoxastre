@extends('master')

@section('title', 'Pacientes')

@section('content')
<ficha ler-route="{{ route('profile.ler') }}" sessoes-route="{{ route('agenda.sessoes') }}"></ficha>
@endsection


