<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
<?php
    include "includes/config/db.php";

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        $str_bienvenida = "Iniciar sesión";
        $str_link = "login";
    } else {
        $str_bienvenida = $_SESSION["nombre"];
        $str_link = "my-account";
    }
    ?>
    
    <main class="contenedor-home">
    <section>
        <div class="contenedor-texto titulo-home tit" id="titulo"></div>
        <div class="contenedor-texto texto-home eff" id="texto"></div>
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="img/slide-1.png" />
                </li>
                <li>
                    <img src="img/slide-2.png" />
                </li>
                <li>
                    <img src="img/slide-3.png" />
                </li>
            </ul>
        </div>
        <div class="contenedor-texto titulo-home titAlt" id="titulo2"></div>
    </section>


<!-- FlexSlider -->
<script defer src="js/jquery.flexslider-min.js"></script>

<script>
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
        });
    });
</script>

    <div class="encabezado">
        <a>DESIGNERS</a>
    </div>

    <div class="destacados">
            <section class ="destacado">
                <div class="cuadro">
                    <div class ="img-destacado">
                        <img src="img/dest1.jpg" alt="dest1">
                    </div>
                </div>
                <div class="desc-index">
                    <a><b>BURBERRY</b></a><br>
                    <p>Capas de otoño, por Riccardo Tisci.</p>
                </div>
            </section>

            <section class ="destacado">
                <div class="cuadro">
                    <div class ="img-destacado">
                        <img src="img/dest3.jpg" alt="dest2">
                    </div>
                </div>
                <div class="desc-index">
                    <a><b>FERRAGAMO</b></a><br>
                    <p>Básicas, modernas y elegantes.</p>
                </div>
            </section>

            <section class ="destacado">
                <div class="cuadro">
                    <div class ="img-destacado">
                        <img src="img/dest2.jpg" alt="dest3">
                    </div>
                </div>
                <div class="desc-index">
                    <a><b>PARA EXTERIORES</b></a><br>
                    <p>De piel, por Balenciaga.</p>
                </div>
            </section>

            <section class ="destacado">
                <div class="cuadro">
                    <div class ="img-destacado">
                        <img src="img/dest6.png" alt="dest4">
                    </div>
                </div>
                <div class="desc-index">
                    <a><b>TOM FORD</b></a><br>
                    <p>Apuesta por su sastrería elegante.</p>
                </div>
            </section>

            <section class ="destacado">
                <div class="cuadro">
                    <div class ="img-destacado">
                        <img src="img/dest4.png" alt="dest5">
                    </div>
                </div>
                <div class="desc-index">
                    <a><b>JIL SANDLER</b></a><br>
                    <p>Prendas tejidas y accesorios de lujo.</p>
                </div>
            </section>

            <section class ="destacado">
                <div class="cuadro">
                    <div class ="img-destacado">
                        <img src="img/dest5.png" alt="dest6">
                    </div>
                </div>
                <div class="desc-index">
                    <a><b>ISABEL MARANT</b></a><br>
                    <p>Descubre sus diseños color block.</p>
                </div>
            </section>
        </div>
        

</main>

<script lenguage="javascript">
    function anim(contenedor,texto,intervalo){
        // Calculamos la longitud del texto
        longitud = texto.length;
        // Obtenemos referencia del div donde se va a alojar el texto.
        cnt = document.getElementById(contenedor);
        var i=0;
        // Creamos el timer
        timer = setInterval(function(){
            // Vamos añadiendo letra por letra y la _ al final.
            cnt.innerHTML = cnt.innerHTML.substr(0,cnt.innerHTML.length-1) + texto.charAt(i) + "_";
            // Si hemos llegado al final del texto..
            if(i >= longitud){
                // Salimos del Timer y quitamos la barra baja (_)
                clearInterval(timer);
                cnt.innerHTML = cnt.innerHTML.substr(0,longitud+12);
                return true;
            } else {
                // En caso contrario.. seguimos
                i++;
            }},intervalo);
    };

    var texto = "When fashion and technology come together, incredible things start to happen. People can share ideas and develop new ways of thinking and working consigning old, less sustainable ones to history. We want to use our platform to engage and empower people to drive positive change across the fashion industry. \nThat means putting in place the foundations that give END employees, innovators and partners the platform to make a difference.  This covers everything from the work required to deliver good governance of ethical, environmental and social issues, to the support we give all employees to live their values at work.";
    // 100 es el intervalo de minisegundos en el que se escribirá cada letra.
    anim("texto",texto,10);
</script>

<script lenguage="javascript">
    function anim2(contenedor2,titulo,intervalo2){
        // Calculamos la longitud del texto
        longitud2 = titulo.length;
        // Obtenemos referencia del div donde se va a alojar el texto.
        cnt2 = document.getElementById(contenedor2);
        var j=0;
        // Creamos el timer
        timer2 = setInterval(function(){
            // Vamos añadiendo letra por letra y la _ al final.
            cnt2.innerHTML = cnt2.innerHTML.substr(0,cnt2.innerHTML.length-1) + titulo.charAt(j) + "_";
            // Si hemos llegado al final del texto..
            if(j >= longitud2){
                // Salimos del Timer y quitamos la barra baja (_)
                clearInterval(timer2);
                cnt2.innerHTML = cnt2.innerHTML.substr(0,longitud2+12);
                return true;
            } else {
                // En caso contrario.. seguimos
                j++;
            }},intervalo2);
    };

    var titulo = "END exists for the love of fashion. We believe in empowering individuality. Our mission is to be a platform for luxury fashion, connecting creators and consumers.";
    // 100 es el intervalo de minisegundos en el que se escribirá cada letra.
    anim2("titulo",titulo,10);
</script>

<script lenguage="javascript">
    function anim3(contenedor3,titulo2,intervalo3){
        // Calculamos la longitud del texto
        longitud3 = titulo2.length;
        // Obtenemos referencia del div donde se va a alojar el texto.
        cnt3 = document.getElementById(contenedor3);
        var k=0;
        // Creamos el timer
        timer3= setInterval(function(){
            // Vamos añadiendo letra por letra y la _ al final.
            cnt3.innerHTML = cnt3.innerHTML.substr(0,cnt3.innerHTML.length-1) + titulo2.charAt(k) + "_";
            // Si hemos llegado al final del texto..
            if(k >= longitud3){
                // Salimos del Timer y quitamos la barra baja (_)
                clearInterval(timer3);
                cnt3.innerHTML = cnt3.innerHTML.substr(0,longitud3+12);
                return true;
            } else {
                // En caso contrario.. seguimos
                k++;
            }},intervalo3);
    };

    var titulo2 = "END exists for the love of fashion. We believe in empowering individuality. Our mission is to be a platform for luxury fashion, connecting creators and consumers.";
    // 100 es el intervalo de minisegundos en el que se escribirá cada letra.
    anim3("titulo2",titulo2,10);
</script>

<script lenguage="javascript">
    const toggleButton = document.getElementById('button-menu')
    const navWrapper = document.getElementById('nav')

    toggleButton.addEventListener('click',() => {
    toggleButton.classList.toggle('close')
    navWrapper.classList.toggle('show')
    })

    navWrapper.addEventListener('click',e => {
    if(e.target.id === 'nav'){
        navWrapper.classList.remove('show')
        toggleButton.classList.remove('close')
    }
    })
</script>

<script type='text/javascript'>
	document.oncontextmenu = function(){return false}
</script>

<?php
    incluirTemplate('footer');
?>