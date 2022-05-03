<?php include 'conexion.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistente Virtual</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body background="./Resources/icono2.jpg">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">MHINSA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.html">Home</a>
                <a class="nav-item nav-link" href="#">Tipos de Mangueras</a>
                <a class="nav-item nav-link" href="#">Tipos de Conexiones</a>
                <a class="nav-item nav-link" href="Catálogo.html">Cátalogo</a>
                <a class="nav-item nav-link" href="asistentevirtual.php">Asistente Virtual</a>
            </div>
        </div>
    </nav>

    <div class="menu">
        <div class="chatbox">
            <main class="container">
                <br />
                <div class="body" id="chatbody">
                    <p class="alicia">Hola! soy MHINSABot. Estoy para responder preguntas relacionadas con la empresa. Espero poder ayudarte.</p>  
                                                          
                            <?php                            
                                if(!empty($_POST)){
                                    $aKeyword = explode(" ", $_POST['PalabraClave']);
                                    $query ="SELECT * FROM cursos WHERE lenguaje like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";
                                    for($i = 1; $i < count($aKeyword); $i++) {
                                        if(!empty($aKeyword[$i])) {
                                            $query .= "OR descripcion like '%" . $aKeyword[$i] . "%'";
                                        }
                                    }
                                $result = $db->query($query);
                                echo "<b class='me'> ". $_POST['PalabraClave']."</b>";                     
                                if(mysqli_num_rows($result) > 0) {
                                    $row_count=0;
                                    echo "<br><table class='table alicia' border>";
                                    While($row = $result->fetch_assoc()) {   
                                        $row_count++;                         
                                        echo "<tr><td>".$row_count." </td><td>". $row['lenguaje'] . "</td><td>". $row['descripcion'] . "</td></tr>";
                                    }
                                    echo "</table>";
	                            }
                                else {
                                    echo "<b class='alicia'>Resultados encontrados: Ninguno</b>";
                                }
                                } 
                            ?>

                </div>  
                <form class="chat" method="post" autocomplete="off">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput"></label>
                            <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese tu busqueda">  
                            <input name="buscar" type="hidden" id="btn" value="Enviar">
                        </div>
                        <div>
                            <button type="hidden">Enviar</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

</body>
</html>