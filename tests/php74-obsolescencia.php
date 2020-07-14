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
}
