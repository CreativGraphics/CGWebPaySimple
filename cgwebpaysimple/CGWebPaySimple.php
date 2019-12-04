<?php

require_once('signature.php');

class CGWebPaySimple
{
  function CGWebPaySimple($production = false)
  {
    require_once('return_codes.php');
    $this->prCodes = $prCodes;
    $this->srCodes = $srCodes;
    if ($production) {
      $this->gpURL = "https://3dsecure.gpwebpay.com/pgw/order.do";
    } else {
      $this->gpURL = "https://test.3dsecure.gpwebpay.com/pgw/order.do";
    }
  }

  public function getPRCode()
  {
    $prText = null;
    $prCode = null;
    if (isset($_GET["PRCODE"])) {
      $prCode = $_GET["PRCODE"];
    } elseif (isset($_POST["PRCODE"])) {
      $prCode = $_POST["PRCODE"];
    } else {
      $prCode = null;
    }
    foreach ($this->prCodes as $code) {
      if ($code->code == $prCode) {
        $prText = $code->meaning;
      }
    }
    return $prText;
  }

  public function getSRCode()
  {
    $srText = null;
    $srCode = null;
    if (isset($_GET["SRCODE"])) {
      $srCode = $_GET["SRCODE"];
    } elseif (isset($_POST["SRCODE"])) {
      $srCode = $_POST["SRCODE"];
    } else {
      $srCode = null;
    }
    foreach ($this->srCodes as $code) {
      if ($code->code == $srCode) {
        $srText = $code->meaning;
      }
    }
    return $srText;
  }

  public function init($merchantNumber, $privateKeyPath, $privateKeyPassword, $publicKeyPath, $publicKeyGPPath)
  {
    $this->merchantNumber = $merchantNumber;
    $this->privateKeyPath = __DIR__ . "/key/" . $privateKeyPath;
    $this->privateKeyPassword = $privateKeyPassword;
    $this->publicKeyPath = __DIR__ . "/key/" . $publicKeyPath;
    $this->publicKeyGPPath = __DIR__ . "/key/" . $publicKeyGPPath;
  }

  public function getForm($paymentNumber, $orderNumber, $price, $userEmail, $returnURL, $buttonText)
  {
    $signature = "";
    $sign = new CSignature($this->privateKeyPath, $this->privateKeyPassword, $this->publicKeyPath);
    $signature = $sign->sign($this->merchantNumber . "|CREATE_ORDER|$paymentNumber|$price|978|0|$orderNumber|$returnURL|$userEmail");

    $signaturesFolder = __DIR__ . "/signatures/";

    if (!file_exists($signaturesFolder)) {
      mkdir($signaturesFolder);
    }

    $signatureFile = fopen($signaturesFolder . "signature." . $orderNumber . ".sign", "w");
    fwrite($signatureFile, $signature);
    fclose($signatureFile);

    $signatureFileEncoded = fopen($signaturesFolder . "signature." . $orderNumber . ".enc.sign", "w");
    fwrite($signatureFileEncoded, urlencode($signature));
    fclose($signatureFileEncoded);

    ?>
    <form action="<?php echo $this->gpURL ?>" method="POST" id="cg-webpay-simple-form">
      <input type="hidden" name="MERCHANTNUMBER" value="<?php echo $this->merchantNumber ?>">
      <input type="hidden" name="OPERATION" value="CREATE_ORDER">
      <input type="hidden" name="ORDERNUMBER" value="<?php echo $paymentNumber ?>">
      <input type="hidden" name="AMOUNT" value="<?php echo $price ?>">
      <input type="hidden" name="CURRENCY" value="978">
      <input type="hidden" name="DEPOSITFLAG" value="0">
      <input type="hidden" name="MERORDERNUM" value="<?php echo $orderNumber ?>">
      <input type="hidden" name="URL" value="<?php echo $returnURL ?>">
      <input type="hidden" name="EMAIL" value="<?php echo $userEmail ?>">
      <input type="hidden" name="DIGEST" value="<?php echo $signature ?>">
      <button type="submit"><?php echo $buttonText ?></button>
    </form>
<?php
  }
}
