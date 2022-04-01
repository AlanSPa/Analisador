<!DOCTYPE html>
<html>
    <head>
        <title>Chat Fuki</title>
    </head>
    <style>
    body {background-color: #336699;}
    </style>
    <body>
        
        <font face="Verdana">
        <h3>Informe a Pagina a ser analisada:</h3>
        <form method="post">
            <input type="text" name="nome" size="50" >
            <input type="submit" name="acao" value=">">
        </form><br><br>

        <?php
            if(isset($_POST['acao'])){
                echo "<h2>{$_POST['nome']}</h2>";
                $homepage = file_get_contents($_POST['nome']);
                echo substr_count($homepage, 'id=') ." Elementos com Identificação por ID<br>";
                echo substr_count($homepage, '<button') ." Botoes<br>";
                echo substr_count($homepage, 'type="checkbox"') ." Checkboxs<br>";

            }

        ?>
    </font>
    </body>
</html>