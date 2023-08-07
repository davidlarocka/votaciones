<!DOCTYPE html>
<html lang="en">
<head>
  <title>Votación</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Desis app</h1>
</div>
  
<div class="container">
    <h3>Formulario de votación</h3>
  <div class="row">
    <div class="col-sm-4">
        <p>Nombre y apellido</p>
    </div>
    <div class="col-sm-2">
     <input type="text" id="name" name="name" class="form-control" placeholder="Nombre"/> 
    </div>
    <div class="col-sm-2">
     <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Apellido"/> 
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>Alias</p>
    </div>
    <div class="col-sm-4">
     <input type="text" id="alias" name="alias" class="form-control" placeholder="Alias"/> 
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>RUT</p>
    </div>
    <div class="col-sm-4">
     <input type="text" id="rut" name="rut" class="form-control" placeholder="RUT"/> 
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>Email</p>
    </div>
    <div class="col-sm-4">
     <input type="text" id="email" name="email" class="form-control" placeholder="Email"/> 
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>Región</p>
    </div>
    <div class="col-sm-4">
  
    <select id="region" name="region" class="form-control">
        <option value="" ></option>
        <?php
            foreach($param['region'] as $region){
                echo '<option value="'.$region['id'].'" >'.$region['name'].'</option>';
            }
        ?>
    </select> 
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>Comuna</p>
    </div>
    <div class="col-sm-4">
     <select id="comuna" name="comuna" class="form-control">
    </select>  
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>Candidato</p>
    </div>
    <div class="col-sm-4">
     <select id="candidato" name="candidato" class="form-control">
        <?php
            foreach($param['candidates'] as $candidate){
                echo '<option value="'.$candidate['id'].'" >'.$candidate['name_canditate'].'</option>';
            }
        ?>
    </select>  
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
        <p>¿Cómo se enteró de nosotros?</p>
    </div>
    <div class="col-sm-4">
        <?php
            foreach($param['media'] as $media){
                echo '<input type="checkbox" class="check_media" id="media'.$media['id'].'" name="media'.$media['id'].'" value="'.$media['id'].'" /> '.$media['name'] ." ";
            }
        ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
        <button class="btn btn-info" id="bnt-votar">Votar</button>
    </div>
  </div>

</div>
<script src="resources/js/validator.js" ></script>
<script src="resources/js/validatorRut.js" ></script>
</body>
</html>
