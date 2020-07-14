Novidades do PHP 7.4 e 8.0
---

Este repostiório serve de base para a live stream sobre as
novidades do php 7.4 e 8.0.

A live stream foi apresentada pelo autor
[do melhor site de php do mundo](https://thephp.website/br/).

## Utilizando o repositório

Este repositório possui 3 arquivos de teste:

- `tests/php74.php`
- `tests/php80.php`
- `tests/php80-sintaxe.php`

Cada arquivo conterá casos de teste para praticar com as
diferentes versões do php.

Dentro da pasta `bin/` existem dois arquivos `.sh` que executam
um comando docker, cada. O arquivo `bin/watch-php74.sh` irá
executar testes utilizando o `php 7.4` filtrando pelo grupo
`php74` e o arquivo `bin/watch-php80.sh` irá executar testes
utilizando o `php 8.0-dev` filtrando pelo grupo `php80`. O
arquivo `php80-sintaxe.php` só pode ser rodado no contêiner php 8.0
ou o código não será sequer interpretado.

Desta forma, ao criar novos casos de teste pode-se utilizar da
annotation `@group` para definir quais versões deverão executar
quais testes.

Por exemplo, o seguinte teste somente rodará no php 8.0-dev:

```php
/**
 * @test
 * @group php80
 */
public function weakMaps(): void
{
    $map = new WeakMap;
    $obj = new stdClass;
    $map[$obj] = 42;

    self::assertEquals(42, $map[$obj]);

    unset($obj);

    self::assertEmpty($map);
}
``` 

## Como rodar os testes

Instale as dependências com o comando:

```shell script
$ bash bin/install-dependencies.sh
```

Após basta rodar o seguinte comando para rodar o watcher da versão 7.4:

```shell script
$ bash bin/watch-php74.sh
```

E o seguinte comando para rodar o watcher da versão 8.0:

```shell script
$ bash bin/watch-php80.sh
```
