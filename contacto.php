
<?php

require 'includes/funciones.php';
incluirTemplate('header');
?>
<body>

<link rel="stylesheet" href="CSS/styles.css">

 <body>   
    <div class="content">
 

        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Contáctanos.</h3>
                <form action="">
                    <p>
                        <label>Tu nombre completo</label>
                        <input type="text" name="fullname">
                    </p>
                    <p>
                        <label>Correo electrónico</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label>Número telefónico</label>
                        <input type="tel" name="phone">
                    </p>
                    <p>
                        <label>Asunto</label>
                        <input type="text" name="affair">
                    </p>
                    <p class="block">
                       <label>Mensaje</label> 
                        <textarea name="message" rows="3"></textarea>
                    </p>
                    <p class="block">
                        <button>
                            Enviar
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4> Más información </h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> END. Store </li>
                    <li><i class="fas fa-phone"></i> (111) 111 111 111</li>
                    <li><i class="fas fa-envelope-open-text"></i> contacto@end.mx</li>
                </ul>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero provident ipsam necessitatibus repellendus?</p>
                
            </div>
        </div>

    </div>

</body>
</html>
<?php
    incluirTemplate('footer');
?>