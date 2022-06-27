<?php

$id = $id ?: RequestParser::fromGetRequest("id");
if (is_null($id)) {
    echo "BAD REQUEST";
    die;
}
$api = new ClientAPI();
$client = $api->get($id);
if (!is_null($client))
    echo $client->jsonSerialize();
else
    echo 0;
