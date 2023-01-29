<?php

namespace App\DataTables;

use App\Enums\AdminType;
use App\Enums\UserType;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.post.btn.action')
            ->setRowId('id')
            ->editColumn('created_at', function (Post $post) {
                return '<span class="badge badge-primary">' . $post->created_at?->diffForhumans() . '</span>';
            })
            ->editColumn('status', function (Post $post) {
                return $post->status();
            })
            ->editColumn('admins', function (Post $post) {
                return $post->admin ? AdminType::type($post->admin->type) . ' | ' . $post->admin->statusWithLabel() : null;
            })
            ->editColumn('users', function (Post $post) {
                return $post->user ? UserType::type($post->user->type) . ' | ' . $post->admin->statusWithLabel() : null;
            })
            ->addColumn('categoryName', 'dashboard.post.btn.category_name')
            ->addColumn('tageName', 'dashboard.post.btn.tage_name')
            ->rawColumns(['action', 'created_at', 'status', 'admins', 'users','categoryName','tageName']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery()->with(['admin', 'user', 'postCategories', 'postsTages'])->orderByDesc('id');
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
            ->setTableId('post-table')
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
            Column::make('post_title')->title('العنوان'),
            Column::make('categoryName')->title('الاقسام')->searchable(false)->orderable(false),
            Column::make('tageName')->title('الدلالات')->searchable(false)->orderable(false),

            Column::make('visitor')->title(' الزيارات'),
            Column::make('is_shared')->title(' المشاركات'),
            Column::make('is_comment')->title('التعليقات'),
            Column::make('status')->title('الحاله')->searchable(false)->orderable(false),
            Column::make('admins')->title('الادمن')->searchable(false)->orderable(false),
            Column::make('users')->title('المستخدم')->searchable(false)->orderable(false),

            Column::make('created_at')->title('تاريخ الاضافه')->searchable(false),
            Column::computed('action')
                ->searchable(false)
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
        return 'Post_' . date('YmdHis');
    }
}