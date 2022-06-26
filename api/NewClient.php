<?php

$name = RequestParser::fromPostRequest("name");
$phone = RequestParser::fromPostRequest("phone");
$countryId = RequestParser::fromPostRequest("countryId");
$api = new ClientAPI();
echo $api->save($name, $phone, $countryId);
