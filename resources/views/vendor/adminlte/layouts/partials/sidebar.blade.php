<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class='fa  fa-calendar-plus-o'></i>
                    <span>{{ trans('message.attendance') }}</span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{ url('attendance') }}">
                            <i class='fa fa-list'></i>
                            <span>Lista de Atendimentos</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('attendance/report') }}">
                            <i class='fa fa-list'></i>
                            <span>Relatório</span>
                        </a>
                    </li>
                    <!-- <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li> -->
                </ul>
            </li>
            <!-- <li class=""><a href="{{ url('attendance') }}"><i class='fa  fa-calendar-plus-o'></i>
                    <span>{{ trans('message.attendance') }}</span>
                </a>
            </li> -->

            <li><a href="{{url('/family')}}"><i class='fa fa-group'></i> <span>{{trans('message.family_referenced')}}</span></a></li>

            <li>
                <a href="{{url('/user')}}">
                    <i class='fa fa-user'></i> <span>{{trans('message.users')}}</span>
                </a>
            </li>
            
                
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
