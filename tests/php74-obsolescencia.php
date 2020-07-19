<?php

use PHPUnit\Framework\TestCase;

class TestPHP74Obsolescencia extends TestCase
{
    /**
     * Fazer o cast
     * @test
     * @group php74
     */
    public function realType(): void
    {
        $x = (real) 10;

        self::assertEquals('The (real) cast is deprecated, use (float) instead', error_get_last()['message']);
        self::assertSame(10.0, $x);

        self::assertTrue(is_real($x));
        self::assertEquals('Function is_real() is deprecated', error_get_last()['message']);
    }

    /**
     * @test
     * @group php74
     */
    public function magicQuotes(): void
    {
        /**
         * As duas funções abaixo foram marcadas como obsoletas
         * e passaram a lançar warnings.
         */
        self::assertFalse(get_magic_quotes_gpc());
        self::assertEquals('Function get_magic_quotes_gpc() is deprecated', error_get_last()['message']);

        self::assertFalse(get_magic_quotes_runtime());
        self::assertEquals('Function get_magic_quotes_runtime() is deprecated', error_get_last()['message']);
    }

    /**
     * @test
     * @group php74
     */
    public function filterSanitizeMagicQuotes(): void
    {
        filter_var('nawarian', FILTER_SANITIZE_MAGIC_QUOTES);

        self::assertEquals(
            'filter_var(): FILTER_SANITIZE_MAGIC_QUOTES is deprecated, use FILTER_SANITIZE_ADD_SLASHES instead',
            error_get_last()['message']
        );
    }

    /**
     * @test
     * @group php74
     */
    public function reflectionExportMethods(): void
    {
        $exportedReflection = ReflectionClass::export(Nawarian::class, true);

        self::assertIsString($exportedReflection);
        self::assertEquals('Function ReflectionClass::export() is deprecated', error_get_last()['message']);
    }

    /**
     * @test
     * @group php74
     */
    public function mbStrrposThirdParameter(): void
    {
        $dez = mb_strrpos('nove dezena dez', 'dez', 'utf-8');

        self::assertEquals(
            'mb_strrpos(): Passing the encoding as third parameter is deprecated. Use an explicit zero offset',
            error_get_last()['message']
        );
        self::assertEquals(12, $dez);
    }

    /**
     * @test
     * @group php74
     */
    public function implodeArgumentMix(): void
    {
        $arr = [0, 1, 2];

        self::assertEquals(implode(',', $arr), implode($arr, ','));
        self::assertEquals(
            'implode(): Passing glue string after array is deprecated. Swap the parameters',
            error_get_last()['message']
        );
    }

    /**
     * @test
     * @group php74
     */
    public function unbindThisOnClosures(): void
    {
        $closure = function () {
            return $this;
        };

        Closure::bind($closure, $this);
        self::assertSame($this, $closure());

        Closure::bind($closure, null); // Se tornará um error no php 8.0
        self::assertEquals(
            'Unbinding $this of closure is deprecated',
            error_get_last()['message']
        );
    }
}

class Nawarian {
    public string $a;
}
