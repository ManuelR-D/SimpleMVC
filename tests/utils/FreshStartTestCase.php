<?php

use PHPUnit\Framework\TestCase;

abstract class FreshStartTestCase extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $dao = new DBDestroyerDAO();
        $dao->truncateAll();
    }
    public function setUp(): void
    {
        $dao = new DBDestroyerDAO();
        $dao->truncateAll();
    }
    public static function tearDownAfterClass(): void
    {
        $dao = new DBDestroyerDAO();
        $dao->truncateAll();
    }
}
