<?php

namespace App\DataTables;

use App\Enums\AdminType;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.category.btn.action')
            ->editColumn('created_at', function (Category $admin) {
                return '<span class="badge badge-primary">' . $admin->created_at?->diffForhumans() . '</span>';
            })
            ->editColumn('status', function (Category $category) {
                return $category->status();
            })

            ->editColumn('categoryName', function (Category $category) {
                return $category->category ? $category->category->name : null;
            })

            ->editColumn('admins', function (Category $category) {
                return $category->admin->statusWithLabel();
            })
            ->setRowId('id')
            ->rawColumns(['created_at', 'status','admins','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model): QueryBuilder
    {
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
            Column::make('name')->title('اسم القسم'),
            Column::make('status')->title('حاله القسم'),
            Column::make('categoryName')->title('اسم القسم الاساسي')->searchable(false),
            Column::make('admins')->title('اسم المستخدم')->searchable(false),
            Column::make('created_at')->title('تاريخ الاضافه'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('العمليات'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}