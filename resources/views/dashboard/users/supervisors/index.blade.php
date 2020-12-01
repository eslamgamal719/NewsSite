@extends('layouts.admin')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">المشرفين</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">لوحه التحكم</a></li>
                            <li class="breadcrumb-item "><a href="#">الاقسام</a></li>
                            <li class="breadcrumb-item active">المشرفين</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- /.row -->
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">جدول المشرفين</h3>

                    </div>
                    <!-- /.card-header -->

                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                    <div class="box-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الالكترونى</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($supervisors as $index => $supervisor)
                                 <tr>
                                     <td>{{ $index + 1 }}</td>
                                     <td>{{ $supervisor->name }}</td>
                                     <td>{{ $supervisor->email }}</td>
                                     <td>

                                         @if(auth()->user()->hasPermission('supervisors_update'))
                                             <a class="btn btn-primary" href="{{ route('edit-supervisor', $supervisor->id) }}" >تعديل</a>
                                         @else
                                             <a class="btn btn-primary disabled" href="#" >تعديل</a>
                                         @endif

                                         @if(auth()->user()->hasPermission('supervisors_delete'))
                                             <a class="btn btn-danger" href="{{ route('delete-supervisor', $supervisor->id) }}" >حذف</a>
                                         @else
                                             <a class="btn btn-danger disabled" href="#" >حذف</a>
                                         @endif

                                     </td>

                                 </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


@endsection

