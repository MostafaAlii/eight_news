<?php

namespace App\DataTables;

use App\Enums\AdminType;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TagDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.tag.btn.action')
            ->setRowId('id')
            ->editColumn('created_at', function (Tag $admin) {
                return '<span class="badge badge-primary">' . $admin->created_at?->diffForhumans() . '</span>';
            })
            ->editColumn('admins', function (Tag $tag) {
                return $tag->admin->name . ' | ' . $tag->admin->statusWithLabel();
            })
            ->editColumn('status', function (Tag $tag) {
                return $tag->status();
            })->rawColumns(['created_at', 'admins', 'status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): QueryBuilder
    {
        return Tag::query();
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
                            this.api().columns([0]).every(function () {
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
    public function getColumns(): array
    {
        return [

            Column::make('name')->title('الاسم'),
            Column::make('status')->title('الحاله')->searchable(false),
            Column::make('admins')->title('اسم المستخدم')->searchable(false)->orderable(false),
            Column::make('created_at')->searchable(false),
            Column::computed('action')->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Tag_' . date('YmdHis');
    }
}