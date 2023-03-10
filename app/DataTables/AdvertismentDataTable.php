<?php

namespace App\DataTables;

use App\Models\Advertisment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdvertismentDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', 'dashboard.ads.btn.action')
            ->editColumn('created_at', function (Advertisment $ads) {
                return '<span class="badge badge-primary">' .$ads->created_at?->diffForhumans() .'</span>';
            })
            /*->editColumn('image', function (Advertisment $ads) {
                // check if photo is not default.png
                if ($ads->image != 'default.png') {
                    return '<img src="' . $ads->image_path . '" style="width: 100px; height: 100px;">';
                } else {
                    return '<img src="' . asset('uploads/ads/default_ads.png') . '" class="img-thumbnail" style="width: 100px; height: 100px;">';
                }
                //return '<img src="' . $banner->image_path . '" class="img-thumbnail" style="width: 100px; height: 100px;">';
            })*/
            ->editColumn('status', function (Advertisment $ads) {
                return $ads->statusWithLabel();
            })
            ->editColumn('image', function (Advertisment $ads) {
                return view('dashboard.ads.btn.image', compact('ads'));
            })
            ->rawColumns(['action', 'created_at', 'image', 'status']);
    }

    public function query(Advertisment $model): QueryBuilder {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'dom'          => 'Blfrtip',
                        'lengthMenu' => [
                            [10, 25, 50, 100, -1],
                            ['10 '.trans('datetable.row'), '25 '.trans('datetable.row'), '50 '.trans('datetable.row'), '100 '.trans('datetable.row'), trans('datetable.all_records')]
                        ],
                        
                        'initComplete' => "function () {
                            this.api().columns([0,1]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                        'language' => datatable_lang(),
                    ]);
    }

    protected function getColumns(): array {
        return [
            [
                'name' => 'name',
                'data' => 'name',
                'title' => '??????????',
            ],[
                'name' => 'url',
                'data' => 'url',
                'title' => ' ????????????',
            ],
            [
                'name' => 'status',
                'data' => 'status',
                'title' => ' \ ????????????',
            ],[
                'name' => 'image',
                'data' => 'image',
                'title' => '????????????',
                'searchable' => false,
                'selectable' => false,
                'sortable' => false,
                'orderable' => false,
            ],[
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => '?????????? ??????????????',
            ],[
                'name' => 'action',
                'data' => 'action',
                'title' => '????????????????',
                'searchable' => false,
                'exportable' => false,
                'orderable' => false,
                'printable' => false,
                'selectable' => false,
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Advertisment_' . date('YmdHis');
    }
}