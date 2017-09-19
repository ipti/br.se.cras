<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.home')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

<?php if(Session::has('alert')): ?>
    <?php echo Session::get('alert'); ?>


<?php endif; ?>
       

<section class="content">
  <div class="row">
    <div class="col-xs-12" >
      <div class="box box-warning">
        <h3 class="box-title" style="padding-left: 1%;">Lista de Famílias Referenciadas
        	 <div class="col-md-2 pull-right" >
          		<!--  -->
          			<a href="<?php echo e(url('/familyCdst')); ?>" style="color:white; text-decoration:none;">
                <button type="button" class="btn btn-block btn-primary btn-xs" >
            		<i class='fa fa-plus-square-o'> &nbsp;</i> Novo Cadastro
                </button>
         			  </a>
        		  <!--  -->
       		  </div>
		</h3>
        <hr>

        <!-- /.box-header -->
        <div class="box-body">
                  <!-- /.box-header -->
                  
                    <table id="familias" class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: center;">Nº Cadastro</th>
                          <th style="text-align: center;">Nome</th>
                          <th style="text-align: center;">Data de Nascimento</th>
                          <th style="text-align: center;">Entrada</th>
                          <th style="text-align: center;">Visualizar/Editar Cadastro </th>
                          <th style="text-align: center;">Novo Atendimento </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $__empty_1 = true; $__currentLoopData = $identificacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    	 <tr>
                    	   	<th style="text-align: center;"><?php echo e($id->id); ?></th>
                    	   	<th style="text-align: center;"><?php echo e($id->nome); ?></th>
                    	   	<th style="text-align: center;"><?php echo e($id->data_nascimento); ?></th>
                    	   	<th style="text-align: center;"><?php echo e($id->data_inicial); ?></th>
                    	   	<th style="text-align: center;">
                           <a href="<?php echo e(url("/family/$id->id")); ?>" ><i class="fa fa-search"></i> 
                          </th>
                          <th style="text-align: center;">
                           <a href="<?php echo e(url("/attendance/$id->id")); ?>" ><i class="fa fa-plus-square-o"></i> 
                          </th>
                    	 </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                       <tr>
                          <th>Nenhuma informação encontrada</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                       </tr>
                <?php endif; ?>
                       </tbody>
              </table>
          
         </div>
       </div>
 	 </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>