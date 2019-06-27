<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/fontawesome.css">
    </head>
    <body>
        <div class="container py-5 bg-white">
            <a href="/">Adicionar uma demanda</a>
            <table class="table text-center table-hover mt-2">
                <thead class="thead-dark bg-dark text-light">
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Unidade</td>
                        <td scope="col">Orgão</td>
                        <td scope="col">Apontamento</td>
                        <td scope="col">Gestor</td>
                        <td scope="col">Responsável</td>
                        <td scope="col">Status</td>
                        <td scope="col">Recebimento</td>
                        <td scope="col">Prazo</td>
                        <td scope="col"></td>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach($demandas as $demanda)
                        <tr style="cursor: pointer;" onclick="showInfo(event, {{$demanda['id']}})">
                            <td>
                                {{ $demanda["id"] }}
                            </td>
                            <td>
                                {{ $demanda['unidade'] }}
                            </td>
                            <td>
                                {{ str_limit($demanda['orgao'], $limit = 10, $end = '...') }} 
                            </td>
                            <td>
                                {{ str_limit($demanda['apontamento'], $limit = 10, $end = '...') }} 
                            </td>
                            <td>
                                {{ str_limit($demanda['gestor'], $limit = 10, $end = '...') }} 
                            </td>
                            <td>
                                {{ str_limit($demanda['responsavel'], $limit = 10, $end = '...') }} 
                            </td>
                            <td>
                                {{ $demanda['status'] }}
                            </td>
                            <td>
                                {{ $demanda['recebimento'] }}
                            </td>
                            <?php

                                $class;
                                date_default_timezone_set('America/Sao_Paulo');
                                $date = date('Y-m-d');
                                
                                if($demanda['prazo'] > $date)               
                                {
                                    $class = "text-success";
                                }  
                                
                                if($demanda['prazo'] == $date)
                                {
                                    $class = "text-warning";
                                }        

                                if($demanda['prazo'] < $date)
                                {
                                    $class = "text-danger";
                                }  
                            ?>
                            <td>
                                <span class="{{ $class }}">
                                    {{ $demanda['prazo'] }}
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="/excluir/{{ $demanda['id'] }}">
                                    X
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal pequeno -->

        <div 
            class="modal fade bd-example-modal-sm" 
            tabindex="-1" 
            role="dialog" 
            aria-labelledby="mySmallModalLabel" 
            aria-hidden="true"
            id="modal-demanda"
        >
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 
                            class="modal-title" 
                            id="exampleModalLabel"
                        >
                            Demanda
                        </h5>
                    </div>
                    <div class="modal-body">
                        <p class="word-breaker">
                            <span class="font-weight-bold">Unidade:</span> <span id="unidade"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Orgao:</span> <span id="orgao"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Apontamento:</span> <span id="apontamento"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Gestor:</span> <span id="gestor"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Responsavel:</span> <span id="responsavel"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Status:</span> <span id="status"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Recebimento:</span> <span id="recebimento"></span>
                        </p>
                        <p class="word-breaker">
                            <span class="font-weight-bold">Prazo:</span> <span id="prazo"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('js/jquery.min.js')  }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
           
            const showInfo = (event, id) => {
                if(event.target.nodeName != 'A') {
                    $.ajax({
                        url: `/demanda/${id}`,
                    }).done(function(data) {
                        $('#unidade').text(data.unidade);
                        $('#orgao').text(data.orgao);
                        $('#apontamento').text(data.apontamento);
                        $('#gestor').text(data.gestor);
                        $('#responsavel').text(data.responsavel);
                        $('#status').text(data.status);
                        $('#recebimento').text(data.recebimento);
                        $('#prazo').text(data.prazo);
                        //Show modal
                        $('#modal-demanda').modal('toggle');
                    });                
                }
            }

        </script>

    </body>
</html>
