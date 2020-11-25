@extends('layouts.admin')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الاقسام</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">لوحه التحكم</a></li>
                            <li class="breadcrumb-item active">الاقسام</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">جدول الاقسام</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>نوع القسم</th>
                                <th>المشرف</th>
                                <th>المحرر</th>
                                <th>الكاتب</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($departments as $index => $department)
                                 <tr>
                                     <td>{{ $index + 1 }}</td>
                                     <td>{{ $department->name }}</td>
                                     <td>{{ $department->parent_id == null ? 'قسم رئيسى' : 'قسم فرعى' }}</td>
                                     <td>{{ $department->supervisor_id }}</td>
                                     <td>{{ $department->editor_id }}</td>
                                     <td>{{ $department->writer_id }}</td>
                                     <td>
                                         <a class="btn btn-primary" href="{{ route('departments.edit', $department->id) }}">تعديل</a>
                                         <a class="btn btn-danger" href="{{ route('departments.destroy', $department->id) }}">حذف</a>
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
        </div>

@endsection

