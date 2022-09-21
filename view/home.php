<head>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<div class="card-columns">

    <?php
    $cmdSql = "SELECT usuario.*, imagem.link FROM usuario INNER JOIN imagem ON usuario.email = imagem.fk_usuario_email GROUP BY usuario.email;";
    $cxPronta = $cx->prepare($cmdSql);
    if ($cxPronta->execute()) {
        if ($cxPronta->rowCount() > 0) {
            $usuarios = $cxPronta->fetchAll(PDO::FETCH_OBJ);
            foreach ($usuarios as $usuario) {
                
                echo '<a href="?usuario='.$usuario->email.'"><div class="card text-center card-edit bg-dark">
                        <img class="card-img-top img-edit p-4 rounded-circle" src="' . $usuario->link . '"style="width: 300px; height: 200px;">
                        <div class="card-body bg-dark">
                        <h5 class="card-title">' . $usuario->nome . '</h5>       
                        </div>
                    </div></a> ';
            }
        }
    }
    ?>


</div>