@extends('base')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

@section('main')
<div class="row">
    <div class="col-sm-12">
        <br>
    <div class="links">
         <a href="/"> < Voltar</a>
    </div>
        <br>
        <h1 class="display-3">Fornecedores</h1>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Tipo Pessoa</td>
                    <td>CPF ou CNPJ</td>
                    <td>Data e Hora</td>
                    <td>Telefone</td>
                    <td>RG</td>
                    <td>Data de Nascimento</td>
                </tr>
            </thead>
            <tbody>
                @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{$fornecedor->id}}</td>
                    <td>{{$fornecedor->nome}}</td>
                    <td>{{$fornecedor->tipo_pessoa}}</td>
                    <td>{{$fornecedor->cpf_cnpj}}</td>
                    <td>{{$fornecedor->data_hora}}</td>
                    <td>{{$fornecedor->telefone}}</td>
                    <td>{{$fornecedor->rg}}</td>
                    <td>{{$fornecedor->data_nascimento}}</td>
                    <td>
                        <a href="{{ route('fornecedores.edit',$fornecedor->id)}}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('fornecedores.destroy', $fornecedor->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a style="margin: 19px;" href="{{ route('fornecedores.create')}}" class="btn btn-primary">Novo Fornecedor</a>
        </div>
        <div>
        </div>
        @endsection

        <div class="col-sm-12">

            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
        </div>