<!DOCTYPE html>
<html>
    <head>
        <title>Analisador</title>
    </head>
    <style>
    body {background-color: #1C1C1C	; color: #F0F8FF	;}

    </style>
    <body link="#87CEFA" alink="#87CEFA" vlink="#87CEFA">
        <div align="center">
        
        <font face="Verdana">
        <h3>Informe a Pagina a ser analisada:</h3>
        
        <form method="post">
            <input type="text" name="nome" size="50" >
            <input type="submit" name="acao" value=">">
        </form><br><br>

        <?php
        ini_set('display_errors', 0 );
        error_reporting(0);
            if(isset($_POST['acao'])){
                echo "<h2>{$_POST['nome']}</h2>";
                if (substr($_POST['nome'], 0, 4) != 'http'){
                    $pagina = 'http://'.$_POST['nome'];   
                } 
                else{
                    $pagina = $_POST['nome'];
                } 
                $homepage = file_get_contents($pagina);
                $id = substr_count($homepage, 'id=') ;
                $botao = substr_count($homepage, '<button') ;
                $checkb = substr_count($homepage, 'type="checkbox"') ;
                $entrt = substr_count($homepage, 'input type="text"') ;
                $javas = substr_count($homepage, 'type="text/javascript"') ;
                $imgs = substr_count($homepage, '<img ') ;

                $tota = $id + $botao + $entrt + $checkb;

                if($tota == 0){
                    echo "<h3>Não parece um Site</h3>";
                }
                else {
                    echo "<b>{$id} Elementos identificados por ID</b><br>";
                    echo "<b>{$botao} Botoes</b><br>";
                    echo "<b>{$checkb} Checkboxes</b><br>";
                    echo "<b>{$entrt} Entradas de Texto</b><br>";
                    echo "<b>{$imgs} Imagens na Pagina</b><br>";
                    if ($javas > 0){
                        echo "<b>Contem Elementos em JavaScript</b><br>";
                    }
                    echo '<br><br><a href=\''.$pagina.'\'" target="_blank" style="text-decoration:none">Acesse a Pagina</a>';
                }
            }

        ?>
    </font>
    </div>
    </body>
</html>