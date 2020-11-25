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
                                    <h3 class="card-title">انشاء قسم جديد</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post"  action="{{ route('departments.store') }}">

                                    @csrf

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">عنوان المقال</label>
                                            <input type="text" name="name" class="form-control"  value="{{ old('name') }}"
                                                   placeholder="">
                                        </div>


                                        <div class="form-group">
                                            <label>حاله المقال</label>
                                            <select name="status" class="form-control" style="width: 100%;">
                                                    <option value="0">غير مفعل</option>
                                                      <option value="1">مفعل</option>
                                            </select>
                                        </div>



                                        <div class="form-group department-menu" style="display: none">
                                            <label>الاقسام</label>
                                            <select class="form-control select2" style="width: 100%;">
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


                                                            <!-- tools box -->
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                                        title="Collapse">
                                                                    <i class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                                        title="Remove">
                                                                    <i class="fas fa-times"></i></button>
                                                            </div>
                                                            <!-- /. tools -->
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body pad">
                                                            <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                            </div>
                                                        </div>

                                                </div>
                                                <!-- /.col-->














                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
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


    </script>

@endsection

