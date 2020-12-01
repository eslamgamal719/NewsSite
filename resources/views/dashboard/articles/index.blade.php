@extends('layouts.admin')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">المقالات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">لوحه التحكم</a></li>
                            <li class="breadcrumb-item active">المقالات</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">جميع المقالات</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive p-0">
                        @if($articles && $articles->count() > 0)
                        <table class="table table-hover text-nowrap">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>الحاله</th>
                                <th>القسم</th>
                                <th>المحرر</th>
                                <th>الكاتب</th>
                                <th>كتب فى</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($articles as $index => $article)
                                 <tr>
                                     <td>{{ $index + 1 }}</td>
                                     <td>{{ $article->title }}</td>
                                     <td>{{ $article->getActive()}}</td>
                                     <td>{{ $article->department_name }}</td>
                                     <td>{{ $article->editor_name }}</td>
                                     <td>{{ $article->writer_name }}</td>
                                     <td>{{ $article->created_at }}</td>
                                     <td>
                                         <a class="btn btn-primary" href="{{ route('articles.edit', $article->id) }}">تعديل</a>
                                         <form method="post" action="{{ route('articles.destroy', $article->id) }}" style="display: inline-block">
                                             @csrf
                                             @method('delete')
                                             <input type="submit" value="حذف" class="btn btn-danger">
                                         </form>
                                     </td>

                                 </tr>
                            @endforeach

                            </tbody>
                        </table>
                         @else
                             <h3>There is no articles</h3>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

        </div>
        </div>

@endsection

