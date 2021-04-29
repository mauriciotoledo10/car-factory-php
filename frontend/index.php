<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Car Factory</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <script type="text/javascript">
        var url = "http://143.198.79.111:3030/";
    </script>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Car Factory</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <div class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-success my-2 my-sm-0 btn-block" data-toggle="modal" data-target="#create-car"><i class="fas fa-car"></i> NEW CAR</button>
        </div>
      </div>
    </nav>

    <main role="main" class="container">
        

      <div class="starter-template">
        
        <h3><i class="fas fa-car"></i> CARS LIST</h3>
        <br>

        <!-- listagem dos carros -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Carro</th>
                        <th>Marca</th>
                        <th>Valor</th>
                        <th width="200px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

      </div>

       <!-- Modal para criação de carro -->
       <div class="modal fade" id="create-car" tabindex="-1" role="dialog" aria-labelledby="labelModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="labelModal">Create Car</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>

              <!-- create -->
              <div class="modal-body">
                    <form data-toggle="validator" action="cars" method="POST">

                    <div class="form-group">
                        <label class="control-label" for="name">Título:</label>
                        <input type="text" name="name" class="form-control" data-error="Nome do carro." required />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="brand">Marca:</label>
                        <input type="text" name="brand" class="form-control" data-error="Marca do carro." required />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="price">Valor:</label>
                        <input type="text" name="price" class="form-control" data-error="Valor do carro." required />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn car-submit btn-success">Editar</button>
                    </div>

                    </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal para editar carro -->
        <div class="modal fade" id="edit-car" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar carro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>


                <div class="modal-body">
                        <form data-toggle="validator" action="cars" method="put">
                            <input type="hidden" name="id" class="edit-id">


                            <div class="form-group">
                            <label class="control-label" for="name">Titulo:</label>
                            <input type="text" name="name" class="form-control" data-error="Digite um titulo." required />
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="brand">Marca:</label>
                            <input type="text" name="brand" class="form-control" data-error="Digite uma marca." required />
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="price">Valor:</label>
                            <input type="text" name="price" class="form-control" data-error="Digite um valor." required />
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success car-submit-edit">Editar</button>
                        </div>


                        </form>


                </div>
            </div>
            </div>
        </div>
    
    
    </main>
    <!-- /.container -->
   
    <!-- scripts cdn's -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <!-- scripts -->
    <script>
    $( document ).ready(function() {

        /* Request para receber todos os carros */
        getAllCars();

        /* Criando um novo carro */
        $(".car-submit").click(function(e) {
            
            e.preventDefault();
            
            var formAction = $("#create-car").find("form").attr("action");
            var name = $("#create-car").find("input[name='name']").val();
            var brand = $("#create-car").find("input[name='brand']").val();
            var price = $("#create-car").find("input[name='price']").val();

            // validando se todos os campos foram preenchidos corretamente
            if (name != '' && brand != '' && price != '') {

                let requestData = JSON.stringify({
                    name: name, brand: brand, price: price
                })

                $.ajax({
                    dataType: 'json',
                    contentType: 'application/json',
                    type:'POST',
                    url: url + formAction,
                    data: requestData
                }).done(function(data) {
                    getAllCars();
                    $(".modal").modal('hide');
                });

            } 
        });

        /* Editando um item*/
        $("body").on("click",".edit-car",function(){

            var id = $(this).parent("td").data('id');
            var name = $(this).parent("td").prev("td").prev("td").prev("td").text();
            var brand = $(this).parent("td").prev("td").prev("td").text();
            var price = $(this).parent("td").prev("td").text();

            $("#edit-car").find("input[name='name']").val(name);
            $("#edit-car").find("input[name='brand']").val(brand);
            $("#edit-car").find("input[name='price']").val(price);
            $("#edit-car").find(".edit-id").val(id);

        });

        /* Atualizando um carro */
        $(".car-submit-edit").click(function(e){

            e.preventDefault();

            var formAction = $("#edit-car").find("form").attr("action");
            var name = $("#edit-car").find("input[name='name']").val();
            var brand = $("#edit-car").find("input[name='brand']").val();
            var price = $("#edit-car").find("input[name='price']").val();
            var id = $("#edit-car").find(".edit-id").val();

            // validando se todos os campos foram preenchidos corretamente
            if (name != '' && brand != '' && price != '') {

                let requestData = JSON.stringify({
                    name: name, brand: brand, price: price
                })

                $.ajax({
                    dataType: 'json',
                    contentType: 'application/json',
                    type:'PUT',
                    url: url + formAction + '/' + id,
                    data: requestData
                }).done(function(data){
                    getAllCars();
                    $(".modal").modal('hide');
                });
            }
        });

        /* Método para obnter todos os carros na base de dados*/
        function getAllCars() {
            $.ajax({
                dataType: 'json',
                url: url + 'cars'
            }).done(function(data) {
                appendData(data.cars);
            });
        }

        /* Método para iterar a listagem no html */
        function appendData(data) {
            
            let rows = '';
            
            $.each( data, function( key, value ) {
                rows = rows + '<tr>';
                rows = rows + '<td>'+value.name+'</td>';
                rows = rows + '<td>'+value.brand+'</td>';
                rows = rows + '<td>'+value.price+'</td>';
                rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<button data-toggle="modal" data-target="#edit-car" class="btn btn-primary edit-car">Editar</button> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';;
            });

            $("tbody").html(rows);
        }

    });    
    </script>


  </body>
</html>
