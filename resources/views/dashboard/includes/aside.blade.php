<!-- Main Sidebar Container -->





<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Eslam Gamal</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="بحث ...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>لوحه التحكم</span>
                </a>
            </li>


            @if(auth()->user()->hasPermission('departments_read'))
            <li class="treeview">
                <a href="#"><i class="fa fa-list-alt"></i> <span>الاقسام </span> <span class="label label-primary pull-left"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('departments.create') }}"><i class="fa fa-plus"></i> انشاء قسم جديد</a></li>
                    <li><a href="{{ route('departments.index') }}"><i class="fa fa-list-alt"></i> عرض الاقسام</a></li>
                </ul>
            </li>
            @endif




            @if(auth()->user()->hasPermission('users_read'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>الموظفين</span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add-employee') }}"><i class="fa fa-plus"></i>اضافه موظف جديد</a></li>
                    <li><a href="{{ route('get-supervisors') }}"><i class="fa fa-users"></i> المشرفين</a></li>
                    <li><a href="{{ route('get-editors') }}"><i class="fa fa-users"></i> المحررين</a></li>
                    <li><a href="{{ route('get-writers') }}"><i class="fa fa-users"></i> الكتاب </a></li>
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasPermission('articles_read'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>المقالات</span>
                    <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('articles.create') }}"><i class="fa fa-plus"></i> انشاء مقال جديد</a></li>
                    <li><a href="{{ route('articles.index') }}"><i class="fa fa-files-o"></i> عرض المقالات</a></li>
                </ul>
            </li>
            @endif


            <li class="active treeview">
                <a href="{{ route('get-gallery') }}">
                    <i class="fa fa-camera"></i> <span> صور المقالات</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
