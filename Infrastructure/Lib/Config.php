<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Actividad2DesarrollodeAPP/vendor/php-activerecord/php-activerecord/ActiveRecord.php";

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . '/Actividad2DesarrollodeAPP/Infrastructure/Databases/Entities');
$cfg->set_connections(array(
    'development' => 'mysql://root@localhost/ejercicio81',
    // 'test' => 'mysql://username:password@localhost/test_database_name',
    // 'production' => 'mysql://username:password@localhost/production_database_name'
));

$cfg->set_default_connection('development');
?>