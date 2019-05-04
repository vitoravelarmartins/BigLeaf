<?php
    session_start();

    $servidor ="localhost";
    $usuario ="root";
    $senha ="root";
    $bdnome ="bigleaf";
    $porta ="3307";

    $conn = mysqli_connect($servidor,$usuario,$senha,$bdnome,$porta);

    if(!$conn){
        die("Falha na conexão ".mysqli_connect_erro());

    }else{
        echo("Conectado no banco ");
    }

    $email = $_POST["email"];
    $senha = $_POST["pass"];

    $query = "SELECT * FROM login where email ='$email' and senha='$senha'";
    
    $result= mysqli_query($conn,$query);
    
    
    if(mysqli_num_rows($result)>0){
        echo('<br>'.'sim é maior'.'<br>');
        $retornoDoSelect = mysqli_fetch_array($result);
        print_r($retornoDoSelect);
        $pagina= $retornoDoSelect['idlogin'];
        header('location:'.$pagina.'.php');
    }else{
        $_SESSION['erro'] = 'Usuario ou Senha Inválida';
        header('location:index.php');
    }
