@extends('master')

@section('title', 'Pacientes')

@section('content')
<avisos :agendas="{{ json_encode($agenda) }}"></avisos>
@endsection


