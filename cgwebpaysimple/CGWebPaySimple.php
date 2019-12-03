<?php

require_once('signature.php');

class CGWebPaySimple
{
  function CGWebPaySimple($merchantNumber, $privateKeyPath, $privateKeyPassword, $publicKeyPath, $publicKeyGPPath, $production = false)
  {
    $this->merchantNumber = $merchantNumber;
    $this->privateKeyPath = __DIR__ . "/key/" . $privateKeyPath;
    $this->privateKeyPassword = $privateKeyPassword;
    $this->publicKeyPath = __DIR__ . "/key/" . $publicKeyPath;
    $this->publicKeyGPPath = __DIR__ . "/key/" . $publicKeyGPPath;

    if ($production) {
      $this->gpURL = "https://3dsecure.gpwebpay.com/pgw/order.do";
    } else {
      $this->gpURL = "https://test.3dsecure.gpwebpay.com/pgw/order.do";
    }
  }

  public function getForm($ornerNumber, $price, $userEmail, $returnURL, $buttonText)
  {
    $signature = "";
    $sign = new CSignature($this->privateKeyPath, $this->privateKeyPassword, $this->publicKeyPath);
    $signature = $sign->sign($this->merchantNumber . "|CREATE_ORDER|$ornerNumber|$price|978|0|$returnURL|$userEmail");

    $signaturesFolder = __DIR__ . "/signatures/";

    if (!file_exists($signaturesFolder)) {
      mkdir($signaturesFolder);
    }

    $signatureFile = fopen($signaturesFolder . "signature." . $ornerNumber . ".sign", "w");
    fwrite($signatureFile, $signature);
    fclose($signatureFile);

    $signatureFileEncoded = fopen($signaturesFolder . "signature." . $ornerNumber . ".enc.sign", "w");
    fwrite($signatureFileEncoded, urlencode($signature));
    fclose($signatureFileEncoded);

    ?>
    <form action="<?php echo $this->gpURL ?>" method="POST" id="cg-webpay-simple-form">
      <input type="hidden" name="MERCHANTNUMBER" value="<?php echo $this->merchantNumber ?>">
      <input type="hidden" name="OPERATION" value="CREATE_ORDER">
      <input type="hidden" name="ORDERNUMBER" value="<?php echo $ornerNumber ?>">
      <input type="hidden" name="AMOUNT" value="<?php echo $price ?>">
      <input type="hidden" name="CURRENCY" value="978">
      <input type="hidden" name="DEPOSITFLAG" value="0">
      <input type="hidden" name="URL" value="<?php echo $returnURL ?>">
      <input type="hidden" name="EMAIL" value="<?php echo $userEmail ?>">
      <input type="hidden" name="DIGEST" value="<?php echo $signature ?>">
      <button type="submit"><?php echo $buttonText ?></button>
    </form>
<?php
  }
}
