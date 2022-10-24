@extends( 'layout' )

@section ( 'content' )
<div class="container-sm mt-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Participantes</li>
    </ol>
  </nav>
    <h1>Participantes</h1>
    <a type="button" href=" {{ url('/participantes/novo') }}" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i><span class="px-2">Novo</span></a>
    
    @if( count($participantes) === 0 )
        <p>Nenhum participante cadastrado até o momento.</p>
    @endif

    @if( count($participantes) >= 1 )
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>

        @foreach ( $participantes as $participante )
          <tr>
            <th scope="row">{{ $participante->id }}</th>
            <td>{{ $participante->nome }}</td>
            <td>{{ $participante->sobrenome }}</td>
            <td>
                <a type="button" href='{{ url( '/participantes/info/' . $participante->id ) }}' class="btn btn-secondary btn-sm">Info</a>
                <a type="button" href='{{ url( '/participantes/excluir/' . $participante->id ) }}' class="btn btn-danger btn-sm">Excluir</a>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>

    @endif
</div>
@endsection