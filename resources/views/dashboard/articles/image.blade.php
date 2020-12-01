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
                            <h3 class="card-title">  رفع صور المقال</h3>
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

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')

    <script>

        $("input:radio[name='type']").on('change', function() {

                if(this.checked && this.value == '2') {
                    $('.department-menu').show();
                } else {
                    $('.department-menu').hide();
                }
        });

        CKEDITOR.config.language =  "{{ app()->getLocale() }}";


    </script>


@endsection

