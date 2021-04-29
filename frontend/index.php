<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Car Factory</title>

    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
        <h1>Car Factory Header</h1>
        <p class="lead">Car Factory Starter template.</p>
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
                        <button type="submit" class="btn car-submit btn-success">Submit</button>
                    </div>

                    </form>
              </div>
            </div>
          </div>
        </div>
    
    
    </main>
    <!-- /.container -->
   
    <!-- scripts cdn's -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>


    <!-- scripts -->
    <script>
    $( document ).ready(function() {

        /* Criando um novo carro */
        $(".car-submit").click(function(e) {
            e.preventDefault();
            
            var formAction = $("#create-item").find("form").attr("action");
            var name = $("#create-item").find("input[name='name']").val();
            var brand = $("#create-item").find("input[name='brand']").val();
            var price = $("#create-item").find("input[name='price']").val();
        });
    });    
    </script>


  </body>
</html>
