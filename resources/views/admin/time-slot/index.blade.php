@extends('admin.layouts.master')
@section('title', $title)
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <!-- Add modal button -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">{{ __('dashboard.btn_add_new') }}</button>
                <!-- Include Add modal -->
                @include($view.'.create')

{{--                <a href="{{ route($route.'.index') }}" class="btn btn-info">{{ __('dashboard.btn_refresh') }}</a>--}}
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{ $title }} {{ __('dashboard.list') }}</h4>
                        <span>{{ __('dashboard.prefer_cells', ['cells' => '3-4']) }}</span>
                    </div>
                    <div class="card-body">

                        <!-- Data Table Start -->
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap full-width">
                                <thead>
                                <tr>
                                    <th>{{ __('dashboard.no') }}</th>
                                    <th>{{ __('dashboard.slot-start-time') }}</th>
                                    <th>{{ __('dashboard.slot-end-time') }}</th>
                                    <th>{{ __('dashboard.slot-limit') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
                                    <th>{{ __('dashboard.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{Carbon\Carbon::parse($row->booking_from_time)->format('h:i:s A')}}</td>
                                        <td>{{Carbon\Carbon::parse($row->booking_to_time)->format('h:i:s A')}}</td>
                                        <td>{{ $row->slot_limit  }}</td>
                                        <td>
                                            @if( $row->status == 'active' )
                                                <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>
                                            @else
                                                <span class="badge badge-danger badge-pill">{{ __('dashboard.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>

                                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $row->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            @include($view.'.edit')
                                            <!-- Include Edit modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.inc.delete')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Data Table End -->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->
    <!-- End Content-->

@endsection
