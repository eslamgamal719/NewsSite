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
                                    <h3 class="card-title">تعديل بيانات الكاتب </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="{{route('update-writer', $writer->id)}}">
                                    @csrf

                                    <input type="hidden" value="{{ $writer->id }}" name="id">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الكاتب</label>
                                            <input type="text" name="name" class="form-control" value="{{ $writer->name }}"
                                                   id="exampleInputEmail1"
                                                   placeholder="ادخل اسم الكاتب">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">البريد الالكترونى</label>
                                            <input type="email" name="email" class="form-control" value="{{ $writer->email }}" id="exampleInputEmail1"
                                                   placeholder="ادخل البريد الالكترونى">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection

