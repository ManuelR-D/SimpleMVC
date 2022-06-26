<?php

$r = new Redis();


$r->connect("localhost",6379);
$r->auth("");

if ($r->ping()) {
    echo "pong";
}
$mysql = new mysqli("localhost","testGuest","1234");

