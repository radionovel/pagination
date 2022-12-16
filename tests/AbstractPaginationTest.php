<?php
declare(strict_types=1);


namespace Rdl\Tests\Pagination;


use PHPUnit\Framework\TestCase;
use Rdl\Tests\Pagination\Stubs\StubPagination;

class AbstractPaginationTest extends TestCase
{
    public function testThrough()
    {
        $pagination = new StubPagination([
            1, 2, 3
        ]);

        $pagination->through(function ($item) {
            return $item * 2;
        });

        $this->assertSame([2, 4, 6], $pagination->items());
    }

    public function testGetItems()
    {
        $pagination = new StubPagination([
            1, 2, 3
        ]);

        $this->assertSame([1, 2, 3], $pagination->items());
    }
}
