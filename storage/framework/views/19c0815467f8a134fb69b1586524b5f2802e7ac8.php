<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<body class="hold-transition login-page">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo" style="width: 100%">
                <a href="<?php echo e(url('/home')); ?>"><b>CRAS</b></a>
            </div><!-- /.login-logo -->
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> <?php echo e(trans('adminlte_lang::message.someproblems')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="login-box-body">
        <p class="login-box-msg"> <?php echo e(trans('adminlte_lang::message.siginsession')); ?> </p>
        <login-form name="<?php echo e(config('auth.providers.users.field','email')); ?>"
                    domain="<?php echo e(config('auth.defaults.domain','')); ?>"></login-form>
                    <!--DIV COM OS BOTÕES CADASTRE-SE E ESQUECI A SENHA-->
                    <!--<div class="row">
                        <div class="col-sm-3 col-md-6">
                            <a href="/register" type="button" class="btn btn-primary btn-block btn-flat" style="">cadastre-se</a>
                        </div>
                        <div class="col-sm-3 col-md-6">
                            <a href="<?php echo e(url('/password/reset')); ?>" type="button" class="btn btn-danger btn-block btn-flat">Esqueci a senha</a><br> 
                        </div>
                    </div>-->                                        
        
    </div>
    </div>
    </div>
    <?php echo $__env->make('adminlte::layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>