@extends('master')

@section('title', 'Pacientes')
@section('content')
<proximos :agendas="{{ json_encode($agenda) }}"></proximos>
@endsection

