# CGWebPaySimple

PHP script pre jednoduchšiu integráciu platobnej brány GP WebPay.

## Nastavenie premenných

### Statické premenné

```php
$merchantNumber = "xxxxxxxxxx";                  // ID obchodníka
$privateKey = "private_key_file_name";           // názov súboru súkromného klúču (klúč treba vložiť do zložky /cgwebpaysimple/key/)
$privateKeyPassword = "K3yP455w0Rd";             // heslo k súkromnému klúču
$publicKey = "public_key_file_name";             // názov súboru verejného klúču (klúč treba vložiť do zložky /cgwebpaysimple/key/)
$publicKeyGP = "gp_public_key_file_name";        // názov súboru verejného klúču portálu GP WebPay (klúč treba vložiť do zložky /cgwebpaysimple/key/)
$returnURL = "https://exampleshop.com";          // URL adresa na ktorú bude zákazník presmerovaný po odoslaní platby
$buttonText = "Zaplatiť";                        // text tlačidla - môže obsahovať aj HTML tagy (napr. fontawesome ikonky atď.)
$production = false;                             // prepnutie testovacieho a produkčného módu (false = testovanie, true = produkcia)
```

### Dynamické premenné

```php
$paymentNumber = "123456";                       // ID platby - pre jednu objednávku môže byť viac platieb, pre prípad že nejaká neprejde, preto je potrebné zadať ID platby
$orderNumber = "123456";                         // ID objednávky
$price = "15039";                                // suma (musí byť v tvare bez desatinných čísel, suma 15039 reprezentuje 150,39€)
$clientEmail = "email@example.com";              // email zákazníka na ktorý príde potvrdenie o platbe
```

## Použitie scriptu

### Vytvorenie inštancie scriptu

```php
require_once 'cgwebpaysimple/CGWebPaySimple.php';
$cgWebPaySimple = new CGWebPaySimple($production);        // parameter $production je nepovinný (default je false)
```

### Inicialitácia s použitím statických premenných

```php
$cgWebPaySimple->init($merchantNumber, $privateKey, $privateKeyPassword, $publicKey, $publicKeyGP);
```

### Vytvorenie tlačidla pre zaplatenie objednávky

Použité parametre sú popísané v sekcii **Nastavenie premenných** vyššie

```php
$cgWebPaySimple->getForm($paymentNumber, $orderNumber, $price, $clientEmail, $returnURL, $buttonText);
```

### Získanie významov kódov

Vypísanie významov kódov ktoré vráti platobná brána po presmerovaní späť na eshop. Hodnoty ktoré sa vypisujú je možné upraviť v súbore `/cgwebpaysimple/return_codes.php`. Pre vypísanie týchto hodnôt nie je potrebné mať inicializáciu scriptu, stačí vytvorená inštancia.

```php
echo $cgWebPaySimple->getPRCode();        // primárny kód
echo $cgWebPaySimple->getSRCode();        // sekundárny kód
```
