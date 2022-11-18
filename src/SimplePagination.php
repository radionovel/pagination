<?php
declare(strict_types=1);

namespace Rdl\Pagination;

class SimplePagination extends AbstractPagination
{

    public function __construct(array $items, int $totalItems, int $perPage, int $currentPage = 1)
    {
        $this->perPage = $perPage;
        $this->totalItems = $totalItems;
        $this->items = $items;
        $this->setCurrentPage($currentPage);
    }

    /**
     * @param  int  $currentPage
     *
     * @return void
     */
    protected function setCurrentPage(int $currentPage): void
    {
        $this->currentPage = $this->isValidPageNumber($currentPage) ? $currentPage : 1;
    }

    /**
     * @param  int  $page
     *
     * @return bool
     */
    protected function isValidPageNumber(int $page): bool
    {
        return $page >= 1;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'data'         => $this->items,
            'total'        => $this->totalItems,
            'current_page' => $this->currentPage,
            'per_page'     => $this->perPage,
            'page_name'    => $this->pageName,
        ];
    }
}
