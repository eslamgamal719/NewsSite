@extends('layouts.admin')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الكتاب</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">لوحه التحكم</a></li>
                            <li class="breadcrumb-item "><a>الاقسام</a></li>
                            <li class="breadcrumb-item active">الكتاب</li>
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
                        <h3 class="box-title">جدول الكتاب</h3>

                    </div>
                    <!-- /.box-header -->

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

                            @foreach($writers as $index => $writer)
                                 <tr>
                                     <td>{{ $index + 1 }}</td>
                                     <td>{{ $writer->name }}</td>
                                     <td>{{ $writer->email }}</td>
                                     <td>

                                         @if(auth()->user()->hasPermission('writers_update'))
                                             <a class="btn btn-primary" href="{{ route('edit-writer', $writer->id) }}" >تعديل</a>
                                         @else
                                             <a class="btn btn-primary disabled" href="#" >تعديل</a>
                                         @endif

                                         @if(auth()->user()->hasPermission('writers_delete'))
                                             <a class="btn btn-danger" href="{{ route('delete-writer', $writer->id) }}" >حذف</a>
                                         @else
                                             <a class="btn btn-danger disabled" href="#" >حذف</a>
                                         @endif

                                     </td>

                                 </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>

@endsection

