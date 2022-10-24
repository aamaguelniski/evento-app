@extends( 'layout' )

@section ( 'content' )
<div class="container-sm mt-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Espaços para café</li>
    </ol>
  </nav>
    <h1>Espaços para Café</h1>
    <a type="button" href=" {{ url('/cafes/novo') }}" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i><span class="px-2">Novo</span></a>

    @if( count($cafes) === 0 )
      <p>Nenhum Espaço para Café cadastrado até o momento.</p>  
    @endif

    @if( count($cafes) >= 1 )
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Lotação</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        @foreach ( $cafes as $cafe )
        <tr>
          <th scope="row">{{ $cafe->id }}</th>
          <td>{{ $cafe->nome }}</td>
          <td>{{ $cafe->lotacao }}</td>
          <td>
            <a type="button" href='{{ url( '/cafes/info/' . $cafe->id ) }}' class="btn btn-secondary btn-sm">Info</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endif
</div>
@endsection