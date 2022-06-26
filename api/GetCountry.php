<?php
$id = RequestParser::fromGetRequest("id");
$api = new CountryAPI();
echo $api->get($id)->jsonSerialize();
