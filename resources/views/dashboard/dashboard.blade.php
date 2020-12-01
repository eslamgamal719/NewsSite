@extends('layouts.admin')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>لوحه التحكم </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $articles }}</h3>
                            <p>المقالات</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('articles.index') }}" class="small-box-footer"> التقارير <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $supervisors->count() }}</h3>
                            <p>المشرفين</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('get-supervisors') }}" class="small-box-footer"> المشرفين <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $editors->count() }}</h3>
                            <p> المحررين </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('get-editors') }}" class="small-box-footer"> المحررين <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $writers->count() }}</h3>
                            <p>الكتاب</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('get-writers') }}" class="small-box-footer"> الكتاب <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
        </section>


        <div class="row">

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">المشرفين</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th> الاسم</th>
                                <th> البريد</th>
                                <th>الحاله</th>
                            </tr>
                            @foreach($supervisors as $index=>$supervisor)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $supervisor->name }}</td>
                                    <td>{{ $supervisor->email }}</td>
                                    <td>
                                        @if($supervisor->isOnline())
                                            <li class="text-success">
                                                Online
                                            </li>
                                        @else
                                            <li class="text-muted">
                                                Offline
                                            </li>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">المحررين</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th> الاسم</th>
                                <th> البريد</th>
                                <th>الحاله</th>
                            </tr>
                            @foreach($editors as $index=>$editor)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $editor->name }}</td>
                                    <td>{{ $editor->email }}</td>
                                    <td>
                                        @if($editor->isOnline())
                                            <li class="text-success">
                                                Online
                                            </li>
                                        @else
                                            <li class="text-muted">
                                                Offline
                                            </li>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">الكتاب</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th> الاسم</th>
                                <th> البريد</th>
                                <th>الحاله</th>
                            </tr>
                            @foreach($writers as $index=>$writer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $writer->name }}</td>
                                    <td>{{ $writer->email }}</td>
                                    <td>
                                        @if($writer->isOnline())
                                            <li class="text-success">
                                                Online
                                            </li>
                                        @else
                                            <li class="text-muted">
                                                Offline
                                            </li>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>

        <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FYoum7&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=242258270313775"
            width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

    </div>


        {{--       <ul>
                   @forelse ($audits as $audit)
                       <li>
                           @lang('department.updated.metadata', $audit->getMetadata())

                           @foreach ($audit->getModified() as $attribute => $modified)
                               <ul>
                                   <li>@lang('department.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                               </ul>
                           @endforeach
                       </li>
                   @empty
                       <p>@lang('department.unavailable_audits')</p>
                   @endforelse
               </ul> --}}




@endsection

