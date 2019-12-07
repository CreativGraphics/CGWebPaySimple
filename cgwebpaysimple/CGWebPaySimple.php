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

  function getCodeText($type)
  {
    $text = null;
    $array = null;
    $code = null;
    if ($type == "PR") {
      $array = $this->prCodes;
      if (isset($_GET["PRCODE"])) {
        $code = $_GET["PRCODE"];
        $text = "Neznáma odpoveď";
      } elseif (isset($_POST["PRCODE"])) {
        $code = $_POST["PRCODE"];
        $text = "Neznáma odpoveď";
      }
    } elseif ($type == "SR") {
      $array = $this->srCodes;
      if (isset($_GET["SRCODE"])) {
        $code = $_GET["SRCODE"];
        $text = "Neznáma odpoveď";
      } elseif (isset($_POST["SRCODE"])) {
        $code = $_POST["SRCODE"];
        $text = "Neznáma odpoveď";
      }
    }
    foreach ($array as $responseCode) {
      if ($responseCode["code"] == $code) {
        $text = $responseCode["meaning"];
      }
    }
    return $text;
  }

  public function getPRCode()
  {
    return $this->getCodeText('PR');
  }

  public function getSRCode()
  {
    return $this->getCodeText('SR');
  }

  public function init($merchantNumber, $privateKeyPath, $privateKeyPassword, $publicKeyPath, $publicKeyGPPath)
  {
    $this->merchantNumber = $merchantNumber;
    $this->privateKeyPath = __DIR__ . "/key/" . $privateKeyPath;
    $this->privateKeyPassword = $privateKeyPassword;
    $this->publicKeyPath = __DIR__ . "/key/" . $publicKeyPath;
    $this->publicKeyGPPath = __DIR__ . "/key/" . $publicKeyGPPath;
  }

  function getSignature($paymentNumber, $orderNumber, $price, $userEmail, $returnURL){
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

    return $signature;
  }

  public function getForm($paymentNumber, $orderNumber, $price, $userEmail, $returnURL, $buttonText)
  {
    $signature = $this->getSignature($paymentNumber, $orderNumber, $price, $userEmail, $returnURL);

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

  public function openPayment($paymentNumber, $orderNumber, $price, $userEmail, $returnURL){
    
    $signature = $this->getSignature($paymentNumber, $orderNumber, $price, $userEmail, $returnURL);

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
    </form>
    <script>
      document.getElementById("cg-webpay-simple-form").submit();
    </script>
<?php
  }
}
