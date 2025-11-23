<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Página de Pago — FM</title>
</head>
<body>

  <main id="fm_page_wrapper">
    <div class="fm_progressbar" aria-hidden="true">
      <div class="fm_step">
        <div class="fm_step-bullet">1</div>
        <div class="fm_step-label">Carrito</div>
      </div>
      <div style="width:90px;height:2px;background:rgba(255,255,255,0.03);border-radius:2px;"></div>
      <div class="fm_step">
        <div class="fm_step-bullet" style="background:linear-gradient(90deg,var(--fm-accent),var(--fm-accent-2));">2
        </div>
        <div class="fm_step-label">Pago</div>
      </div>
      <div style="width:90px;height:2px;background:rgba(255,255,255,0.03);border-radius:2px;"></div>
      <div class="fm_step">
        <div class="fm_step-bullet">3</div>
        <div class="fm_step-label">Confirmación</div>
      </div>
    </div>


    <section class="fm_page-wrapper">

      <section class="fm_left-column">
        <div class="fm_card">
          <h3>Tarjeta de crédito o débito</h3>
          <div class="fm_card-icons" aria-hidden="true">
            <img src="img/visa.png" alt="Visa" class="fm_card-icon">
            <img src="img/mastercard.png" alt="MasterCard" class="fm_card-icon">
            <img src="img/amex.png" alt="American Express" class="fm_card-icon">
          </div>




          <form id="fm_cardform" class="fm_cardform" autocomplete="off" novalidate>
            <label class="fm_label" for="fm_card_number">Número de la tarjeta</label>
            <input id="fm_card_number" class="fm_input" inputmode="numeric" maxlength="19"
              placeholder="XXXX XXXX XXXX XXXX" aria-label="Número de tarjeta" />


            <label class="fm_label" for="fm_card_name">Titular de la tarjeta</label>
            <input id="fm_card_name" class="fm_input" placeholder="Nombre completo" aria-label="Nombre en la tarjeta" />


            <div class="fm_input-row">
              <div style="flex:1;">
                <label class="fm_label" for="fm_card_exp">Vencimiento</label>
                <input id="fm_card_exp" class="fm_input" placeholder="MM/AA" maxlength="5" inputmode="numeric" />
              </div>
              <div style="width:140px;">
                <label class="fm_label" for="fm_card_cvc">Código de seguridad (CVC)</label>
                <input id="fm_card_cvc" class="fm_input" placeholder="CVC" maxlength="4" inputmode="numeric" />
              </div>
            </div>



          </form>
        </div>


        <div class="fm_card" style="margin-top:14px;">
          <h3>Métodos alternativos</h3>
          <div class="fm_payment-methods">
            <a href="https://www.paypal.com/signin?locale.x=es_AR" role="button" class="fm_method-button"
              id="fm_paypal_btn" data-target="paypal.html">
              <div class="fm_method-name">
                <strong>PayPal</strong>
                <span style="font-size:12px;color:var(--fm-subtext)">Pagar con PayPal</span>
              </div>

            </a>


            <a href="https://wallet.google.com/wallet/u/0/home?utm_source=pgc&utm_medium=website&utm_campaign=redirect"
              role="button" class="fm_method-button" id="fm_googlepay_btn" data-target="googlepay.html">
              <div class="fm_method-name">
                <strong>Google Pay</strong>
                <span style="font-size:12px;color:var(--fm-subtext)">Pagar con Google</span>
              </div>

            </a>


            <a href="https://www.apple.com/la/apple-pay/" role="button" class="fm_method-button" id="fm_applepay_btn"
              data-target="applepay.html">
              <div class="fm_method-name">
                <strong>Apple Pay</strong>
                <span style="font-size:12px;color:var(--fm-subtext)">Pagar con Apple</span>
              </div>

            </a>
          </div>
        </div>
      </section>



      <aside class="fm_right-column">
        <div class="fm_summary fm_card">
          <h3>Resumen del pedido</h3>

          <?php
          foreach ($carrito_a_pagar['productos'] as $item):
            $precio_linea = $item['precio_unitario'] * $item['cantidad'];
            ?>
            <article class="fm_order-item">
              <div class="fm_item-thumb" aria-hidden="true">
                <img src="img/<?php echo htmlspecialchars($item['imagen']); ?>"
                  alt="<?php echo htmlspecialchars($item['nombre']); ?>" class="fm_thumb-img">
              </div>

              <div class="fm_item-info">
                <div style="font-weight:700"><?php echo htmlspecialchars($item['nombre']); ?></div>
                <div style="font-size:12px;color:var(--fm-subtext)">Plataforma:
                  <?php echo htmlspecialchars($item['plataforma']); ?></div>
                <br>
                <div>$<?php echo number_format($precio_linea, 2); ?></div>
              </div>
              <div class="fm_item-meta">
                <br>
                <div style="font-weight:700">x<?php echo htmlspecialchars($item['cantidad']); ?></div>
              </div>
            </article>
          <?php endforeach; ?>

          <div class="fm_total-row">
            <div>Total</div>
            <div style="font-weight:800">$<?php echo number_format($carrito_a_pagar['total'], 2); ?></div>
          </div>

        </div>


        <p class="fm_small-note">
          Adquirirás una licencia digital de este producto. Para ver todos los términos, consulta la política de compra.


          Al seleccionar "Realizar pedido" a continuación, declaras que eres mayor de 18 años, confirmas que tienes
          autorización para usar este método de pago y aceptas el Acuerdo de licencia de usuario final.
        </p>


        <a href="confirmacion.html" class="fm_submit-btn transparent" id="fm_finalize_btn">
          Realizar pedido
        </a>




        </div>
      </aside>
    </section>
  </main>




</body>

</html>