@extends( 'layout' )

@section ( 'content' )
<div class="container-sm mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/participantes' ) }}">Participantes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Excluir do participante</li>
        </ol>
      </nav>
    <h1>Exclusão de registro</h1>
    <p>Tem certeza que deseja excluir {{ $participante[0]->nome }} {{ $participante[0]->sobrenome }} do evento?</p>
    <div class="row">
        <div class="col-md">
            <a type="button" class="btn btn-danger" href='{{ url('/participantes/excluir/' . $participante[0]->id  .'/confirmar') }}'>Confirmar</a>
            <a type="button" href='{{ url( '/particiapntes' ) }}' class="btn btn-secondary">Cancelar</a>
        </div>
        <div class="col-md"></div>
        <div class="col-md"></div>
    </div>
</div>
@endsection