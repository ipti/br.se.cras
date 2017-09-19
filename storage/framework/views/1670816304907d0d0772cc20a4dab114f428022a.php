<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- search form (Optional) -->
        
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('adminlte_lang::message.header')); ?></li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span><?php echo e(trans('adminlte_lang::message.home')); ?></span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa  fa-calendar-plus-o'></i> <span><?php echo e(trans('message.attendance')); ?></span></a>
                <ul class="treeview-menu">
                <li class=""><a href="<?php echo e(url('attendance')); ?>"><i class='fa fa-list'></i>
                    <span>Lista de Atendimentos</span></a></li>
                    <!-- <li><a href="#"><?php echo e(trans('adminlte_lang::message.linklevel2')); ?></a></li> -->
                </ul>
            </li>
            <!-- <li class=""><a href="<?php echo e(url('attendance')); ?>"><i class='fa  fa-calendar-plus-o'></i>
                    <span><?php echo e(trans('message.attendance')); ?></span>
                </a>
            </li> -->

            <li><a href="<?php echo e(url('/family')); ?>"><i class='fa fa-group'></i> <span><?php echo e(trans('message.family_referenced')); ?></span></a></li>
            
                
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
