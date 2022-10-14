<?php
   require_once 'vendor/autoload.php';

   use BotMan\BotMan\BotMan;
   use BotMan\BotMan\BotManFactory;
   use BotMan\BotMan\Drivers\DriverManager;
   
   //la config permet d'utiliser le bot sur defferente application tels telegram, facebook...
   $config = [
    // Your driver-specific configuration
    // "telegram" => [
    //    "token" => "TOKEN"
    // ]
];
//chargement du pilote web avant la création de l'instance BotMan
   DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

//création de l'instance BotMan
   $botman = BotManFactory::create($config);

  // On donne des mots à écouter au bot et il répond
$botman->hears('Salut|Bonjour(.*)', function (BotMan $bot) {
    $bot->reply('Salut à toi');
});
$botman->hears('Qui est le meilleur prof d\'info', function (BotMan $bot) {
    $bot->reply('C\'est Philippe Kislin-Duval');
});
$botman->hears('Qui est ton créateur', function (BotMan $bot) {
    $bot->reply('François est mon créateur');
    $bot->reply('C\'est lui qui m\'a donné vie');
});
$botman->hears('Est ce que tu aimes parler avec des gens', function (BotMan $bot) {
    $bot->reply('Oui, c\'est sympa!');
});
$botman->hears('As tu beaucoup de vocabulaire', function (BotMan $bot) {
    $bot->reply('Malheuresement, je suis limité pour l\'instant');
    $bot->reply('Il faut que mon créateur développe ses compétences');
});
// pour tout message que notre bot écoute mais ne comprend pas... le bot répond
$botman->fallback(function($bot) {
    $bot->reply('Désolé, Je ne comprends pas ces commandes.');
});

// commence l'écoute
$botman->listen();

?>