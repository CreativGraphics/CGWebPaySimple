<?php

$prCodes = array(
  array(
    "code" => "0",
    "meaning" => "OK"
  ),
  array(
    "code" => "1",
    "meaning" => "Príliš dlhé pole"
  ),
  array(
    "code" => "2",
    "meaning" => "Príliš krátke pole"
  ),
  array(
    "code" => "3",
    "meaning" => "Chybný obsah pola"
  ),
  array(
    "code" => "4",
    "meaning" => "Pole je prázdne"
  ),
  array(
    "code" => "5",
    "meaning" => "Chýba povinné pole"
  ),
  array(
    "code" => "6",
    "meaning" => "Pole neexistuje"
  ),
  array(
    "code" => "11",
    "meaning" => "Neznámy obchodník"
  ),
  array(
    "code" => "14",
    "meaning" => "Duplicitné číslo platby"
  ),
  array(
    "code" => "15",
    "meaning" => "Objekt nenájdený"
  ),
  array(
    "code" => "16",
    "meaning" => "Čiastka k autorizácii prekročila pôdovnú čiastku platby"
  ),
  array(
    "code" => "17",
    "meaning" => "Čiastka k zaplateniu prekročila pololenú (autorizovanú) čiastku"
  ),
  array(
    "code" => "18",
    "meaning" => "Súčet vrátených čiastok prekročil zaplatenú čiastku"
  ),
  array(
    "code" => "20",
    "meaning" => "Objekt není v stave zodpovedajúcemu tejto operácií"
  ),
  array(
    "code" => "25",
    "meaning" => "Uživateľ není oprávnený k prevedeniu operácie"
  ),
  array(
    "code" => "26",
    "meaning" => "Technický problém pri spojení s autorizačným centrom"
  ),
  array(
    "code" => "27",
    "meaning" => "Chybný typ plaby"
  ),
  array(
    "code" => "28",
    "meaning" => "Zamietnuté v 3D"
  ),
  array(
    "code" => "30",
    "meaning" => "Zamietnuté v autorizačnom centre"
  ),
  array(
    "code" => "31",
    "meaning" => "Chybný popis"
  ),
  array(
    "code" => "32",
    "meaning" => "Expirovaná karta"
  ),
  array(
    "code" => "33",
    "meaning" => "Originálna/Master platba nie je autorizovaná"
  ),
  array(
    "code" => "34",
    "meaning" => "Originálnu/Master platbu nie je možné použiť pre nasledujúce platby"
  ),
  array(
    "code" => "35",
    "meaning" => "Expirovaná session"
  ),
  array(
    "code" => "38",
    "meaning" => "Nepodporovaná karta"
  ),
  array(
    "code" => "40",
    "meaning" => "Zamietnuté vo Fraud detection system"
  ),
  array(
    "code" => "50",
    "meaning" => "Držiteľ kart zrušil platbu"
  ),
  array(
    "code" => "80",
    "meaning" => "Duplicitné MessageID"
  ),
  array(
    "code" => "82",
    "meaning" => "V HSM chybí názov šifrovacieho klúču"
  ),
  array(
    "code" => "83",
    "meaning" => "Operácia zrušená vydávateľom"
  ),
  array(
    "code" => "84",
    "meaning" => "Duplicitná hodnota"
  ),
  array(
    "code" => "85",
    "meaning" => "Zakázané na základe pravidiel obchodníka"
  ),
  array(
    "code" => "200",
    "meaning" => "Žiadosť o doplňujúce informácie"
  ),
  array(
    "code" => "300",
    "meaning" => "Podmienečne zamietnuté - vydavateľ vyžaduje SCA"
  ),
  array(
    "code" => "1000",
    "meaning" => "Technický problém"
  )
);

$srCodes = array(
  array(
    "code" => "0",
    "meaning" => "Bez významu"
  ),
  array(
    "code" => "1",
    "meaning" => "ORDERNUMBER"
  ),
  array(
    "code" => "2",
    "meaning" => "MERCHANTNUMBER"
  ),
  array(
    "code" => "3",
    "meaning" => "PAN"
  ),
  array(
    "code" => "4",
    "meaning" => "EXPIRY"
  ),
  array(
    "code" => "5",
    "meaning" => "CVV"
  ),
  array(
    "code" => "6",
    "meaning" => "AMOUNT"
  ),
  array(
    "code" => "7",
    "meaning" => "CURRENCY"
  ),
  array(
    "code" => "8",
    "meaning" => "DEPOSITFLAG"
  ),
  array(
    "code" => "10",
    "meaning" => "MERORDERNUM"
  ),
  array(
    "code" => "11",
    "meaning" => "CREDITNUMBER"
  ),
  array(
    "code" => "12",
    "meaning" => "OPERATION"
  ),
  array(
    "code" => "14",
    "meaning" => "ECI"
  ),
  array(
    "code" => "18",
    "meaning" => "BATCH"
  ),
  array(
    "code" => "22",
    "meaning" => "ORDER"
  ),
  array(
    "code" => "24",
    "meaning" => "URL"
  ),
  array(
    "code" => "25",
    "meaning" => "MD"
  ),
  array(
    "code" => "26",
    "meaning" => "DESC"
  ),
  array(
    "code" => "34",
    "meaning" => "DIGEST"
  ),
  array(
    "code" => "43",
    "meaning" => "ORIGINAL ORDER NUMBER"
  ),
  array(
    "code" => "45",
    "meaning" => "USERPARAM1"
  ),
  array(
    "code" => "70",
    "meaning" => "VRCODE"
  ),
  array(
    "code" => "71",
    "meaning" => "USERPARAM2"
  ),
  array(
    "code" => "72",
    "meaning" => "FASTPAYID"
  ),
  array(
    "code" => "73",
    "meaning" => "PAYMETHOD"
  ),
  array(
    "code" => "83",
    "meaning" => "ADDINFO"
  ),
  array(
    "code" => "84",
    "meaning" => "MPS_CHECKOUT_ID"
  ),
  array(
    "code" => "86",
    "meaning" => "PAYMETHODS"
  ),
  array(
    "code" => "88",
    "meaning" => "DEPOSIT_NUMBER"
  ),
  array(
    "code" => "89",
    "meaning" => "RECURRING_ORDER"
  ),
  array(
    "code" => "90",
    "meaning" => "PAIRING"
  ),
  array(
    "code" => "91",
    "meaning" => "SHOP_ID"
  ),
  array(
    "code" => "92",
    "meaning" => "PANPATTERN"
  ),
  array(
    "code" => "93",
    "meaning" => "TOKEN"
  ),
  array(
    "code" => "95",
    "meaning" => "FASTTOKEN"
  ),
  array(
    "code" => "96",
    "meaning" => "SUBMERCHANT INFO"
  ),
  array(
    "code" => "97",
    "meaning" => "TOKEN_HSM_LABEL"
  ),
  array(
    "code" => "98",
    "meaning" => "CUSTOM INSTALLMENT COUNT"
  ),
  array(
    "code" => "99",
    "meaning" => "COUNTRY"
  ),
  array(
    "code" => "100",
    "meaning" => "TERMINAL INFO"
  ),
  array(
    "code" => "101",
    "meaning" => "TERMINAL ID"
  ),
  array(
    "code" => "102",
    "meaning" => "TERMINAL OWNER"
  ),
  array(
    "code" => "103",
    "meaning" => "TERMINAL CITY"
  ),
  array(
    "code" => "104",
    "meaning" => "MC ASSIGNED ID"
  ),
  array(
    "code" => "3000",
    "meaning" => "Neoverené v 3D. Vydavateľ karty nie je zapojený do 3D alebo karta nebola aktivovaná."
  ),
  array(
    "code" => "3001",
    "meaning" => "Držiteľ karty overený."
  ),
  array(
    "code" => "3002",
    "meaning" => "Neoverené v 3D. Vydavateľ karty alebo karta nie je zapojená do 3D."
  ),
  array(
    "code" => "3004",
    "meaning" => "Neoverené v 3D. Vydavateľ karty nie je zapojený do 3D alebo karta nebola aktivovaná."
  ),
  array(
    "code" => "3005",
    "meaning" => "Zamietnuté v 3D. Technický problém pri overení držiteľa karty."
  ),
  array(
    "code" => "3006",
    "meaning" => "Zamietnuté v 3D. Technický problém pri overení držiteľa karty."
  ),
  array(
    "code" => "3007",
    "meaning" => "Zamietnuté v 3D. Technický problém v systému zúčtujúcej banky. Kontaktujte obchodníka."
  ),
  array(
    "code" => "3008",
    "meaning" => "Zamietnuté v 3D. Bola použitá nepodporovaná karta."
  ),
  array(
    "code" => "1001",
    "meaning" => "Zamietnuté v autorizačnom centre, katra blokovaná."
  ),
  array(
    "code" => "1002",
    "meaning" => "Zamietnuté v autorizačnom centre, autorizácia zamietnutá bez udania dôvodu."
  ),
  array(
    "code" => "1003",
    "meaning" => "Zamietnuté v autorizačnom centre, problém karty."
  ),
  array(
    "code" => "1004",
    "meaning" => "Zamietnuté v autorizačnom centre, technický problém."
  ),
  array(
    "code" => "1005",
    "meaning" => "Zamietnuté v autorizačnom centre, problém účtu."
  )
);
