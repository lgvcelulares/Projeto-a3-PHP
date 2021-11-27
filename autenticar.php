<?php
    if (isset($_SESSION["login_fun"]) || isset($_SESSION["login_cliente"])) {
            echo $_SESSION["login_fun"], $_SESSION["login_cliente"];
    } else {
        echo "<script> 
				alert ('Você não está logado!!!')
        location.href = ('index.php') 
			  </script>";
			
		echo "<script> 
				location.href = ('index.php') 
			  </script>";
    }
?>