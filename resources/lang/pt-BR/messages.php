<?php

$hora_do_dia = date("H");

$saudacao =  (($hora_do_dia >=6) && ($hora_do_dia <=12)) ? "Bom dia" : "Olá";
$saudacao =  (($hora_do_dia >12) && ($hora_do_dia <=18)) ? "Boa tarde" : $saudacao;
$saudacao =  (($hora_do_dia >18) && ($hora_do_dia <=24)) ? "Boa noite" : $saudacao;
$saudacao =  (($hora_do_dia >1) && ($hora_do_dia <6)) ? "Já são ".$hora_do_dia." da manhã" : $saudacao;


return [
    'welcome' => $saudacao
];