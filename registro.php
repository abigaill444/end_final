<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

 <link rel="stylesheet" href="CSS/styles.css">
 <link rel="stylesheet" href="CSS/stylesC.css">
    <div class="container-form sign-in">
        <form class="formulario reg" action="registroAction.php" method="post">
            <h2 class="create-account">Registro</h2>
            <!-- <p class="cuenta-gratis">¿Aún no tienes una cuenta?</p> -->
            <input type="text" placeholder="Nombre" name="nombre">
            <input type="text" placeholder="Apellido" name="apellido">
            <input type="text" placeholder="Usuario" name="usuario" id="usuario">
            <input type="email" placeholder="Email" name="correo" id="correo">
            <a id='resultado'></a>
            <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena">
            <div class="message">
                <button class="sign-in-btn" onclick="return validarCampos()">Regístrate</button>
            </div>
        </form>
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido de nuevo</h2>
                <p>¿Ya tienes una cuenta?</p>
                <a href="login.php"><button>Inicia sesión</button> </a>
            </div>
        </div> 
    </div>
  
</body>

</html>

<script lenguage="javascript">
    function validarCampos(){
        var email = document.getElementById('correo');
        var emailValido =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

        var usuario = document.getElementById('usuario');
        var usuarioValido =  /^\d{8,15}$/;

        var contrasena = document.getElementById('contrasena');
        var contrasenaValido =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/;

        if(emailValido.test(email.value)){
            if(contrasenaValido.test(contrasena.value)){
                return true;
            } else {
                alert('La contraseña no cumple con el formato correcto. Por favor, verifique.');
                return false;
            }
        }else{
            alert('El email no cumple con el formato correcto. Por favor, verifique.');
            return false;
        }
    }
    </script>
<?php
    incluirTemplate('footer');
?>