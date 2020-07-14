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
}
