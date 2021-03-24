<?php 
  // Con require, si no cumple la condicion se para el script
  // en cambio con el include si hay error , solo lo notifica y sigue con el script
  require 'database.php';
  $mesn = '';

  
  if (!empty($_POST["emailsingup"]) && !empty($_POST['passsingup']))
  {
    $pass=$_POST["passsingup"];
    $email = $_POST['emailsingup'];
    // Los valores se envian diferentes, 
    // primero se escribe la palabra con dos puntos
    // despues se escribe un metodo de bind del stmt que prepare AQUUII
    $sql = "INSERT INTO users (email, pass) VALUES(:email, :pass)";

    // Preparo la consulta AQUIII
    $stmt = $conexion->prepare($sql);

    // Uno los datos, hay dos parametos 
     // 1 : el nombre del paramatro de dos puntos
     // 2: el valor que iria hay, en este caso las varibale post

    $stmt->bindParam(':email' , $email );

    // Cifrando PASSWORD
    $passcifrado = password_hash($pass , PASSWORD_BCRYPT);
    // el password a cifrar y despues el tipo de cifrado, en este caso BCRYPT
    // que no se que sera jajaj

    $stmt->bindParam(':pass'  , $passcifrado);


    // Ejecutando la query
    if ($stmt->execute())
    {
      $mesn = 'User created successfully ';
    }
    else
    {
      $mesn = 'No creado';      
    }

  }

?>

<!doctype html>
<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
          crossorigin="anonymous">
    <title>Resgitrer PHP</title>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Registrar</span>
    </nav>

    <button type="button" class="m-5 btn btn-outline-primary">
    <a class="nav-link w3-hover-blue" href="index.php" >Regresar</a>
    </button>
    <div class="mx-auto w3-card p-5 mt-5" style="width: 500px;">

        
        <p> <?= $mesn ?></p>
       

        <form action="singup.php" method="POST">

            <h4>Registrate a La APP</h4><br>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" 
                       id="email" 
                       name="emailsingup"
                       aria-describedby="emailHelp" 
                       placeholder="Ingrese su Email">
            </div>

            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" 
                       id="pass"
                       name="passsingup"
                       placeholder="Password">
            </div>
<!-- 
            <div class="form-group">
                <label for="passconfirm">Password</label>
                <input type="password" class="form-control" 
                       id="passconfirm"
                       name="passsignupconfirm" 
                       placeholder="Password">
            </div> -->

            <button type="submit" class="btn btn-primary btn-block">Registrar</button>

        </form>
    </div>


   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


