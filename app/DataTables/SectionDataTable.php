<?php

namespace App\DataTables;

use App\Models\Section;
use App\Enums\AdminType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SectionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'dashboard.section.btn.action')
            ->editColumn('created_at', function (Section $section) {
                return '<span class="badge badge-primary">' . $section->created_at?->diffForhumans() . '</span>';
            })
            ->editColumn('status', function (Section $section) {
                return $section->statusWithLabel();
            })

            ->editColumn('category_id', function (Section $section) {
                return $section->category ? $section->category->name : null;
            })

            ->editColumn('admin_id', function (Section $section) {
                return $section->admin->name;
            })
            ->setRowId('id')
            ->rawColumns(['created_at', 'status','admin_id', 'category_id','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Section $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Section $model): QueryBuilder
    {;
        return $model->newQuery()->with(['category','admin'])->orderByDesc('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [
                    [10, 25, 50, 100, -1],
                    ['10 ' . trans('datetable.row'), '25 ' . trans('datetable.row'), '50 ' . trans('datetable.row'), '100 ' . trans('datetable.row'), trans('datetable.all_records')]
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

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    protected function getColumns(): array {
        return [
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'الاسم',
            ],[
                'name' => 'description',
                'data' => 'description',
                'title' => 'الوصــف',
            ],[
                'name' => 'status',
                'data' => 'status',
                'title' => 'الحالة',
                'searchable' => false,
                'selectable' => false,
                'sortable' => false,
                'orderable' => false,
            ],[
                'name' => 'category_id',
                'data' => 'category_id',
                'title' => 'القسم الرئيسي للمجال',
                'searchable' => false,
                'selectable' => false,
                'sortable' => false,
                'orderable' => false,
            ],[
                'name' => 'admin_id',
                'data' => 'admin_id',
                'title' => ' مضافة بواسطة',
                'searchable' => false,
                'selectable' => false,
                'sortable' => false,
                'orderable' => false,
            ],[
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'تاريخ الانشاء',
                'searchable' => false,
                'selectable' => false,
                'sortable' => false,
                'orderable' => false,
            ],[
                'name' => 'action',
                'data' => 'action',
                'title' => 'العمليات',
                'searchable' => false,
                'exportable' => false,
                'orderable' => false,
                'printable' => false,
                'selectable' => false,
                'sortable' => false,
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
        return 'Section_' . date('YmdHis');
    }
}