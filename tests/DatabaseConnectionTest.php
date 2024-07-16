<?php
use PHPUnit\Framework\TestCase;
use xWorkPHP\DatabaseConnection;

class DatabaseConnectionTest extends TestCase
{
    public function testConnections()
    {
        $configFile = 'config/config.ini';
        $dbConnection = new DatabaseConnection($configFile);

        $this->assertInstanceOf(PDO::class, $dbConnection->getXWFConnection());
        $this->assertInstanceOf(PDO::class, $dbConnection->getFirebirdConnection());
    }
}
?>