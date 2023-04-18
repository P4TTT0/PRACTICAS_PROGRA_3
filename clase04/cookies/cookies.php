<?php

$cookieUno = "Soy la cookie UNO";
$cookieDos = "Soy la cookie DOS";
//$cookieTres = "Soy la cookie TRES";

setcookie("testCookieUno", $cookieUno);
setcookie("testCookieDos", $cookieDos, time() + 15); //EXPIRA EN 15 SEGUNDOS
//setcookie("testCookieUno", $cookieDos, time() + 1)
?>
