@extends( 'layout' )

@section ( 'content' )
<div class="container-sm mt-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Salas</li>
    </ol>
  </nav>
    <h1>Salas</h1>
    <a type="button" href=" {{ url('/salas/novo') }}" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i><span class="px-2">Novo</span></a>

    @if( count($salas) === 0 )
      <p>Nenhuma sala cadastrada até o momento.</p>
    @endif

    @if( count($salas) >= 1 )
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Sala</th>
          <th scope="col">Lotação</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        @foreach ( $salas as $sala )
        <tr>
          <th scope="row">{{ $sala->id }}</th>
          <td>{{ $sala->nome }}</td>
          <td>{{ $sala->lotacao }}</td>
          <td>
            <a type="button" href='{{ url( '/salas/info/' . $sala->id ) }}' class="btn btn-secondary btn-sm">Info</a>
        </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endif
</div>
@endsection