<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2379047864602521-041914-096516fc87c6e930d014ebb3b6221352-746003720');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Producto 1';
$item->quantity = 1;
$item->unit_price = 75.56;
$item->currency_id = "ARS";
$preference->items = array($item);






$preference->back_urls = array(
	"success" => "https://www.tu-sitio/success",
	"failure" => "http://www.tu-sitio/failure",
	"pending" => "http://www.tu-sitio/pending"
);

$preference->auto_return = "approved";
$preference->payment_methods = array(
  "installments" => 1
);



        $preference->save();
		echo $preference->id;



?>


        <form action="procesar-pago" method="POST">
            <script
                    src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                    data-preference-id="<?php echo $preference->id; ?>">
            </script>
        </form>

<!--script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"   data-preference-id="<?php echo $preference->id; ?>">
</script-->