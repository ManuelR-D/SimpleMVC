phpab 1.27.1 - Copyright (C) 2009 - 2022 by Arne Blankerts and Contributors

Scanning directory ./
Scanning directory ./

<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'clientapi' => '/api/classes/ClientAPI.php',
                'clientdaomysql' => '/CONTROLLER/dao/ClientDAOMySQL.php',
                'clientdaomysqlintegrationtest' => '/tests/ClientDAOMySQLIntegrationTest.php',
                'clientdaoredis' => '/CONTROLLER/dao/ClientDAORedis.php',
                'clientdto' => '/MODEL/dto/ClientDTO.php',
                'clientservice' => '/SERVICE/ClientService.php',
                'clientservicetest' => '/tests/ClientServiceTest.php',
                'clienttablecreator' => '/START/ClientTableCreator.php',
                'countryapi' => '/api/classes/CountryAPI.php',
                'countrydaomysql' => '/CONTROLLER/dao/CountryDAOMySQL.php',
                'countrydaomysqlintegrationtest' => '/tests/CountryDAOMySQLIntegrationTest.php',
                'countrydaoredis' => '/CONTROLLER/dao/CountryDAORedis.php',
                'countrydto' => '/MODEL/dto/CountryDTO.php',
                'countryservice' => '/SERVICE/CountryService.php',
                'countryservicetest' => '/tests/CountryServiceTest.php',
                'countrytablecreator' => '/START/CountryTableCreator.php',
                'creator' => '/START/Creator.php',
                'dbdestroyerdao' => '/tests/utils/DBDestroyerDAO.php',
                'factoryclient' => '/factory/FactoryClient.php',
                'factorycountry' => '/factory/FactoryCountry.php',
                'factorycountrytest' => '/tests/FactoryCountryTest.php',
                'freshstarttestcase' => '/tests/utils/FreshStartTestCase.php',
                'ianydto' => '/MODEL/dto/interface/IAnyDTO.php',
                'iclientdto' => '/MODEL/dto/interface/IClientDTO.php',
                'icountrydto' => '/MODEL/dto/interface/ICountryDTO.php',
                'icreator' => '/START/ICreator.php',
                'ientitycruddao' => '/CONTROLLER/IEntityCRUDDao.php',
                'requestparser' => '/utils/RequestParser.php',
                'stubclientdaomysql' => '/tests/stubDAOs/StubClientDAOMySQL copy.php',
                'stubcountrydaomysql' => '/tests/stubDAOs/StubCountryDAOMySQL.php',
                'unittestfactoryclienttest' => '/tests/FactoryClientTest copy.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd


