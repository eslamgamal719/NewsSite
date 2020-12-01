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
                                    <h3 class="card-title">اضافه موظف جديد</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="{{route('post-add-employee')}}">
                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الموظف</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="exampleInputEmail1"
                                                   placeholder="">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">البريد الالكترونى</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1"
                                                   placeholder="">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">كلمه السر</label>
                                            <input type="password" name="password" class="form-control"  id="exampleInputPassword1"
                                                   placeholder="">
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">تأكيد كلمه السر</label>
                                            <input type="password" name="password_confirmation"  class="form-control" id=""
                                                   placeholder="">
                                            @error('password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>الوظيفه</label>
                                            <select name="role" class="form-control select2" style="width: 100%;">
                                                <option value="supervisor" selected="selected">مشرف</option>
                                                <option value="editor">محرر</option>
                                                <option value="writer">كاتب</option>
                                            </select>
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



@endsection

