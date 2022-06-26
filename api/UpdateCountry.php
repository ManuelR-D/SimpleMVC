<?php

$id = RequestParser::fromPutRequest("id");
$name = RequestParser::fromPutRequest("name");
$api = new CountryAPI();
$api->update($id, $name);
