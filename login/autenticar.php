<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['senha']))
{
		include_once('../php/conexao.php');
		$email = $_POST['email'];
		$senha = $_POST['senha'];
	
		$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

		$result = $conexao->query($sql);
		
			if(mysqli_num_rows($result) <1)
			
				{
					unset($_SESSION['email']);
					unset($_SESSION['senha']);
					echo '<script>alert("Dados incorretos ou usuário inativo, contate o Administrador!")</script>';
				echo '<script>window.location="index.php"</script>';
				exit();
				}
				else 
				{
					$_SESSION['email']=$email;
					$_SESSION['senha']=$senha;
					header('Location: ../usu.php');
				}
				


}
else
{
	header('Location: index.php');
}

?>