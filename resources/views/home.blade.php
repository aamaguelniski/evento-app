@extends('layout')


@section('content')
<div class="container-sm mt-2">
    <h1>Visão Geral</h1>
    <div class="row">
        <div class="col-md">
            <h2>Ações</h2>
            <div class="d-grid gap-2">
                <a type="button" href="{{ url('/participantes/novo') }}" class="btn btn-primary btn-lg">Cadastrar Participante</a>
                <a type="button"  href="{{ url('/salas/novo') }}" class="btn btn-secondary btn-lg">Cadastrar Sala</a>
                <a type="button"  href="{{ url('/cafes/novo') }}" class="btn btn-secondary btn-lg">Cadastrar Espaço de Café</a>
            </div>
        </div>
        <div class="col-md">
            <h2>Participantes</h2>
            <p>Uma visão geral dos inscritos para o evento</p>
            <p>Total de inscritos: {{ count( $participantes ) }}</p>
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
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach ( $participantes as $participante )
                <tr>
                    <th scope="row">{{ $participante->id }}</th>
                    <td>{{ $participante->nome }}</td>
                    <td>{{ $participante->sobrenome }}</td>
                    <td>
                        <a type="button" href='{{ url( '/participantes/info/' . $participante->id ) }}' class="btn btn-secondary btn-sm"><i class="bi bi-info-circle"></i></a>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
            </table>

            @endif
        </div>
        <div class="col-md">
            <h2>Salas</h2>
            <p>Salas cadastradas para atender ao evento</p>
            <p>Total de salas:</p>
            @if( count($salas) == 0 )
            <p>Nenhuma sala cadastrada até o momento.</p>
            @endif

            @if( count($salas) >= 1 )
            <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Sala</th>
                <th scope="col">Lotação</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $salas as $sala )
                <tr>
                <th scope="row">{{ $sala->id }}</th>
                <td>{{ $sala->nome }}</td>
                <td>{{ $sala->lotacao }}</td>
                <td>
                    <a type="button" href='{{ url( '/salas/info/' . $sala->id ) }}' class="btn btn-secondary btn-sm"><i class="bi bi-info-circle"></i></a>
                </td>
                </tr>
                @endforeach

            </tbody>
            </table>
            @endif
            <h2>Espaços para café</h2>
            <p>Espaços para café reservados para este evento.</p>
            <p>Total de inscritos:</p>
            @if( count($cafes) == 0 )
            <p>Nenhum Espaço para Café cadastrado até o momento.</p>  
            @endif

            @if( count($cafes) >= 1 )
            <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Lotação</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $cafes as $cafe )
                <tr>
                <th scope="row">{{ $cafe->id }}</th>
                <td>{{ $cafe->nome }}</td>
                <td>{{ $cafe->lotacao }}</td>
                <td>
                    <a type="button" href='{{ url( '/cafes/info/' . $cafe->id ) }}' class="btn btn-secondary btn-sm"><i class="bi bi-info-circle"></i></a>
                </td>
                </tr>
                @endforeach

            </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
