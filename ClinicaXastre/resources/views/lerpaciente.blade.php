<h2>Pacientes</h2>

<ul>
    @foreach ($paciente as $pacientes)
    <li>{{ $pacientes->nome}} | <a href="{{ route('paciente.editar',['paciente'=>$pacientes->id]) }}" class="btn btn-primary">Editar</a></li>
    @endforeach
</ul>