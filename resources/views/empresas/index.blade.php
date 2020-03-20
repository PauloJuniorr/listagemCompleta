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
    <h1 class="display-3">Empresas</h1>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <td>ID</td>
          <td>UF</td>
          <td>Nome Fantasia</td>
          <td>CNPJ</td>
        </tr>
      </thead>
      <tbody>
        @foreach($empresas as $empresa)
        <tr>
          <td>{{$empresa->id}}</td>
          <td>{{$empresa->uf}}</td>
          <td>{{$empresa->nome_fantasia}}</td>
          <td>{{$empresa->cnpj}}</td>
          <td>
            <a href="{{ route('empresas.edit',$empresa->id)}}" class="btn btn-primary">Editar</a>
          </td>
          <td>
            <form action="{{ route('empresas.destroy', $empresa->id)}}" method="post">
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
      <a style="margin: 19px;" href="{{ route('empresas.create')}}" class="btn btn-primary">Nova Empresa</a>
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