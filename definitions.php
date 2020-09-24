<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return [
    FilesystemLoader::class => function (){
        return new FilesystemLoader(__DIR__ . "/views");
    },
    Environment::class => function(FilesystemLoader $loader){
        return new Environment($loader);
    },
    // DataHelper::class => function(DbCon $db) { 
    //     return new DataHelper($db); 
    // },
];