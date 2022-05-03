<?php
include "Bot.php";
$bot = new Bot;
$questions = [
    //manguera o mangueras
    "que tipo de manguera?" => "La manguera deberia ser de tipo .",
    "de que medida deberia ser la manguera?" => "La medida deberia ser de .",

    //tipos de conexiones
    "tipo de conexion para una manguera de tipo?" => "El tipo de conexion de esta manguera deberia ser .",
    "tipos de conexiones de acero" => "Los tipos de conexiones de acero que manejamos en la empresa son ." ,
    
    //bandas    
    "cuales son los tipos de bandas se manejan?" => "Solo se manejan Automotrices e Industriales.",

    //adaptadores
    "adaptadores?" => "Adaptadores ---.",

    //cuples
    "cuples" => "Los cuples ---.",

    //tubos
    "tubos" => "Los tubos ---.",
    
    //info
    "información importante a considerar?" => "La empresa MHINSA ---.",
       
    //name
    "como te llamas?" =>"Soy MHINSABot y estoy para servirte",
    "cual es tu nombre?" =>"Soy MHINSABot y estoy para servirte",
    "tienes nombre?" =>"Si soy MHINSABot y estoy para servirte",

    //saludo
    "hola" =>"Hola que tal!",
    "un saludo" =>"¿Como te va?",
    "hello" =>"Un gusto de verte",
 
    //despedida
    "adios" =>"Cuidate",
    "hasta la proxima" =>"Nos vemos pronto!",
    "nos vemos" =>"Te estare esperando",
    "bye" =>"Good bye ♥",
    "see you" =>"See you lader ♥",

    "what is your name?" =>" My name is CoroBot",

    "tu nombre es?" => "Mi nombre es " . $bot->getName(),
    "tu eres?" => "Yo soy una " . $bot->getGender()
    
];

if (isset($_GET['msg'])) {
   
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hola');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Lo siento, Las preguntas deben estar relacionadas con MHINSA.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }
    });
}
?>