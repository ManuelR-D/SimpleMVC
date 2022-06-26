<?php

class RequestParser
{
    public static function fromPostRequest($key): ?string
    {
        return self::getEscapedFromAssociativeArray($key, $_POST);
    }
    public static function fromGetRequest($key): ?string
    {
        return self::getEscapedFromAssociativeArray($key, $_GET);
    }
    public static function fromPutRequest($key): ?string
    {
        parse_str(file_get_contents("php://input"), $put_vars);
        return self::getEscapedFromAssociativeArray($key, $put_vars);
    }
    public static function fromDeleteRequest($key): ?string
    {
        parse_str(file_get_contents("php://input"), $delete_vars);
        return self::getEscapedFromAssociativeArray($key, $delete_vars);
    }
    private static function getEscapedFromAssociativeArray($key, $array): ?string
    {
        if (array_key_exists($key, $array)) {
            return htmlspecialchars($array[$key]);
        } else {
            return null;
        }
    }
}
