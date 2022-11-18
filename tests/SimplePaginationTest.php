<?php
declare(strict_types=1);

namespace Rdl\Tests\Pagination;


use PHPUnit\Framework\TestCase;
use Rdl\Pagination\SimplePagination;

class SimplePaginationTest extends TestCase
{
    public function testToArray()
    {
        $excepted = [
            'total' => 3,
            'current_page' => 1,
            'per_page' => 2,
            'page_name' => 'page',
        ];

        $items = [1, 2, 3];

        $pagination = new SimplePagination($items, 3, 2, 1);
        $array = $pagination->toArray();

        $this->assertArrayHasKey('data', $array);
        $this->assertSameSize($items, $array['data']);

        foreach ($excepted as $key => $value) {
            $this->assertArrayHasKey($key, $array);
            $this->assertEquals($value, $array[$key]);
        }
    }

    public function testJsonSerializable()
    {
        $excepted = [
            'total' => 3,
            'current_page' => 1,
            'per_page' => 2,
            'page_name' => 'page',
        ];

        $items = [1, 2, 3];

        $pagination = new SimplePagination($items, 3, 2, 1);
        $array = json_decode(json_encode($pagination), true);

        $this->assertArrayHasKey('data', $array);
        $this->assertSameSize($items, $array['data']);

        foreach ($excepted as $key => $value) {
            $this->assertArrayHasKey($key, $array);
            $this->assertEquals($value, $array[$key]);
        }
    }
}
