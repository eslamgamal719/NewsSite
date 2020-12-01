@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            @foreach($departments as $department)
                @isset($department->audits)
                <ul>
                    @foreach ($department->audits as $audit)
                        <li>
                            @lang('department.updated.metadata', $audit->getMetadata())

                            @foreach ($audit->getModified() as $attribute => $modified)
                                <ul>
                                    <li>@lang('department.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                                </ul>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
                    @endisset
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
