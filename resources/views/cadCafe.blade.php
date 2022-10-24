@extends( 'layout' )

@section ( 'content' )
<div class="container-sm mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/cafes' ) }}">Espaços para café</a></li>
          <li class="breadcrumb-item active" aria-current="page">Adicionar Espaço para Café</li>
        </ol>
      </nav>
    <h1>Cadastro de novo espaço de café</h1>
    <p>Cadastre aqui espaços para café a serem utilizadas durante as etapas do evento.</p>
    <div class="row">
        <div class="col-md">
            <form method="POST" action="{{ route('registrarCafe') }}">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="lotacao" class="form-label">Lotação</label>
                    <input type="number" class="form-control" id="lotacao" name="lotacao">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
        <div class="col-md"></div>
        <div class="col-md"></div>
    </div>
</div>
@endsection