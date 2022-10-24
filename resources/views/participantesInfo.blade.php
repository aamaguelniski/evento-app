@extends( 'layout' )

@section( 'content' )

<div class="container-sm mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/participantes' ) }}">Participantes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detalhes do participante</li>
        </ol>
      </nav>
    <h1>{{ $participante[0]->nome . ' ' . $participante[0]->sobrenome }}</h1>
    <p>Confira os detalhes da participação de {{ $participante[0]->nome }} no evento.</p>
    <div class="row">
        <div class="col-md">
            <h2>Salas</h2>
            <h3>Etapa 1:</h3>
            <p>Sala reservada ao participante para a etapa 1 do evento.</p>
            <div class="card">
                <div class="card-body">
                    {{ $sala_etapa1[0]->nome }}
                </div>
            </div>
            <h3>Etapa 2:</h3>
            <p>Sala reservada ao participante para a etapa 2 do evento.</p>
            <div class="card">
                <div class="card-body">
                    {{ $sala_etapa2[0]->nome }}
                </div>
            </div>
        </div>
        <div class="col-md">
            <h2>Espaços para Café</h2>
            <h3>Etapa 1:</h3>
            <p>Espaço de Café reservado ao participante para a etapa 1 do evento.</p>
            <div class="card">
                <div class="card-body">
                    {{ $cafe_etapa1[0]->nome }}
                </div>
            </div>
            <h3>Etapa 2:</h3>
            <p>Espaço de Café reservado ao participante para a etapa 2 do evento.</p>
            <div class="card">
                <div class="card-body">
                    {{ $cafe_etapa2[0]->nome }}
                </div>
            </div>
        </div>
        <div class="col-md">
            
        </div>
    </div>
</div>
@endsection