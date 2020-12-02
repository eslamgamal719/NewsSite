@extends('layouts.admin')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gallery</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">المقالات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="box-title">
                                صور المقالات
                            </div>
                        </div>
                        <div class="box-body">
                            @foreach($images as $image)
                                <div class="col-sm-2">
                                    <a href="{{ $image->image_url }}" data-toggle="lightbox" data-title="sample 3 - red"
                                       data-gallery="gallery">
                                        <img src="{{ $image->image_url }}" class="img-fluid mb-2 img-thumbnail"
                                              alt="red sample"/>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
              </div>
        </section>
    </div>

@endsection
