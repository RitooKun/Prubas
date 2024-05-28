<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url;?>Assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class='container'>
        <div id='calendar'></div>
    </div>

    <div class="modal fade" id="mymodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mymodal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div> 
            <form id='formulario'>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="title" name="title">
                        <label for="title" class="form-label">Evento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="start" name="start">
                        <label for="start" class="form-label">Fecha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="color" class="form-control" id="color" name="color">
                        <label for="color" class="form-label">Color</label>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button class="btn btn-warning">Cancelar</button>
                    <button class="btn btn-danger">Eliminar</button>
                    <button class="btn btn-info" id="btnAccion" type="submit">Registrar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/index.global.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/moment.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script>
        const base_url = '<?php echo base_url; ?>';
    </script>
    <script src="<?php echo base_url; ?>Assets/js/app.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/index.global.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/es.global.js"></script>
  </body>
</html>