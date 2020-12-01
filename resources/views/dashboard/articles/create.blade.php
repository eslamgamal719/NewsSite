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
                                    <h3 class="card-title">انشاء مقال جديد</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post"  action="{{ route('articles.store') }}">

                                    @csrf

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">عنوان المقال</label>
                                            <input type="text" name="title" class="form-control"  value="{{ old('title') }}"
                                                   placeholder="">
                                        </div>


                                        <div class="form-group">
                                            <label>حاله المقال</label>
                                            <select name="status" class="form-control" style="width: 100%;">
                                                    <option value="0">غير مفعل</option>
                                                      <option value="1">مفعل</option>
                                            </select>
                                        </div>


                                        <div class="form-group department-menu" >
                                            <label>الاقسام</label>
                                            <select class="form-control select2" name="department_id" style="width: 100%;">
                                                @isset($parent_departs)
                                                    @foreach($parent_departs as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                        @if($child_departs->where('parent_id', $parent->id)->count() > 0)
                                                            @foreach($child_departs->where('parent_id', $parent->id) as $child)
                                                                <option value="{{ $child->id }}">&nbsp&nbsp&nbsp&nbsp&nbsp*{{ $child->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>محرر المقال</label>
                                            <select name="editor_id" class="form-control" style="width: 100%;">
                                                @isset($editors)
                                                    <option value="0">المحررين</option>
                                                @foreach($editors as $editor)
                                                        <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>كاتب المقال</label>
                                            <select name="writer_id" class="form-control" style="width: 100%;">
                                                @isset($writers)
                                                    <option value="0">الكتاب</option>
                                                @foreach($writers as $writer)
                                                        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1"> المحتوى
                                                        </label>
                                                        <textarea name="content" id="description"
                                                                  class="ckeditor" placeholder="">{{old('content')}}</textarea>

                                                        @error('content')
                                                        <span class="text-danger"></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>



                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">اضافه صور المقال</button>
                                    </div>
                                 </div>
                              </form>

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

