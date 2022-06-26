<?php

$id = RequestParser::fromDeleteRequest("id");
$api = new ClientAPI();
$api->delete($id);
