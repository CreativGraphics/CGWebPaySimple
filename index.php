<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
  //---------------------------------------------------------------//
  //        STATICKÉ ÚDAJE KTORÉ TREBA NAPEVNO ZADAŤ V KÓDE        //
  //---------------------------------------------------------------//

  $merchantNumber = "xxxxxxxxxx";              // ID obchodníka
  $privateKey = "private_key_file_name";       // názov súboru súkromného klúču (klúč treba vložiť do zložky /cgwebpaysimple/key/)
  $privateKeyPassword = "K3yP455w0Rd";         // heslo k súkromnému klúču
  $publicKey = "public_key_file_name";         // názov súboru verejného klúču (klúč treba vložiť do zložky /cgwebpaysimple/key/)
  $publicKeyGP = "gp_public_key_file_name";    // názov súboru verejného klúču portálu GP WebPay (klúč treba vložiť do zložky /cgwebpaysimple/key/)
  $returnURL = "https://exampleshop.com";      // URL adresa na ktorú bude zákazník presmerovaný po odoslaní platby
  $buttonText = "Zaplatiť";                    // text tlačidla - môže obsahovať aj HTML tagy (napr. fontawesome ikonky atď.)
  $production = false;                         // prepnutie testovacieho a produkčného módu (false = testovanie (default), true = produkcia)

  //---------------------------------------------------------------//
  //        DYNAMICKÉ ÚDAJE KTORÉ JE MOŽNO ŤAHAŤ Z DATABÁZY        //
  //---------------------------------------------------------------//

  $paymentNumber = "123456";                   // ID platby
  $orderNumber = "123456";                     // ID objednávky
  $price = "15039";                            // suma (musí byť v tvare bez desatinných čísel, suma 15039 reprezentuje 150,39€)
  $clientEmail = "email@example.com";          // email zákazníka na ktorý príde potvrdenie o platbe

  //---------------------------------------------------------------//
  //     POUŽITIE PLUGINU - nasledujúce riadky sú vždy rovnaké     //
  //---------------------------------------------------------------//

  // IMPORT PLUGINU PRE PLATBU
  require_once 'cgwebpaysimple/CGWebPaySimple.php';

  // INICIALIZÁCIA PLUGINU
  $cgWebPaySimple = new CGWebPaySimple($production); // parameter $production je nepovinný (default je false)
  $cgWebPaySimple->init($merchantNumber, $privateKey, $privateKeyPassword, $publicKey, $publicKeyGP);

  // VYGENEROVANIE TLAČIDLA PRE ZAPLATENIE
  $cgWebPaySimple->getForm($paymentNumber, $orderNumber, $price, $clientEmail, $returnURL, $buttonText);
  ?>
</body>

</html>