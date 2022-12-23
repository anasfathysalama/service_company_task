<?php

namespace App\Datatables;

use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParcelsDatatable extends DataTables
{
    protected array $selectedColumns = ['parcels.id', 'parcels.pick_up_address', 'parcels.drop_off_address', 'parcels.status'];

    protected array $orderColumns = ['parcels.id', 'parcels.pick_up_address', 'parcels.drop_off_address', 'parcels.status'];
    protected array $searchColumns = ['parcels.id', 'parcels.pick_up_address', 'parcels.drop_off_address', 'parcels.status'];


    protected Parcel $model;

    public function __construct(Request $request, Parcel $model)
    {
        parent::__construct($request);
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    protected function getTotalRecords()
    {
        $query = $this->model::query()->select(DB::raw('count(*) as rows_count'));
        $this->handleSearchQuery($query);
        return $query->first()->rows_count;
    }

    /**
     * @param $query
     * @return mixed
     */
    protected function handleSearchQuery($query)
    {
        if (!empty($this->getSearchText())) {
            $query->where(function ($query) {
                foreach ($this->searchColumns as $column) {
                    $query->orWhere(DB::raw("upper($column)"), "like", "%" . strtoupper($this->getSearchText()) . "%");
                }
            });
        }
        return $query;
    }


    /**
     * @return mixed
     */
    protected function getRecordsData()
    {
        $query = $this->model::orderBy($this->getOrderColumnName(), $this->getOrderType())
            ->select($this->selectedColumns)
            ->skip($this->getStart())
            ->take($this->getPageLength())
            ->orderBy($this->getOrderColumnName(), $this->getOrderType());
        $this->handleSearchQuery($query);
        return $query->get();
    }


    public function getAllData()
    {
        $totalRecords = $this->getTotalRecords();
        $recordsData = $this->getRecordsData();
        $response = array(
            "draw" => $this->getDraw(),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $this->getData($recordsData)
        );
        return json_encode($response);
    }

    private function getData($recordsData): array
    {
        $data = [];
        if (count($recordsData) > 0) {
            foreach ($recordsData as $record) {
                $data[] = [
                    "id" => $record->id,
                    "pick_up_address" => $record->pick_up_address,
                    "drop_off_address" => $record->drop_off_address,
                    "status" => $record->status === 'picked_up' ? 'Picked-up' : ucfirst($record->status),
                ];
            }
        }
        return $data;
    }
}
