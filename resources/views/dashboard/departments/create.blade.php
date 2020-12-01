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
                                            <label for="exampleInputEmail1">اسم القسم</label>
                                            <input type="text" name="name" class="form-control"  value="{{ old('name') }}"
                                                   placeholder="">

                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>مشرف القسم</label>
                                            <select name="supervisor_id" class="form-control" style="width: 100%;">
                                                @isset($supervisors)
                                                    <option value="0">المشرفين</option>
                                                    @foreach($supervisors as $supervisor)
                                                         <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>محرر القسم</label>
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
                                            <label>كاتب القسم</label>
                                            <select name="writer_id" class="form-control" style="width: 100%;">
                                                @isset($writers)
                                                    <option value="0">الكتاب</option>
                                                @foreach($writers as $writer)
                                                        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>



                                        <div class="col-sm-12">
                                            <label>نوع القسم</label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary1" name="type"  value="1"  checked>
                                                    <label for="radioPrimary1">
                                                        قسم رئيسى
                                                    </label>
                                                </div>

                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary3" value="2" name="type">
                                                    <label for="radioPrimary3">
                                                        قسم فرعى
                                                    </label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group department-menu" style="display: none">
                                            <label>الاقسام</label>
                                            <select class="form-control" name="parent_id" style="width: 100%;">
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

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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



    </script>

@endsection

