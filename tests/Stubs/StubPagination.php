<?php
declare(strict_types=1);


namespace Rdl\Tests\Pagination\Stubs;

use Rdl\Pagination\AbstractPagination;

class StubPagination extends AbstractPagination
{

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function jsonSerialize(): array
    {
        return [];
    }
}