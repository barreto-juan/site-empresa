<?php

    if (isset($_POST['bt_login'])) {
        $erros = "";

        if(!$_POST["nome"]){
            $erros .= "Campo login vazio! <br>";
        }if(!$_POST["senha"]){
            $erros .= "Campo senha vazio! <br>";
        }else{
            $nome = addslashes($_POST["nome"]);
            $senha = addslashes($_POST["senha"]);
        }

        if (strlen($erros) > 0) {
            header("Location: login");
            echo $erros;
            exit();
        }

        $query = "SELECT nome, senha FROM acesso WHERE nome=\"$nome\" AND senha=\"$senha\" LIMIT 1";
        $sql = $con->query($query) or die($con->error);

        if (mysqli_num_rows($sql) == 0) {
            $erros .= "Login e/ou senha incorreto(s)! <br>";
        }else{
            setcookie("login", $nome);
        }

        if (strlen($erros) > 0) {
            echo $erros;
            header("Location:login");
            exit();
        }

    }else{
        header("Location: login");
        echo "Não foi possível acessar essa página!";
        exit();
    }



?>