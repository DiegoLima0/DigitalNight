//Página Soporte support.php
let faqs = document.querySelectorAll(".faq");

faqs.forEach(faq => {
    faq.querySelector(".ques").addEventListener("click", () => {
        if (faq.classList.contains("active")) {
            faq.classList.remove("active");
            return;
        }

        faqs.forEach(f => f.classList.remove("active"));

        faq.classList.add("active");
    });
});

//Página Sobre Nosotros AboutUs.php
function mostrarTarjeta(miembroID) {
    let tarjetas = document.querySelectorAll('.tarjetaMiembro');
    tarjetas.forEach(t => t.classList.remove('activa'));

    let tarjeta = document.getElementById(miembroID);
    if (tarjeta) tarjeta.classList.add('activa');
}

document.querySelector('#tarjetas').scrollIntoView({ behavior: 'smooth' }); //Sirve para no bajar de golpe luego de tocar una de las imagenes

function contraseña() {
    let tarjetas = document.querySelectorAll('.tarjetaMiembro');
    tarjetas.forEach(t => t.classList.remove('activa'));

    let tarjeta = document.getElementById(miembroID);
    if (tarjeta) tarjeta.classList.add('activa');
}

