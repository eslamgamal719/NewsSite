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
                    <div class="col-sm-12">
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title">جدول الاقسام</h1>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')

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
                                     <td>{{ $department->name  }}</td>
                                     <td>{{ $department->parent_id == null ? 'قسم رئيسى' : 'قسم فرعى' }}</td>
                                     <td>{{ $department->supervisor_name  }}</td>
                                     <td>{{ $department->editor_name }}</td>
                                     <td>{{ $department->writer_name  }}</td>
                                     <td>

                                         @if(auth()->user()->hasPermission('departments_update'))
                                             <a class="btn btn-primary" href="{{ route('departments.edit', $department->id) }}" >تعديل</a>
                                         @else
                                             <a class="btn btn-primary disabled" href="#" >تعديل</a>
                                         @endif

                                         @if(auth()->user()->hasPermission('departments_delete'))
                                             <form method="post" action="{{ route('departments.destroy', $department->id) }}"
                                             style="display: inline-block;"
                                             >
                                                 @csrf
                                                 @method('delete')
                                                 <input type="submit" class="btn btn-danger" value="حذف">
                                             </form>
                                         @else
                                             <a class="btn btn-primary disabled" href="#" >حذف</a>
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
        </div>

@endsection

