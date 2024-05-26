@extends('master')

@section('title', 'Pacientes')

@section('content')
<anunciar :agendas="{{ json_encode($agenda) }}"></anunciar>
@endsection


