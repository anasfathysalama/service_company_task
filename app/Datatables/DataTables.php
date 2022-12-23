<?php

namespace App\DataTables;

use Illuminate\Http\Request;

abstract class DataTables
{
    protected Request $request;
    protected int $draw;
    protected int $start;
    protected int $pageLength;
    protected int $orderColumnIndex;
    protected string $orderColumnName;
    protected string $orderType;
    protected string $searchText;
    protected array $selectedColumns;
    protected array $orderColumns;
    protected array $searchColumns;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->setDraw();
        $this->setStart();
        $this->setPageLength();
        $this->setOrderType();
        $this->setOrderIndex();
        $this->setOrderColumnName();
        $this->setSearchText();
    }
    abstract protected function getTotalRecords();
    abstract protected function handleSearchQuery($query);
    abstract protected function getRecordsData();
    abstract public function getAllData();
    /**
     * @return int
     */
    protected function getDraw(): int
    {
        return $this->draw;
    }

    protected function setDraw(): void
    {
        $this->draw = $this->request->draw ?? 0;
    }

    /**
     * @return int
     */
    protected function getStart(): int
    {
        return $this->start;
    }

    protected function setStart(): void
    {
        $this->start = $this->request->start ?? 0;
    }

    /**
     * @return int
     */
    protected function getPageLength(): int
    {
        return $this->pageLength;
    }

    protected function setPageLength(): void
    {
        $this->pageLength = $this->request->length ?? 0;
    }

    /**
     * @return string
     */
    public function getSearchText(): string
    {
        return empty(trim($this->searchText)) ? "" : $this->searchText;
    }

    public function setSearchText(): void
    {
        $this->searchText = $this->request->search['value'] ?? "";
    }

    /**
     * @return int
     */
    protected function getOrderIndex(): int
    {
        return $this->orderColumnIndex;
    }

    protected function setOrderIndex(): void
    {
        $this->orderColumnIndex = $this->request->order[0]['column'] ?? 0;
    }

    /**
     * @return string
     */
    protected function getOrderType(): string
    {
        return $this->orderType;
    }

    protected function setOrderType(): void
    {
        $this->orderType = $this->request->order[0]['dir'] ?? "DESC";
    }

    /**
     * @return string
     */
    protected function getOrderColumnName(): string
    {
        return $this->orderColumnName;
    }

    protected function setOrderColumnName(): void
    {
        $this->orderColumnName = $this->orderColumns[$this->orderColumnIndex];
    }

}
