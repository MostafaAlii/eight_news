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
            ->editColumn('status', function (Advertisment $ads) {
                return $ads->statusWithLabel();
            })
            ->rawColumns(['action', 'created_at', 'status']);
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
                'title' => 'الاسم',
            ],[
                'name' => 'url',
                'data' => 'url',
                'title' => ' الرابط',
            ],
            [
                'name' => 'status',
                'data' => 'status',
                'title' => ' \ الحالة',
            ],[
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'تاريخ الانشاء',
            ],[
                'name' => 'action',
                'data' => 'action',
                'title' => 'العمليات',
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