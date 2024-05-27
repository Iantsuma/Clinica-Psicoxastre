@extends('master')

@section('title', 'Pacientes')

@section('content')
<documento editdoc-route="{{ route('agenda.editdoc', ['id' => $agenda->id]) }}" :agenda="{{ json_encode($agenda) }}"></documento>
@endsection



