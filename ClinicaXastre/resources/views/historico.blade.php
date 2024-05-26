@extends('master')

@section('title', 'Pacientes')
@section('content')
<historico :agendas="{{ json_encode($agenda) }}"></historico>
@endsection

