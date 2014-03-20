<?php

namespace Jackalope\Test;

use Doctrine\DBAL\DriverManager;

abstract class TestCase extends \Jackalope\TestCase
{
    protected $conn;

    protected function getConnection()
    {
        if ($this->conn === null) {
            // @TODO see https://github.com/jackalope/jackalope-doctrine-dbal/issues/48
            global $dbConn;
            $this->conn = $dbConn;

            if ($this->conn === null) {
                $this->conn = DriverManager::getConnection(array(
                    'driver'    => @$GLOBALS['phpcr.doctrine.dbal.driver'],
                    'path'      => @$GLOBALS['phpcr.doctrine.dbal.path'],
                    'host'      => @$GLOBALS['phpcr.doctrine.dbal.host'],
                    'user'      => @$GLOBALS['phpcr.doctrine.dbal.username'],
                    'password'  => @$GLOBALS['phpcr.doctrine.dbal.password'],
                    'dbname'    => @$GLOBALS['phpcr.doctrine.dbal.dbname']
                ));
            }
        }

        return $this->conn;
    }
}
