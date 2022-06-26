<?php
$name = RequestParser::fromPostRequest("name");
$api = new CountryAPI();
echo $api->save($name);
