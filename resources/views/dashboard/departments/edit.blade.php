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
                                    <h3 class="card-title">تعديل القسم </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post"  action="{{ route('departments.update', $department->id) }}">

                                    @csrf
                                    @method('put')

                                    <input type="hidden" value="{{ $department->id }}">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم القسم</label>
                                            <input type="text" name="name" class="form-control"  value="{{ $department->name }}"
                                                   placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label>مشرف القسم</label>
                                            <select name="supervisor_id" class="form-control" style="width: 100%;">
                                                @isset($supervisors)
                                                    <option value="0"></option>
                                                    @foreach($supervisors as $supervisor)
                                                         <option value="{{ $supervisor->id }}"
                                                        {{ $supervisor->id === $department->supervisor_id ? "selected" : '' }}
                                                         >{{ $supervisor->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>محرر القسم</label>
                                            <select name="editor_id" class="form-control" style="width: 100%;">
                                                @isset($editors)
                                                    <option value="0"></option>
                                                @foreach($editors as $editor)
                                                        <option value="{{ $editor->id }}"
                                                       {{ $editor->id == $department->editor_id ? 'selected' : '' }}
                                                        >{{ $editor->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>كاتب القسم</label>
                                            <select name="writer_id" class="form-control" style="width: 100%;">
                                                @isset($writers)
                                                    <option value="0"></option>
                                                @foreach($writers as $writer)
                                                        <option value="{{ $writer->id }}"
                                                      {{ $writer->id == $department->writer_id ? 'selected' : '' }}
                                                        >{{ $writer->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>



                                        <div class="col-sm-12">
                                            <label>نوع القسم</label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary1" name="type"  value="1"
                                                    @if($department->parent_id == null) checked @endif
                                                    >
                                                    <label for="radioPrimary1">
                                                        قسم رئيسى
                                                    </label>
                                                </div>

                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary3" value="2" name="type"
                                                           @if($department->parent_id != null) checked @endif
                                                    >
                                                    <label for="radioPrimary3">
                                                        قسم فرعى
                                                    </label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group department-menu" style="display: none">
                                            <label>الاقسام</label>
                                            <select class="form-control select2" style="width: 100%;">
                                            @isset($parent_departs)
                                                @foreach($parent_departs as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                    @if($child_departs->where('parent_id', $parent->id)->count() > 0)
                                                        @foreach($child_departs->where('parent_id', $parent->id) as $child)
                                                        <option value="{{ $child->id }}"

                                                        >&nbsp&nbsp&nbsp&nbsp&nbsp*{{ $child->name }}</option>
                                                         @endforeach
                                                     @endif
                                                @endforeach
                                            @endisset
                                            </select>
                                        </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">تعديل</button>
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

