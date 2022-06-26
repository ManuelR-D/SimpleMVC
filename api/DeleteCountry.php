<?php

$id = RequestParser::fromDeleteRequest("id");
$api = new CountryAPI();
$api->delete($id);
