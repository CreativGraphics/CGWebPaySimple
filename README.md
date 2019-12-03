# CGWebPaySimple
PHP script pre jednoduchšiu integráciu platobnej brány GP WebPay.

## Nastavenie premenných
### Statické premenné
```php
$merchantNumber = "xxxxxxxxxx";              // ID obchodníka
$privateKey = "private_key_file_name";       // názov súboru súkromného klúču (klúč treba vložiť do zložky /cgwebpaysimple/key/)
$privateKeyPassword = "K3yP455w0Rd";         // heslo k súkromnému klúču
$publicKey = "public_key_file_name";         // názov súboru verejného klúču (klúč treba vložiť do zložky /cgwebpaysimple/key/)
$publicKeyGP = "gp_public_key_file_name";    // názov súboru verejného klúču portálu GP WebPay (klúč treba vložiť do zložky /cgwebpaysimple/key/)
$returnURL = "https://exampleshop.com";      // URL adresa na ktorú bude zákazník presmerovaný po odoslaní platby
$buttonText = "Zaplatiť";                    // text tlačidla - môže obsahovať aj HTML tagy (napr. fontawesome ikonky atď.)
$production = false;                         // prepnutie testovacieho a produkčného módu (false = testovanie, true = produkcia)
```

### Dynamické premenné
```php
$orderNumber = "123456";                     // ID objednávky
$price = "15039";                            // suma (musí byť v tvare bez desatinných čísel, suma 15039 reprezentuje 150,39€)
$clientEmail = "email@example.com";          // email zákazníka na ktorý príde potvrdenie o platbe
```

## Použitie scriptu
### Inicialitácia s použitím statických premenných
```php
require_once 'cgwebpaysimple/CGWebPaySimple.php';
$cgWebPaySimple = new CGWebPaySimple($merchantNumber, $privateKey, $privateKeyPassword, $publicKey, $publicKeyGP, $production);
```

### Vytvorenie tlačidla pre zaplatenie objednávky
```php
$cgWebPaySimple->getForm($orderNumber, $price, $clientEmail, $returnURL, $buttonText);
```

Tento PHP script slúži len na integráciu samotného tlačidla pre platbu. Pre správu toho čo sa má stať po úspešnom/neúspešnom je potrebné si pozrieť dokumentáciu GP WebPay a zapracovať svojpomocne. (možno bude niekedy pridané)
