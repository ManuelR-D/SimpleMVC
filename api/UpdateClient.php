<?php

$id = RequestParser::fromPutRequest("id");
$name = RequestParser::fromPutRequest("name");
$phone = RequestParser::fromPutRequest("phone");
$countryId = RequestParser::fromPutRequest("countryId");
$api = new ClientAPI();
$api->update($id, $name, $phone, $countryId);
