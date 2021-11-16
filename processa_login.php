<?php
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "phpa3celulares");

    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $consulta_func = "SELECT id_func, nome_func, login_func, senha_func, tipo_func FROM funcionario
        WHERE login_func = '$login' 
        AND senha_func = '$senha'";

    $consulta_cliente = "SELECT id_cliente, nome_cliente, login_cliente, senha_cliente
        WHERE  login_cliente = '$login' 
        AND senha_cliente = '$senha'";

    $resultado_func = mysqli_query($conectar, $consulta_func);

    $linhas_func = mysqli_num_rows($resultado_func);

    $resultado_cliente = mysqli_query($conectar, $resultado_cliente);

    $linhas_clientes = mysqli_num_rows($resultado_cliente);

    if ($linhas_func == 1){
        $registro = mysqli_fetch_row($resultado_func);
		$_SESSION["id_func"] = $registro[0];
		$_SESSION["nome_func"] = $registro[1];
		$_SESSION["login_func"] = $registro[2];
        $_SESSION["senha_func"] = $registro[4];
        $_SESSION["tipo_func"] = $registro[5];

        echo "<script> 
					location.href = ('administracao.php') 
              </script>";              
    }elseif ($linhas_clientes == 1) {
        $registro = mysqli_fetch_row($resultado_cliente);
		$_SESSION["id_cliente"] = $registro[0];
		$_SESSION["nome_cliente"] = $registro[1];
		$_SESSION["login_cliente"] = $registro[2];
        $_SESSION["senha_cliente"] = $registro[4];
        
        echo "<script> 
					location.href = ('compras.php') 
			  </script>";
    }else{
        echo "<script> 
				  alert ('Login ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
    }
?>