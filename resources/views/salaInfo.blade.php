@extends( 'layout' )

@section( 'content' )

<div class="container-sm mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/salas' ) }}">Salas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detalhes da sala</li>
        </ol>
      </nav>
    <h1>{{ $sala_info[0]->nome }}</h1>
    <div class="row">
        <div class="col-md">
            <h3>Lotação máxima: {{ $sala_info[0]->lotacao }}</h3>
        </div>
        <div class="col-md">
            <h2>Etapa 1</h2>
            <p>Vagas disponíveis: {{ $sala_info[0]->lotacao - count( $etapa1 ) }}</p>

            @if( count($etapa1) === 0 )
            <p>Nenhum participante cadastrado até o momento.</p>
            @endif

            @if( count($etapa1) >= 1 )
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                </tr>
                </thead>
                <tbody>

                @foreach ( $etapa1 as $participante )
                <tr>
                    <th scope="row">{{ $participante->id }}</th>
                    <td>{{ $participante->nome }}</td>
                    <td>{{ $participante->sobrenome }}</td>
                </tr>
                @endforeach
                
                </tbody>
            </table>

            @endif
        </div>
        <div class="col-md">
            <h2>Etapa 2</h2>
            <p>Vagas disponíveis: {{ $sala_info[0]->lotacao - count( $etapa2 ) }}</p>

            @if( count($etapa2) === 0 )
            <p>Nenhum participante cadastrado até o momento.</p>
            @endif

            @if( count($etapa2) >= 1 )
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                </tr>
                </thead>
                <tbody>

                @foreach ( $etapa2 as $participante )
                <tr>
                    <th scope="row">{{ $participante->id }}</th>
                    <td>{{ $participante->nome }}</td>
                    <td>{{ $participante->sobrenome }}</td>
                </tr>
                @endforeach
                
                </tbody>
            </table>

            @endif            
        </div>
    </div>
</div>
@endsection