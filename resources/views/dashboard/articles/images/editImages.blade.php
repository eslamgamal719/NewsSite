@extends('layouts.admin')


@section('content')

    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  تعديل صور المقال</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('save-images') }}" method="POST" class="dropzone dz-clickable" enctype="multipart/form-data" id="image-upload">
                            @csrf

                            <div class="form-group">

                                <div class="dz-default dz-message"><span>Drop zone file upload</span></div>
                            </div>

                            <input type="hidden" value="{{ $article_id }}" name="article_id">
                        </form>
                        <br><a class='btn btn-success' href="{{ route('articles.index') }}" >حفظ</a>

                    </div> <br>


                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                <p>الصور الحاليه</p>
                            </div>
                        </div>

                        <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">
                            <div class="row">
                                @isset($images)
                                    @forelse($images as $image)
                                        <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ $image->image_url }}" itemprop="contentUrl" data-size="480x360" >
                                                <img class="img-thumbnail img-fluid" src="{{ $image->image_url }}"
                                                     itemprop="thumbnail" alt="Image description" style="height: 200px;width: 250px"/>
                                            </a>
                                        </figure>


                                    @empty
                                        لا يوجد صور حتى الان
                                    @endforelse
                                @endisset
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




@endsection


