@extends('layouts.common.master')
@section('css')
<style>
    th,
    td {
        text-align: center !important;
    }
</style>
@endsection
@section('title')
المجالات
@stop
@section('page-header')
<!-- Start Page title dev -->
<div class="page-title">
    <div class="row">
        <!-- Start Page-Title -->
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">
                <i class="fa fa-users"></i>
                المجالات
            </h4>
        </div>
        <!-- End Page-Title -->
        <!-- Start Breadcrumb -->
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}" class="default-color">
                        الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('sections.index')}}" class="default-color">
                        المجالات
                    </a>
                </li>
            </ol>
        </div>
        <!-- End Breadcrumb -->
    </div>
</div>
<!-- End Page title dev -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <p>المجالات</p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#create">
                                <i class="fa fa-plus"></i>
                                اضافه مجال جديد
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    {!! $dataTable->table([
                    'class' => 'table table-striped table-bordered p-0 text-center',
                    'style' => 'border-collapse: collapse; border-spacing: 0; width: 100%;'
                    ], true) !!}
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.section.btn.create')
</div>
</div>

<!-- row closed -->
@endsection
@section('js')
{!! $dataTable->scripts() !!}
@endsection