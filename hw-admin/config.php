<?php
/* -- Chargement des variables d'environnement (.env) -- */

   $envPath = realpath(dirname(__DIR__)) . "/.env";
   if (file_exists($envPath)) {
       foreach (file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
           if ($line[0] === '#' || strpos($line, '=') === false) continue;
           list($key, $value) = explode('=', $line, 2);
           putenv(trim($key) . '=' . trim($value));
       }
   }

/* -- Connection à la base de données -- */

   $dbType = getenv('DB_TYPE') ?: "mysql";
   $host = getenv('DB_HOST') ?: "localhost";
   $login = getenv('DB_LOGIN') ?: "root";
   $password = getenv('DB_PASSWORD') ?: "";
   $dataBaseName = getenv('DB_NAME') ?: "helloworld";
   $emailUsername = getenv('EMAIL_USERNAME') ?: "";
   $secretPassword = getenv('EMAIL_APP_PASSWORD') ?: "";

/* -------------------------------------- */

   $prefixe_db = "hw_";
   $siteURL = "http://localhost/helloworld3/";
   $apiURL =  "http://localhost/helloworld3/hw-admin/components/";
   $platURL =  "http://localhost/helloworld3/";
   $projet = "Hello world";

/* -- Variables globales -- */

   define("__prefixe_db__", $prefixe_db);
   global $siteURL;
   global $projet;
