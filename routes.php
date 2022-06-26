<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

// ##################################################
// ##################################################
// ##################################################
spl_autoload_register(function ($class_name) {

    $dirs = array(
        'START/',
        'MODEL/',
        'MODEL/dto/',
        'MODEL/dto/interface/',
        'CONTROLLER/',
        'CONTROLLER/dao/',
        'SERVICE/',
        'factory/',
        'api/',
        'api/classes/',
        'utils/'
    );

    foreach ($dirs as $dir) {
        if (file_exists($dir . $class_name . '.php')) {
            require_once($dir . $class_name . '.php');
            return;
        }
    }
});
//CREATE
post('/api/NewClient', "/api/NewClient.php");
post('/api/NewCountry', "/api/NewCountry.php");
//READ
get('/api/GetClient', "/api/GetClient.php");
get('/api/GetCountry', "/api/GetCountry.php");
get('/api/GetAllCountries', "/api/GetAllCountries.php");
//UPDATE
put('/api/UpdateClient', "/api/UpdateClient.php");
put('/api/UpdateCountry', "/api/UpdateCountry.php");
//DELETE
delete('/api/DeleteClient', "/api/DeleteClient.php");
delete('/api/DeleteCountry', "/api/DeleteCountry.php");

//VIEWS

get('/ClientRegistration', '/VIEW/ClientRegistrator.html');
get('/CountryRegistration', '/VIEW/CountryRegistrator.html');
get('/ClientViewer', '/VIEW/ClientViewer.html');
any('/404', '/VIEW/404.html');
