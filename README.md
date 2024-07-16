
# XWork Connect PHP

[![Latest Stable Version](https://poser.pugx.org/dev_francissantiago/xwork-connect/v/stable)](https://packagist.org/packages/dev_francissantiago/xwork-connect)
[![Total Downloads](https://poser.pugx.org/dev_francissantiago/xwork-connect/downloads)](https://packagist.org/packages/dev_francissantiago/xwork-connect)
[![License](https://poser.pugx.org/dev_francissantiago/xwork-connect/license)](https://packagist.org/packages/dev_francissantiago/xwork-connect)

Uma biblioteca para gerenciar conexões com banco de dados XWF e Firebird.

## Instalação

Você pode instalar esta biblioteca via Composer. Execute o seguinte comando:

```bash
composer require dev_francissantiago/xwork-connect
```

## Uso

### Configuração

Crie um arquivo de configuração INI (`config.ini`) com as informações de conexão para os bancos de dados XWF e Firebird. Exemplo:

```ini
; config.ini
[xwf]
dsn = "odbc:BaseDeTesteDSN"
user = ""
password = ""

[firebird]
dsn = "firebird:dbname=localhost:C:\\Radiocef Studio 2\\XWork\\Base_de_Teste_pk.fdb"
user = "SYSDBA"
password = "masterkey
```

### Exemplo de Código

A seguir um exemplo de como utilizar a biblioteca:

```php
require 'vendor/autoload.php';

use xWorkPHP\DatabaseConnection;

$configFile = 'path/to/your/config.ini';
$dbConnection = new DatabaseConnection($configFile);

$xwfConnection = $dbConnection->getXWFConnection();
$firebirdConnection = $dbConnection->getFirebirdConnection();

// Use $xwfConnection e $firebirdConnection como instâncias de PDO
```

## Desenvolvimento

### Testes

Para rodar os testes, use PHPUnit. Instale as dependências de desenvolvimento e execute os testes:

```bash
composer install --dev
vendor/bin/phpunit tests
```

### Estrutura do Projeto

```
xwork-connect/
├── src/
│   └── DatabaseConnection.php
├── config/
│   └── config.ini
├── tests/
│   └── DatabaseConnectionTest.php
├── .gitignore
└── composer.json
```

## Contribuição

1. Faça um fork do projeto.
2. Crie um branch para sua feature (`git checkout -b minha-nova-feature`).
3. Commit suas mudanças (`git commit -am 'Adiciona nova feature'`).
4. Faça push para o branch (`git push origin minha-nova-feature`).
5. Crie um novo Pull Request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
