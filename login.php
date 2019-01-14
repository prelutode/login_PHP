<?php session_start();

if (isset($_SESSION['email'])) {
	header('Location: index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	//$password = hash('sha512', $password);

	try {
		$conexion = new PDO('pgsql:host=localhost;dbname=daw2a_comunidades', 'daw2a', 'abc123.');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}

	$statement = $conexion->prepare('
		SELECT * FROM users WHERE email = :email AND password = :password'
	);
	echo $_POST['email']." ".$_POST['password'];
	echo var_dump($statement);
	$statement->execute(array(
		':email' => $email,
		':password' => $password
	));

	$resultado = $statement->fetch();
	echo var_dump($resultado);
	if ($resultado !== false) {
		
		$_SESSION['email'] = $email;
		header('Location: index.php');
	} else {
		$errores .= '<li class="list-group-item list-group-item-danger">Datos Incorrectos</li>';
	}
	
}

require 'views/login.view.php';

?>