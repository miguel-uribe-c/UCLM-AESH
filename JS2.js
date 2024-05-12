document.addEventListener('DOMContentLoaded', function() {

    const datosArticulos = [
        {
            titulo: 'Marte. El planeta rojo',
            imagen: 'https://www.xtrafondos.com/descargar.php?id=12008&resolucion=3840x2160',
            enlace: 'Marte.html'
        },
        {
            titulo: 'El planeta Tierra',
            imagen: 'https://www.zonacentronoticias.com/wp-content/uploads/2014/09/TIERRA.jpg',
            enlace: 'El planeta Tierra.html'
        },
        {
            titulo: 'Lugares Turísticos más populares de México',
            imagen: 'https://images5.alphacoders.com/587/587948.jpg',
            enlace: 'Destinos Turisticos en México.html'
        },
    ];

    const contenedorContenido = $('#content');

    datosArticulos.forEach(articulo => {
        const elementoArticulo = crearElementoArticulo(articulo);
        contenedorContenido.append(elementoArticulo);
    });

    function crearElementoArticulo(articulo) {
        const elementoArticulo = $('<div class="articulo"></div>');

        const elementoImagen = $('<img>').attr('src', articulo.imagen).attr('alt', articulo.titulo);

        const elementoOverlay = $('<div class="overlay"></div>');

        const elementoTitulo = $('<h2>').text(articulo.titulo);

        const elementoEnlace = $('<a></a>').attr('href', articulo.enlace).text('Leer más');

        elementoOverlay.append(elementoTitulo, elementoEnlace);
        elementoArticulo.append(elementoImagen, elementoOverlay);

        return elementoArticulo;
    }
});




/*----------------------------------Para Recetas de Cocina-------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    const datosRecetas = [
        {
            titulo: 'Churros caseros',
            imagen: 'https://a-static.besthdwallpaper.com/churros-dipped-in-chocolate-wrap-in-a-newspaper-wallpaper-5120x2160-60583_16.jpg',
            enlace: 'Churros caseros.html'
        },
    ];

    const contenedor2Contenido = $('#content2');

    datosRecetas.forEach(receta => {
        const elementoReceta = crearElementoReceta(receta);
        contenedor2Contenido.append(elementoReceta);
    });

    function crearElementoReceta(receta) {
        const elementoReceta = $('<div class="receta"></div>');

        const elementoImagen = $('<img>').attr('src', receta.imagen).attr('alt', receta.titulo);

        const elementoCubierta = $('<div class="cubierta"></div>');

        const elementoTitulo = $('<h2>').text(receta.titulo);

        const elementoEnlace = $('<a></a>').attr('href', receta.enlace).text('Leer más');

        elementoCubierta.append(elementoTitulo, elementoEnlace);
        elementoReceta.append(elementoImagen, elementoCubierta);

        return elementoReceta;
    }
});

/*----------------------------------Para Videojuegos-------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    const datosVideojuegos = [
        {
            titulo: 'Proximamente, espera las proximas actualizaciones',
            imagen: 'https://wallpapercave.com/wp/wp5857258.jpg',
            enlace: '#'
        },
    ];

    const contenedor3Contenido = $('#content3');

    datosVideojuegos.forEach(videojuegos => {
        const elementoVideojuegos = crearElementoVideojuegos(videojuegos);
        contenedor3Contenido.append(elementoVideojuegos);
    });

    function crearElementoVideojuegos(videojuegos) {
        const elementoVideojuegos = $('<div class="videojuegos"></div>');

        const elementoImagen = $('<img>').attr('src', videojuegos.imagen).attr('alt', videojuegos.titulo);

        const elementoCubierta2 = $('<div class="cubierta2"></div>');

        const elementoTitulo = $('<h2>').text(videojuegos.titulo);

        const elementoEnlace = $('<a></a>').attr('href', videojuegos.enlace).text('Proximamente');

        elementoCubierta2.append(elementoTitulo, elementoEnlace);
        elementoVideojuegos.append(elementoImagen, elementoCubierta2);

        return elementoVideojuegos;
    }
});



/*-----------------------------------Para el formulario------------------------*/
document.getElementById('testForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var puntos = 0;

    puntos += (document.querySelector('input[name="pregunta1"]:checked').value === '2') ? 2 : 0;

    puntos += (document.querySelector('input[name="pregunta2"]:checked').value === '2') ? 2 : 0;

    puntos += (document.querySelector('input[name="pregunta3"]:checked').value === '2') ? 2 : 0;

    puntos += (document.querySelector('input[name="pregunta4"]:checked').value === '2') ? 2 : 0;

    puntos += (document.querySelector('input[name="pregunta5"]:checked').value === '2') ? 2 : 0;

    var formData = new FormData(this);
    formData.append('puntos', puntos);

    fetch('Formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    });
});


/*-------------------------Cookies-------------------------------*/
document.addEventListener('DOMContentLoaded', function() {

    function setCookie(nombre, valor, diasExpiracion) {
        var fechaExpiracion = new Date();
        fechaExpiracion.setDate(fechaExpiracion.getDate() + diasExpiracion);
        var cookieString = nombre + "=" + valor + "; expires=" + fechaExpiracion.toUTCString() + "; path=/";
        document.cookie = cookieString;
    }

    function getCookie(nombre) {
        var nombreCookie = nombre + "=";
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.indexOf(nombreCookie) === 0) {
                return cookie.substring(nombreCookie.length, cookie.length);
            }
        }
        return null;
    }

    setCookie("usuario", "x", 7);

    var usuario = getCookie("usuario");
    console.log("Usuario actual: " + usuario);

});
