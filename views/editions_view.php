<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ediciones - Juego</title>
</head>
<body>
  <div class="sf-page">
    <main class="sf-container" role="main">
      <section class="sf-hero">
        <div class="sf-meta">
          <div class="sf-kicker">GAME · Acción · 2025</div>
          <h1>God of war regnarok</h1>
          <p class="sf-sub">Ediciones disponibles — elige una para ver su contenido, precio y extras incluidos.</p>

          <div class="sf-meta-row">
            <div class="sf-badge">PLATAFORMA</div>
            <div class="sf-muted-sm">Tamaño: </div>
            <div class="sf-muted-sm">Multijugador: SI/NO</div>
          </div>
        </div>

        <div class="sf-cover" aria-hidden="true">
          
          <img src="img/God-of-War-portada.jpg" alt="Portada del juego">
            <defs>
              <linearGradient id="g" x1="0" x2="1">
                <stop offset="0" stop-color="#1b2f4f" />
                <stop offset="1" stop-color="#082137" />
              </linearGradient>
            </defs>
            <rect width="220" height="300" rx="12" fill="url(#g)" />
           
          
        </div>
      </section>

      <section class="sf-editions-panel" aria-label="Ediciones del juego">
        <div class="sf-editions-list">
          <h2 style="margin-top:0">Ediciones</h2>
          <p class="sf-muted-sm">Selecciona una edición para actualizar la ficha de la derecha.</p>

          <div class="sf-cards" id="cards">
           
<button class="sf-card" data-id="standard" type="button" aria-pressed="true">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <div>
      <div class="sf-title">Edición Estándar</div>
      <div class="sf-tag">que cosas incluye</div>
    </div>
    <div style="text-align:right">
      <div class="sf-price">PRECIO</div>
      <div class="sf-muted-sm">Precio</div>
    </div>
  </div>
</button>

<button class="sf-card" data-id="deluxe" type="button" aria-pressed="false">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <div>
      <div class="sf-title">Edición Deluxe</div>
      <div class="sf-tag">que cosas incluye</div>
    </div>
    <div style="text-align:right">
      <div class="sf-price">PRECIO</div>
      <div class="sf-muted-sm">Precio</div>
    </div>
  </div>
</button>

<button class="sf-card" data-id="ultimate" type="button" aria-pressed="false">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <div>
      <div class="sf-title">Edición Ultimate</div>
      <div class="sf-tag">que cosas incluye</div>
    </div>
    <div style="text-align:right">
      <div class="sf-price">PRECIO</div>
      <div class="sf-muted-sm">Precio</div>
    </div>
  </div>
</button>

<button class="sf-card" data-id="collector" type="button" aria-pressed="false">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <div>
      <div class="sf-title">Edición Coleccionista</div>
      <div class="sf-tag">que cosas incluye</div>
    </div>
    <div style="text-align:right">
      <div class="sf-price">PRECIO</div>
      <div class="sf-muted-sm">Precio</div>
    </div>
  </div>
</button>


<script>document.getElementById('cards')?.setAttribute('data-static','true');</script>

          </div>
        </div>

        <aside class="sf-details" id="details" aria-live="polite">
          <div style="display:flex;justify-content:space-between;align-items:flex-start">
            <div>
              <div id="edition-name" style="font-weight:800;font-size:18px">Edición Estándar</div>
              <div id="edition-tag" class="sf-muted-sm">que incluye</div>
            </div>
            <div style="text-align:right">
              <div class="sf-price-big" id="edition-price">PRECIO</div>
              <div class="sf-muted-sm">Precio sugerido</div>
            </div>
          </div>

          <div class="sf-cta">
            <button class="sf-btn sf-btn--primary" id="buyBtn">Comprar</button>
            <button class="sf-btn sf-btn--ghost" id="wishlistBtn">Agregar a lista de deseos</button>
          </div>

          <div class="sf-features">
            <h3 style="margin-bottom:6px">Qué incluye</h3>
            <ul id="features-list">
              
            </ul>
          </div>

          <div style="margin-top:12px">
            <div class="sf-muted-sm">Detalles</div>
            <div class="sf-muted-sm">Versión digital • Entrega instantánea • Idiomas: ES / EN</div>
          </div>

          <div class="sf-screenshot-strip" aria-hidden="true" style="margin-top:12px">
            <div class="sf-shot">
    <img src="img/God-of-War-img1.jpg" alt="Captura del juego">
  </div>
  <div class="sf-shot">
    <img src="img/God-of-War-img2.jpg" alt="Captura del juego">
  </div>
  <div class="sf-shot">
    <img src="img/God-of-War-img3.jpg" alt="Captura del juego">
  </div>
  <div class="sf-shot">
    <img src="img/God-of-War-img4.jpg" alt="Captura del juego">
  </div>
          </div>
        </aside>
      </section>

    </main>
  </div>


<script>
(function(){
  console.clear();
  console.log('[ED] Iniciando módulo robusto de ediciones');

  
  const $id = (id) => document.getElementById(id);
  const log = (...a) => console.log('[ED]', ...a);

  const cardsEl = $id('cards');
  if (!cardsEl) {
    console.error('[ED] No existe #cards en el DOM. Asegurate que el id sea correcto.');
    return;
  }

  const editionsData = {
    standard: { name:'Edición Estándar', tag:'Incluye el juego base', price:1199, features:['Juego base','Actualizaciones gratuitas','Soporte multijugador'] },
    deluxe:   { name:'Edición Deluxe',   tag:'Contenido digital adicional', price:1799, features:['Juego base','Pase de temporada (1 DLC)','Traje exclusivo','Banda sonora digital'] },
    ultimate: { name:'Edición Ultimate', tag:'Todo el contenido + extras físicos (ed. limitada)', price:2599, features:['Juego base','Pase de temporada completo','Contenido cosmético completo','Artbook digital','Pack de inicio en línea'] },
    collector:{ name:'Edición Coleccionista', tag:'Caja coleccionista + extras físicos', price:4999, features:['Caja metálica','Figura 20cm','Artbook físico','Banda sonora física','Todos los contenidos digitales'] }
  };

  function formatPrice(n){
    try { return n.toLocaleString('es-AR',{style:'currency',currency:'ARS'}).replace(',00',''); }
    catch(e){ return '$' + n; }
  }

  
  function ensureCardsExist(){
    const existing = cardsEl.querySelectorAll('.sf-card');
    if (existing && existing.length > 0) {
      log('Se detectaron tarjetas estáticas existentes:', existing.length);
      return; 
    }
    
    log('No había tarjetas — creando fallback estático desde JS');
    Object.keys(editionsData).forEach(key => {
      const ed = editionsData[key];
      const btn = document.createElement('button');
      btn.className = 'sf-card';
      btn.type = 'button';
      btn.dataset.id = key;
      btn.style.display = 'block';
      btn.style.padding = '14px';
      btn.style.margin = '8px 0';
      btn.innerHTML = `
        <div style="display:flex;justify-content:space-between;align-items:center">
          <div>
            <div class="sf-title">${ed.name}</div>
            <div class="sf-tag">${ed.tag}</div>
          </div>
          <div style="text-align:right">
            <div class="sf-price">${formatPrice(ed.price)}</div>
            <div class="sf-muted-sm">Precio</div>
          </div>
        </div>`;
      cardsEl.appendChild(btn);
    });
  }

  
  function initListeners(){
    
    cardsEl.addEventListener('click', (e) => {
      const btn = e.target.closest('.sf-card');
      if (!btn || !cardsEl.contains(btn)) return;
      const id = btn.dataset.id;
      if (!id) { log('Tarjeta sin data-id'); return; }
      selectEdition(id);
    });
    log('Listener de click en tarjetas inicializado (delegación).');
  }

  
  function selectEdition(id){
    const data = editionsData[id];
    if (!data) {
      log('selectEdition: id no encontrado', id);
      return;
    }

    
    document.querySelectorAll('.sf-card').forEach(c => {
      c.classList.toggle('sf-card--active', c.dataset.id === id);
      c.setAttribute('aria-pressed', c.dataset.id === id ? 'true' : 'false');
    });

    
    const nameEl = $id('edition-name');
    const tagEl = $id('edition-tag');
    const priceEl = $id('edition-price');
    const featuresEl = $id('features-list');

    if (nameEl) nameEl.textContent = data.name;
    if (tagEl) tagEl.textContent = data.tag;
    if (priceEl) priceEl.textContent = formatPrice(data.price);
    if (featuresEl) {
      featuresEl.innerHTML = '';
      data.features.forEach(f => {
        const li = document.createElement('li');
        li.textContent = f;
        featuresEl.appendChild(li);
      });
    }

    log('Seleccionada edición:', id);
  }

  
  if (window._editions_initialized) {
    log('Módulo ya inicializado (evitando doble init)');
    return;
  }
  window._editions_initialized = true;

  
  ensureCardsExist();
  initListeners();

  
  const auto = cardsEl.querySelector('.sf-card[aria-pressed="true"]')?.dataset.id
            || cardsEl.querySelector('.sf-card[data-selected="true"]')?.dataset.id
            || cardsEl.querySelector('.sf-card')?.dataset.id
            || 'standard';
  selectEdition(auto);

  
  log('Resumen: tarjetas en DOM =', cardsEl.querySelectorAll('.sf-card').length, '| selected =', auto);
  
  window._editions_debug = {
    list: () => Array.from(cardsEl.querySelectorAll('.sf-card')).map(n => ({id:n.dataset.id, html:n.innerHTML.slice(0,80)})),
    select: selectEdition
  };
})();
</script>
</body>
</html>
