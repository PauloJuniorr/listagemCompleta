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

    <h1 class="display-3">Adicionar Fornecedor</h1>

    <br>

    <div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif
      <form method="post" action="{{ route('fornecedores.store') }}">
        @csrf

        <div class="form-group">
            <label for="id_empresa">Escolha uma empresa</label>
            <select id="nomes" name="id_empresa" class="form-control">
            @foreach ($empresas as $empresa)
                <option value="{{$empresa->id}}" {{isset($fornecedor->id_empresa) ? ($empresa->id == $fornecedor->id_empresa) ? 'selected' : '' : '' }}>{{$empresa->nome_fantasia}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="nome">Nome:</label>
          <input id="nomes" type="text" class="form-control" name="nome" placeholder="Ex: Ricardo Aurélio" required/>
        </div>

        <div class="form-group">
          <label for="tipo_pessoa">Tipo Pessoa:</label>
          <select id="tipo_pessoa" class="form-control" name="tipo_pessoa" required>
                <option>F</option>
                <option>J</option>
          </select>
        </div>

        <div class="form-group">
          <label for="cpf_cnpj">CPF ou CNPJ:</label>
          <input id="cpf_cnpj" type="text" class="form-control" name="cpf_cnpj" placeholder="Ex: Seu CPF ou CNPJ" required/>
        </div>
        <div class="form-group">
          <label for="data_hora">Data e Hora:</label>
          <input id="data_hora" type="text" class="form-control" name="data_hora" placeholder="Ex: 2020-20-20 20:20:20" required/>
        </div>
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input id="telefone" type="text" class="form-control" name="telefone" placeholder="Ex: (99) 99999-9999" required/>
        </div>

        <div class="form-group">
          <label for="rg">RG:</label>
          <input id="rg" type="text" class="form-control" name="rg" placeholder="Ex: x.xxx.xxx"/>
        </div>
        
        <div class="form-group">
          <label for="data_nascimento">Data de Nascimento:</label>
          <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" placeholder="Ex: 2020-20-20"/>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
    </div>
  </div>
</div>
@endsection

