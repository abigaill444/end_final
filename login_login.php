<?php

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<body>
    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a END.</h2>
                <p>Si ya tienes una cuenta, por favor inicia sesion aquí.</p>
                <a href="registro_login.html"> <button class="sign-up-btn">Iniciar sesión</button></a>
            </div>
        </div>


        <form class="formulario" action="index.html" method="post">
            <h2 class="create-account">Crear una cuenta</h2>
            <div class="iconos">
                <div class="border-icon" class="button">
                    <a href="https://www.instagram.com"> <i class='bx bxl-instagram'></i></a>
                </div>
                <div class="border-icon">
                    <a href="https://www.linkedin.com"> <i class='bx bxl-linkedin' ></i></a>
                </div>
                <div class="border-icon">
                    <a href="https://www.linkedin.com"> <i class='bx bxl-facebook-circle' ></i></a>
                </div>
            </div>
            <p class="cuenta-gratis">Crear una cuenta gratis</p>
            <input type="text" placeholder="Nombre">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Contraseña">
            <input type="submit" value="Registrarse">
        </form>
    </div> 
    <!-- <div class="container-form sign-in">
        <form class="formulario" action="index.html" method="post">
            <h2 class="create-account">Iniciar sesión</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin'>
                    </i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle' ></i>
                </div>
            </div>
            <p class="cuenta-gratis">¿Aún no tienes una cuenta?</p> 
            <input type="email" placeholder="Email" name="correo">
            <input type="password" placeholder="Contraseña" name="contraseña">
            <input name ="btnIniciarSesion" type="submit" value="Iniciar Sesion">
        </form>
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido de nuevo</h2>
                <p>Si aun no tienes una cuenta, por favor regístrate aqui</p>
                <a href="registro.html"><button class="sign-in-btn">Registrarse</button> </a>
            </div>
        </div>  -->
    </div>
  
</body>

</html>