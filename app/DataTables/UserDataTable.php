<?php
namespace App\DataTables;
use App\Enums\UserType;
use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
class UserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', 'dashboard.users.btn.action')
            ->editColumn('created_at', function (User $user) {
                return '<span class="badge badge-primary">' .$user->created_at?->diffForhumans() .'</span>';
            })
            ->editColumn('type', function (User $user) {
                return UserType::type($user->type) .' | '. $user->statusWithLabel();
            })
            ->rawColumns(['action', 'created_at', 'type']);
    }

    public function query(): QueryBuilder {
        return User::query()->whereType(UserType::NORMAL_USER);
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
                'name' => 'email',
                'data' => 'email',
                'title' => 'البريد الالكتروني',
            ],
            [
                'name' => 'type',
                'data' => 'type',
                'title' => 'النوع \ الحالة',
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
    
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}