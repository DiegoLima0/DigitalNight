// General

// Modal o ventana flotante para support.php o configAccount_view.php 
const abrirModal = document.querySelector("#abrirModal");
const cerrarModal = document.querySelector("#cerrarModal");
const modal = document.querySelector("#modal");

if (abrirModal && modal) {
  abrirModal.addEventListener("click", (e) => {
    modal.showModal();
  });
}

if (cerrarModal && modal) {
  cerrarModal.addEventListener("click", () => {
    modal.close();
  });
}


const abrirModal2 = document.querySelector("#abrirModal2");
const cerrarModal2 = document.querySelector("#cerrarModal2");
const modal2 = document.querySelector("#modal2");

if (abrirModal2 && modal2) {
  abrirModal2.addEventListener("click", (e) => {
    modal2.showModal();
  });
}

if (cerrarModal2 && modal2) {
  cerrarModal2.addEventListener("click", () => {
    modal2.close();
  });
}

//Iniciar sesion
const passInput = document.getElementById("password");
const toggleEye = document.getElementById("toggleEye");

if (passInput && toggleEye) {
  toggleEye.addEventListener("click", () => {
    if (passInput.type === "password") {
      passInput.type = "text";
      toggleEye.classList.remove("bi-eye-slash");
      toggleEye.classList.add("bi-eye");
    } else {
      passInput.type = "password";
      toggleEye.classList.remove("bi-eye");
      toggleEye.classList.add("bi-eye-slash");
    }
  });
}

//Carrito
(() => {

  // Imagen de reemplazo para productos sin imagen
  const PLACEHOLDER_IMG = 'default.png';


  const btnCarrito = document.getElementById('Btn-Carrito') || document.querySelector('.Btn-Carrito');
  const carritoLateral = document.getElementById('carritoLateral');
  const listaEl = document.getElementById('Lista-Productos');
  const totalEl = document.getElementById('Suma-Total-Precios');
  let overlay = document.getElementById('overlay');
  const iniciarBtn = document.getElementById('iniciarBtn'); // Botón de iniciar compra

  if (!carritoLateral || !listaEl || !totalEl) {
    console.warn('Carrito: faltan elementos required (carritoLateral, Lista-Productos, Suma-Total-Precios).');
  }


  if (!overlay) {
    overlay = document.createElement('div');
    overlay.id = 'overlay';
    document.body.appendChild(overlay);
  }


  const STORAGE_KEY = 'mi_carrito_v2';
  function loadCart() {
    try {
      const raw = sessionStorage.getItem(STORAGE_KEY);
      return raw ? JSON.parse(raw) : {};
    } catch (e) {
      console.error('Error parsing cart storage', e);
      return {};
    }
  }
  function saveCart(cart) {
    try {
      sessionStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
    } catch (e) {
      console.error('Error saving cart', e);
    }
  }
  const cart = loadCart();


  function openCart() {
    carritoLateral && carritoLateral.classList.add('active');
    overlay.classList.add('show');
    document.body.classList.add('carrito-abierto');
   /*  render(); */
  }
  function closeCart() {
    carritoLateral && carritoLateral.classList.remove('active');
    overlay.classList.remove('show');
    document.body.classList.remove('carrito-abierto');
  }

  if (btnCarrito) btnCarrito.addEventListener('click', openCart);
  overlay.addEventListener('click', closeCart);
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeCart(); });


  function render() {
    if (!listaEl || !totalEl) return;
  listaEl.innerHTML = ''; // limpiar lista antes de renderizar

  const items = Object.values(cart);
  if (items.length === 0) {
    const p = document.createElement('p');
    p.textContent = 'Tu carrito está vacío.';
    p.style.color = 'rgba(255,255,255,0.8)';
    listaEl.appendChild(p);
    totalEl.textContent = '$0.00';
    return;
  }

  items.forEach(it => {
    const li = document.createElement('li');
    li.className = 'carrito-item';
    li.dataset.id = it.id;

    // La imagen debe tener la ruta completa si es un path relativo
    const imgSrc = it.img && it.img.startsWith('img/') ? it.img : `img/${it.img}`;

    li.innerHTML = `
      <div class="thumb"><img src="${escapeHtml(imgSrc || PLACEHOLDER_IMG)}" alt=""></div>
      <div class="meta">
        <div class="nombre">${escapeHtml(it.nombre)}</div>
        <div class="plataforma">Plataforma: ${escapeHtml(it.plataforma || 'plataformas')}</div>
        <div class="precio">$${it.precio.toFixed(2)}</div>
      </div>
      <div class="controls">
        <button class="btn-trash" title="Eliminar" aria-label="Eliminar">🗑</button>
      </div>
    `;

    const trashBtn = li.querySelector('.btn-trash');
    if (trashBtn) trashBtn.addEventListener('click', () => removeItem(it.id));

    listaEl.appendChild(li);
  });

  const total = items.reduce((s, x) => s + x.precio, 0);
  totalEl.textContent = '$' + total.toFixed(2);
  }


  function addItem(product) {
    if (!product || !product.id) return;
    cart[product.id] = {
      id: product.id,
      nombre: product.nombre || 'Nombre del juego',
      plataforma: product.plataforma || 'plataformas',
      precio: Number(product.precio) || 0,
      img: product.img || PLACEHOLDER_IMG
    };
    saveCart(cart);
    /* render(); */
  }

  function removeItem(id) {
    if (!cart[id]) return;
    delete cart[id];
    saveCart(cart);
    /* render(); */
  }

  function escapeHtml(s) {
    if (s === undefined || s === null) return '';
    return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
  }

  function iniciarCompra() {

    const total = items.reduce((s, x) => s + x.precio, 0).toFixed(2);

    const carritoParaServidor = {
      productos: items.map(item => ({
        id: item.id,
        nombre: item.nombre,
        plataforma: item.plataforma,
        precio_unitario: item.precio,
        cantidad: 1,
        imagen: item.img ? item.img.replace(/^(img\/)/, '') : 'default.png'
      })),
      total: total
    };

    if (iniciarBtn) iniciarBtn.disabled = true;

    fetch('save_cart.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(carritoParaServidor)
    })
      .then(response => {
        if (!response.ok) {
          return response.json().then(err => {
            throw new Error(err.message || `Error del servidor: ${response.status}`);
          }).catch(() => {
            throw new Error(`Error del servidor (HTTP ${response.status}).`);
          });
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          window.location.href = 'pay-page.php';
        } else {
          alert('Error al guardar el carrito en el servidor: ' + (data.message || 'Error desconocido.'));
        }
      })
      .catch(error => {
        console.error('Error en iniciarCompra:', error);
        alert('Ocurrió un error al procesar la compra. Intenta de nuevo. Detalles: ' + error.message);
        if (iniciarBtn) iniciarBtn.disabled = false;
      });
  }

  if (iniciarBtn) {
    iniciarBtn.addEventListener('click', iniciarCompra);
  }

  window.miCarritoUI = {
    addItem,
    removeItem,
    _cart: cart
  };


  /* render(); */


})();

//Página Soporte support.php
let faqs = document.querySelectorAll(".faq");

if (faqs.length > 0) {
  faqs[0].classList.add("active");

  faqs.forEach((faq, index) => {
    const pregunta = faq.querySelector(".ques");
    if (!pregunta) return;

    pregunta.addEventListener("click", () => {
      if (faq.classList.contains("active")) {
        faq.classList.remove("active");

        const otherIndex = index === 0 ? 1 : 0;
        faqs[otherIndex]?.classList.add("active");
      }

      else {
        faqs.forEach(f => f.classList.remove("active"));
        faq.classList.add("active");
      }
    });
  });
}


//Página de respuesta de la página de soporte (answerFAQ)

function marcar(boton) {
  const botones = boton.parentElement.querySelectorAll('button');

  botones.forEach(b => b.classList.remove('clicked'));

  boton.classList.add('clicked');
}

//Página Sobre Nosotros AboutUs.php
window.addEventListener("beforeunload", () => {
  sessionStorage.setItem("scrollPos", window.scrollY);
});

window.addEventListener("load", () => {
  const scrollPos = sessionStorage.getItem("scrollPos");
  if (scrollPos) {
    window.scrollTo(0, scrollPos);
  }
});

const acordeones = document.querySelectorAll('.Acordeon-Contenido-Historia');

acordeones.forEach((acordeon) => {
  const cabecera = acordeon.querySelector('.Cabecera-acordeon');
  const flecha = acordeon.querySelector('#Flecha-Abajo-Acordeon-Historia');

  cabecera.addEventListener('click', () => {
    const activo = acordeon.classList.contains('activo');

    acordeones.forEach((a) => {
      a.classList.remove('activo');
      const f = a.querySelector('#Flecha-Abajo-Acordeon-Historia');
      f.classList.remove('rotada');
    });

    if (!activo) {
      acordeon.classList.add('activo');
      flecha.classList.add('rotada');
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const tarjetas = document.querySelectorAll(".tarjetaMiembro");

  window.mostrarTarjeta = function (id) {
    tarjetas.forEach(t => t.classList.remove("activa"));

    const seleccionada = document.getElementById(id);
    if (seleccionada) {
      seleccionada.classList.add("activa");
    }
  };
});

//Página shop.php
(function () {
  const slider = document.querySelector('.slider');
  const slides = document.querySelectorAll('.slider > a');
  const navLinks = document.querySelectorAll('.slider-nav a');
  const btnPrev = document.getElementById('prev');
  const btnNext = document.getElementById('next');

  if (!slider) return;

  const total = slides.length;
  let index = 0;
  let autoSlide;

  function update() {
    slider.style.transform = `translateX(-${index * 100}%)`;
    navLinks.forEach((a, i) => a.classList.toggle('active', i === index));
  }

  function prev() {
    index = (index - 1 + total) % total;
    update();
  }

  function next() {
    index = (index + 1) % total;
    update();
  }

  function startAutoSlide() {
    autoSlide = setInterval(next, 4000);
  }

  function resetAutoSlide() {
    clearInterval(autoSlide);
    startAutoSlide();
  }

  startAutoSlide();

  navLinks.forEach((a, i) => {
    a.addEventListener('click', function (e) {
      e.preventDefault();
      index = i;
      update();
      resetAutoSlide();
    });
  });

  if (btnPrev) btnPrev.addEventListener('click', () => { prev(); resetAutoSlide(); });
  if (btnNext) btnNext.addEventListener('click', () => { next(); resetAutoSlide(); });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') { prev(); resetAutoSlide(); }
    if (e.key === 'ArrowRight') { next(); resetAutoSlide(); }
  });

  update();
})();


//pay-page

(function fm_initPaymentPage() {
  const fmCardForm = document.getElementById('fm_cardform');
  const fmCardNumber = document.getElementById('fm_card_number');
  const fmCardExp = document.getElementById('fm_card_exp');
  const fmCardCvc = document.getElementById('fm_card_cvc');
  const fmCardName = document.getElementById('fm_card_name');
  const fmSubmitCardBtn = document.getElementById('fm_submit_card_btn');
  const fmPaypalBtn = document.getElementById('fm_paypal_btn');
  const fmGooglePayBtn = document.getElementById('fm_googlepay_btn');
  const fmApplePayBtn = document.getElementById('fm_applepay_btn');
  const fmFinalizeBtn = document.getElementById('fm_finalize_btn');

  fmCardNumber.addEventListener('input', function () { fm_formatCardNumber(this); });
  fmCardExp.addEventListener('input', function () { fm_formatCardExpiry(this); });
  fmCardCvc.addEventListener('input', function () { this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4); });

  fmCardForm.addEventListener('submit', function (e) {
    e.preventDefault();
    fm_handleCardSubmit({
      number: fmCardNumber.value,
      name: fmCardName.value,
      exp: fmCardExp.value,
      cvc: fmCardCvc.value
    });
  });

  [fmPaypalBtn, fmGooglePayBtn, fmApplePayBtn].forEach(el => {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      const target = el.getAttribute('data-target') || '#';
      fm_redirectToExternalMethod(target);
    });
  });

  fmFinalizeBtn.addEventListener('click', function () {
    window.location.href = 'confirmacion.html';
  });

  function fm_formatCardNumber(input) {
    let v = input.value.replace(/\D/g, '').slice(0, 16);
    v = v.match(/.{1,4}/g)?.join(' ') || v;
    input.value = v;
  }

  function fm_formatCardExpiry(input) {
    let v = input.value.replace(/\D/g, '').slice(0, 4);
    if (v.length >= 3) v = v.slice(0, 2) + '/' + v.slice(2);
    input.value = v;
  }

  function fm_showNotice(msg) { alert(msg); }

  function fm_validateCardForm(data) {
    const numClean = data.number.replace(/\s/g, '');
    if (numClean.length < 13) return 'Número de tarjeta inválido';
    if (!/^[0-9]{2}\/[0-9]{2}$/.test(data.exp)) return 'Vencimiento inválido (MM/AA)';
    if (!/^[0-9]{3,4}$/.test(data.cvc)) return 'CVC inválido';
    if (data.name.trim().length < 2) return 'Nombre en la tarjeta inválido';
    return null;
  }

  function fm_handleCardSubmit(data) {
    fmSubmitCardBtn.disabled = true;
    fmSubmitCardBtn.textContent = 'Procesando...';
    const error = fm_validateCardForm(data);
    if (error) {
      fm_showNotice(error);
      fmSubmitCardBtn.disabled = false;
      fmSubmitCardBtn.textContent = 'Pagar con tarjeta';
      return;
    }
    setTimeout(() => {
      fm_showNotice('Pago aprobado (simulado). Redirigiendo a confirmación.');
      window.location.href = 'confirmacion.html';
    }, 1200);
  }

  function fm_redirectToExternalMethod(targetUrl) {
    window.location.href = targetUrl;
  }
})();

//Página perfil (profile.php)

function mostrarSeccion(id) {
  document.querySelectorAll('.seccion')
    .forEach(t => t.classList.remove('activa'));

  document.getElementById(id).classList.add('activa');
}

function marcarSeccion(boton) {
  const botones = boton.parentElement.querySelectorAll('.btnGris');

  botones.forEach(b => b.classList.remove('activa'));

  boton.classList.add('activa');
}


//editions

document.addEventListener('DOMContentLoaded', () => {

  console.log("[editions] modo tarjetas estáticas");

  const editions = {
    standard: {
      name: 'Edición Estándar',
      tag: 'Incluye el juego base',
      price: 1199,
      features: ['Juego base', 'Actualizaciones gratuitas', 'Soporte multijugador']
    },
    deluxe: {
      name: 'Edición Deluxe',
      tag: 'Contenido digital adicional',
      price: 1799,
      features: ['Juego base', 'Pase de temporada (1 DLC)', 'Traje exclusivo', 'Banda sonora digital']
    },
    ultimate: {
      name: 'Edición Ultimate',
      tag: 'Todo el contenido + extras físicos (ed. limitada)',
      price: 2599,
      features: ['Juego base', 'Pase de temporada completo', 'Contenido cosmético completo', 'Artbook digital', 'Pack de inicio en línea']
    },
    collector: {
      name: 'Edición Coleccionista',
      tag: 'Caja coleccionista + extras físicos',
      price: 4999,
      features: ['Caja metálica', 'Figura 20cm', 'Artbook físico', 'Banda sonora física', 'Todos los contenidos digitales']
    }
  };

  function formatPrice(n) {
    return n.toLocaleString('es-AR', { style: 'currency', currency: 'ARS' }).replace(',00', '');
  }


  function selectEdition(id) {
    const data = editions[id];
    if (!data) return;


    document.querySelectorAll('.sf-card').forEach(btn => {
      btn.classList.toggle('sf-card--active', btn.dataset.id === id);
    });


    document.getElementById('edition-name').textContent = data.name;
    document.getElementById('edition-tag').textContent = data.tag;
    document.getElementById('edition-price').textContent = formatPrice(data.price);

    const list = document.getElementById('features-list');
    list.innerHTML = '';
    data.features.forEach(f => {
      const li = document.createElement('li');
      li.textContent = f;
      list.appendChild(li);
    });
  }


  document.querySelectorAll('.sf-card').forEach(btn => {
    btn.addEventListener('click', () => {
      selectEdition(btn.dataset.id);
    });
  });

  selectEdition('standard');
});

/*Juego de la serpiente*/