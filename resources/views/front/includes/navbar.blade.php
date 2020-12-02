<nav class="navbar navbar-expand-lg navbar-light nav-bg-color p-0" style="z-index: 10;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav p-0">

                <li class="nav-item ">
                    <a class="nav-link aa" href="{{ route('front') }}">الرئيسية
                        <div class="show-link"></div>
                    </a>
                </li>
         @isset($departments)
            @foreach($departments as $department)
                    <li class="nav-item">
                        <a class="nav-link aa" href="{{ route('get-department', $department->id) }}">{{$department->name}}
                            <div class="show-link"></div>
                        </a>
                    </li>
            @endforeach
         @endisset
            </ul>

            <div class="search m-auto " style="padding-left: 80px !important;">
            </div>
        </div>
</nav>

<div class="container">
    <div class="row text-center mb-3">
        <img src="{{asset('assets/front/img/12144.jpg')}}" width="60%" height="90" alt="" class=" m-auto">
    </div>
