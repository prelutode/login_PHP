<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="views/css/register.css" type="text/css"> 
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>
<body>
<div class="container">
        <img src="views/img/logo_vecinos.png" width="80" height="80" class="logo" alt="logo">
		<div id="my-tab-content" class="tab-content">
		<p>
            <div id="header">
                <i class="fas fa-user"></i>		
                <h4> Accede</4>
            </div>
			<form "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-signin text-center" name="login">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                        <div id="button">
                            <button class="btn" type="submit">ENVIAR</button>
                        </div>
                </div>
                <?php if(!empty($errores)): ?>
				    <div class="error">
                        <ul>
                            <?php echo $errores; ?>
                        </ul>
				    </div>
			    <?php endif; ?>
             </form>
             <div style="text-align: center;">
                <a href="registrate.php">Aún no te has registrado?</a>
                <a href="#">Has olvidado tu contraseña?</a>
            </div>
		</div>
    </div>
    

</body>
</html>