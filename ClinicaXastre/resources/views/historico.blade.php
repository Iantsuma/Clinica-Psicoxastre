@extends('master')

@section('title', 'Pacientes')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@section('content')
<historico :agendas="{{ json_encode($agenda) }}"></historico>
@endsection

