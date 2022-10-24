@extends( 'layout' )

@section ( 'content' )
<div class="container-sm mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/' ) }}">Home</a></li>
          <li class="breadcrumb-item fw-bold"><a class="text-decoration-none" href="{{ url( '/participantes' ) }}">Participantes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Adicionar participante</li>
        </ol>
      </nav>
    <h1>Cadastro de novo participante</h1>
    <p>Cadastre aqui um novo participante para o evento. As salas e espaços para café serão atribuídas automaticamente.</p>
    <div class="row">
        <div class="col-md">
            <form method="POST" action="{{ route('registrarParticipante') }}">
                @csrf
                <div class="mb-3">
                    <label for="primeiroNome" class="form-label">Primeiro nome</label>
                    <input type="text" class="form-control" name="primeiroNome" id="primeiroNome" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
        <div class="col-md"></div>
        <div class="col-md"></div>
    </div>
</div>
@endsection