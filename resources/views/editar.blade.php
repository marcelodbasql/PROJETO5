<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    </head>
    <body>
        <div class="container mt-2 py-3 px-3 bg-white">          

          <form 
              action="/cadastrar" 
              method="post"
              class="form"
          >
              @csrf
              <div class="form-row text-center">

                  <div class="form-group col-md-6">
                    <label for="unidade">Unidade Responsavel</label>
                    
                    <select 
                      name="unidade" 
                      id="unidade"
                      class="form-control"
                    >
                        <?php $unidades = ['VIART','DEPOT','GERAT','DETER','SUPOT','GEICO','SUFES','GEDEF','GEAFE','SUGET','GEVAR','GEFIX'] ?>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade }}">
                                {{ $unidade }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-danger text-center">{{ $errors->first('unidade') }}</p>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="orgao">Orgão demandante:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="orgao"
                        name="orgao"
                    >
                    <p class="text-danger text-center">{{ $errors->first('orgao') }}</p>
                  </div>

                </div>
                  <h1>Demanda Recebida</h1>                
                  <div class="form-row text-center">
                    <div class="form-group col-md-6">
                      <label for="gestor">Gestor responsável</label>
                      <input type="text" name="gestor" class="form-control" id="gestor">
                      <p class="text-danger text-center">{{ $errors->first('gestor') }}</p>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="responsavel">Responsável</label>
                      <input type="text" id="responsavel" class="form-control" name="responsavel">     
                      <p class="text-danger text-center">{{ $errors->first('responsavel') }}</p>                 
                    </div>
                    <div class="form-group col-md-2">
                      <label for="status">Status</label>
                      <select name="status" id="status" class="form-control">
                        <option value="Andamento">Andamento</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Concluído">Concluído</option>
                      </select>
                      <p class="text-danger text-center">{{ $errors->first('status') }}</p>
                    </div>
                  </div>
                  <div class="form-row text-center">
                      <div class="form-group col-md-6">
                        <label for="recebimento">Data recebimento</label>
                        <input type="date" name="recebimento" id="recebimento" class="form-control">
                        <p class="text-danger text-center">{{ $errors->first('recebimento') }}</p>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="prazo">Prazo final </label>
                        <input type="date" name="prazo" class="form-control">     
                        <p class="text-danger text-center">{{ $errors->first('prazo') }}</p>
                      </div>
                  </div>
                  <div class="form-group text-center">
                    <label for="apontamento">Apontamento</label>
                    <textarea name="apontamento" id="apontamento" cols="30" rows="4" class="form-control"></textarea>
                    <p class="text-danger text-center">{{ $errors->first('apontamento') }}</p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-primary">Cadastrar</button>
                  </div>
              </div>
          </form>
        </div>
    </body>
</html>
