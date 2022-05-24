<?php

if(!extension_loaded("soap")){
    dl("php_soap.dll");
}

ini_set("soap.wsdl_chache_enabled", "0");
$server = new SoapServer("konverter_service.wsdl");

function converter($conv,  $value){
        
    switch ($conv) {
        case "b_e":
            return "Iznos: " . $value * 0.48 . " EUR";
        case "b_h":
            return "Iznos: " . $value * 3.93 . " HRK";
        case "e_b":
            return "Iznos: " . $value * 1.94 . " BAM";
        case "e_h":
            return "Iznos: " . $value * 7.53 . " HRK";
        case "h_b":
            return "Iznos: " . $value * 0.26 . " BAM";
        case "h_e":
            return "Iznos: " . $value * 0.13 . " EUR";
    }

}

$server->AddFunction("converter");
$server->handle();

?>