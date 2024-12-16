// Seleccionamos los elementos del DOM (Parrafos)
const longitudParrafo = document.getElementById("longitud");
const latitudParrafo = document.getElementById("latitud");
const altitudParrafo = document.getElementById("altitud");
const precisionParrafo = document.getElementById("precision");
const velocidadParrafo = document.getElementById("velocidad");
const direccionParrafo = document.getElementById("direccion");



// Verificar si el navegador soporta la geolocalización
// if ("geolocation" in navigator) {  // Si existe la propiedad geolocation en el objeto navigator (es decir, en el navegador)
//     console.log("Geolocalización soportada");

//     // Obtener la ubicación actual del usuario
//     navigator.geolocation.getCurrentPosition((position) => {
//         // Obtener las coordenadas de latitud y longitud.
//         let user_latitud = position.coords.latitude;
//         let user_longitud = position.coords.longitude;
//         let user_precision = position.coords.accuracy;
//         let user_altitud = position.coords.altitude;
//         let user_velocidad = position.coords.speed;
//         let user_direccion = position.coords.heading;
        
//         // Hacer algo con las coordenadas, como mostrarlas en la página o en consola.
//         console.log(`Latitud: ${user_latitud}`);
//         console.log(`Longitud: ${user_longitud}`);
//         console.log(`Precision: ${user_precision}`);
//         console.log(`Altitud: ${user_altitud}`);
//         console.log(`Velocidad: ${user_velocidad}`);
//         console.log(`Direccion: ${user_direccion}`);
//     })
// }else{
//     console.log("Geolocalización no soportada");
// };




// Ejemplo de uso con watchPosition() y clearWatch():
if ("geolocation" in navigator) {
    console.log("Geolocalización soportada");

    // Rastrear los cambios en la ubicación del usuario
    let watchId = navigator.geolocation.watchPosition((position) => {

        console.log("Seguimiento iniciado");

        // Obtener las coordenadas de latitud y longitud
        let user_latitud = position.coords.latitude;
        let user_longitud = position.coords.longitude;
        let user_precision = position.coords.accuracy;
        let user_altitud = position.coords.altitude;
        let user_velocidad = position.coords.speed;
        let user_direccion = position.coords.heading;

        // Hacer algo con las coordenadas, como mostrarlas en la página o en consola.
        console.log(`Latitud: ${user_latitud}`);
        console.log(`Longitud: ${user_longitud}`);
        console.log(`Precisión: ${user_precision}`);
        console.log(`Altitud: ${user_altitud}`);
        console.log(`Velocidad: ${user_velocidad}`);
        console.log(`Dirección: ${user_direccion}`);

        // Mostrar las coordenadas en el DOM
        longitudParrafo.innerText = user_longitud || "S/I";
        latitudParrafo.innerText = user_latitud || "S/I";
        altitudParrafo.innerText = user_altitud || "S/I";
        precisionParrafo.innerText = user_precision || "S/I";
        velocidadParrafo.innerText = user_velocidad || "S/I";
        direccionParrafo.innerText = user_direccion || "S/I";

        // Detener el seguimiento después de 30 segundos
        setTimeout(() => {
            navigator.geolocation.clearWatch(watchId);
            console.log("Seguimiento detenido");
        }, 30000);
    });

    console.log("ID de seguimiento: " + watchId);
} else {
    console.log("Geolocalización no soportada");
};




// Ejemplo de uso con getCurrentPosition() y Google Maps:
function ubicarme() {
    const status = document.getElementById("status");
    const linkMapa = document.getElementById("map-link");

    // Función que se ejecuta si se obtiene la ubicación
    function success(ubicacion) {
        const latitud = ubicacion.coords.latitude;
        const longitud = ubicacion.coords.longitude;

        status.innerText = "¡Te encontre!";
        linkMapa.href = `https://www.google.com/maps/@${latitud},${longitud},80m/data=!3m1!1e3?entry=ttu`;
        // linkMapa.href = `https://www.openstreetmap.org/#map=18/${latitud}/${longitud}`;
        
        linkMapa.innerText = `Latitud: ${latitud}°, Longitud: ${longitud}°`;
    }

    // Función de error en caso de no poder obtener la ubicación
    function error() {
        status.innerText = "No se pudo obtener su ubicación";
    }

    if (navigator.geolocation) {
        status.innerText = "Localizando…";
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        status.innerText = "Geolocalización no soportada en su navegador";
    }
}

document.getElementById("encontrarme").addEventListener("click", ubicarme);