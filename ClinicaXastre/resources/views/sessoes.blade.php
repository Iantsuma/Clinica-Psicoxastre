@extends('master')

@section('title', 'Pacientes')
@section('content')
<sessoes :agendas="{{ json_encode($agenda) }}"></sessoes>
@endsection

