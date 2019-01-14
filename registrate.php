<?php  session_start();

if (isset($_SESSION['email'])) {
    # code...
    header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $errores = '';

    if (empty($email) or empty($name) or empty($password) or empty($password2)) {
        # code...
        $errores .= '<li class="list-group-item list-group-item-danger">Por favor rellena todos los campos.</li>';
    }else{
        try {
            $conexion = new PDO('pgsql:host=localhost;dbname=daw2a_comunidades', 'daw2a', 'abc123.');
        } catch (PDOException $e) {
            //throw $th;
            echo "Error: " . $e->getMessage();
            
        }
        $statement = $conexion->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
		$statement->execute(array(':email' => $email));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .= '<li class="list-group-item list-group-item-danger">El name de email ya existe</li>';
		}

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		if ($password != $password2) {
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
	}

	if ($errores == '') {
		echo "Por aqui que voy";
		$statement = $conexion->prepare('INSERT INTO USERS (email,name,password) VALUES (:email,:name,:password)');
		$statement->execute(array(
			':email' => $email,
			':name' => $name,
			':password' => $password
		));

		header('Location: login.php');
	}


}
require 'views/registrate.view.php';


?>