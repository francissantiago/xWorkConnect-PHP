<?php

namespace xWorkPHP;

class DatabaseConnection
{
    private $pdoXWF;
    private $pdoFirebird;
    private $config;

    public function __construct($configFile)
    {
        $this->loadConfig($configFile);
        $this->connectXWF();
        $this->connectFirebird();
    }

    private function loadConfig($configFile)
    {
        if (!file_exists($configFile)) {
            throw new Exception("Arquivo de configuração não encontrado: " . $configFile);
        }

        $this->config = parse_ini_file($configFile, true);

        if ($this->config === false) {
            throw new Exception("Erro ao ler o arquivo de configuração: " . $configFile);
        }
    }

    private function connectXWF()
    {
        try {
            $dsn = $this->config['xwf']['dsn'];
            $user = $this->config['xwf']['user'];
            $password = $this->config['xwf']['password'];

            $this->pdoXWF = new \PDO($dsn, $user, $password);
            $this->pdoXWF->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->handleSuccess('xwf');
        } catch (\PDOException $e) {
            $this->handleError('xwf', $e->getMessage());
        }
    }

    private function connectFirebird()
    {
        try {
            $dsn = $this->config['firebird']['dsn'];
            $user = $this->config['firebird']['user'];
            $password = $this->config['firebird']['password'];

            $this->pdoFirebird = new \PDO($dsn, $user, $password);
            $this->pdoFirebird->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->handleSuccess('firebird');
        } catch (\PDOException $e) {
            $this->handleError('firebird', $e->getMessage());
        }
    }

    private function handleSuccess($type)
    {
        echo json_encode([
            'status' => 200,
            'message' => ucfirst($type) . ' connected successfully.'
        ]);
        echo "<br>";
    }

    private function handleError($type, $message)
    {
        echo json_encode([
            'status' => 500,
            'message' => 'Error connecting to ' . $type . ': ' . $message
        ]);
        echo "<br>";
    }

    public function getXWFConnection()
    {
        return $this->pdoXWF;
    }

    public function getFirebirdConnection()
    {
        return $this->pdoFirebird;
    }
}

?>