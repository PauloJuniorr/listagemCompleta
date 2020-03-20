@extends('base')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br>
    <div class="links">
         <a href="/fornecedores"> < Voltar</a>
    </div>
        <br>
        <h1 class="display-3">Atualizar Fornecedor</h1>
        <br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('fornecedores.update', $fornecedor->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input id="nomes" type="text" class="form-control" name="nome" value={{ $fornecedor->nome }} />
            </div>

            <div class="form-group">
                 <label for="tipo_pessoa">Tipo Pessoa:</label>
                 <select id="tipo_pessoa" class="form-control" name="tipo_pessoa">
                 <option selected="selected">
                    {{ $fornecedor->tipo_pessoa }}
                 </option>
                     <option>F</option>
                     <option>J</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cpf_cnpj">CPF ou CNPJ:</label>
                <input id="cpf_cnpj" type="text" class="form-control" name="cpf_cnpj" value={{ $fornecedor->cpf_cnpj }} />
            </div>

            <div class="form-group">
                <label for="data_hora">Data e Hora:</label>
                <input id="data_hora" type="text" class="form-control" name="data_hora" value={{ $fornecedor->data_hora }} />
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input id="telefone" type="text" class="form-control" name="telefone" value={{ $fornecedor->telefone }} />
            </div>
            <div class="form-group">
                <label for="rg">RG:</label>
                <input id="rg" type="text" class="form-control" name="rg" value={{ $fornecedor->rg }} />
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input id="data_nascimento" type="text" class="form-control" name="data_nascimento" value={{ $fornecedor->data_nascimento }} />
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection