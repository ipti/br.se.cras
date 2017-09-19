<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.home')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	 <div class="row">
   <a href="<?php echo e(url('/attendance')); ?>" class="small-box-footer">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo e($totalAtendimento); ?></h3>
              <p>Total de Atendimentos </p>
            </div>
              <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <!-- Mais Informações <i class="fa fa-arrow-circle-right"></i> -->
          </div>
        </div>
        </a>
        <!-- ./col -->
         <a href="<?php echo e(url('/family')); ?>" class="small-box-footer">
        <div class="col-lg-6 col-xs-6">
        
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo e($totalFamilias); ?><sup style="font-size: 20px"></sup></h3>
              <p>Total de Famílias Referenciadas</p>
            </div>
            <div class="icon">
              <i class="fa fa fa-users"></i>
            </div>
          </div>
        </div>
        </a>
        <!-- ./col -->
       <!--  -->
      </div>
    
    <div class="listaDeAvisos">
        <!-- TO DO List -->
        <div class="box box-info" style="padding-left: 20px; padding-right: 20px;">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title"> Atendimentos de hoje: <?php echo date('d/m/Y');?></h3>
              <hr>
            </div>
                
            <table id="example2" class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: center;">Nome</th>
                          <th style="text-align: center;">RG/NIS</th>
                          <th style="text-align: center;">CPF</th>
                          <th style="text-align: center;">Solicitação</th>
                          <th style="text-align: center;">Encaminhamento</th>
                          <th style="text-align: center;">Resultado </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(count($identificacao) != 0 || count($membro) != 0): ?>
                      <?php $__currentLoopData = $identificacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                          <th style="text-align: center;"><?php echo e($id->nome); ?></th>
                          <th style="text-align: center;"><?php echo e($id->numero_rg); ?>-<?php echo e($id->data_emissao_rg); ?>-<?php echo e($id->uf_rg); ?> | <?php echo e($id->NIS); ?></th>
                          <th style="text-align: center;"><?php echo e($id->cpf); ?> </th>
                          <th style="text-align: center;"><?php echo e($id->solicitacao); ?></th>
                          <th style="text-align: center;"><?php echo e($id->encaminhamento); ?></th>
                          <th style="text-align: center;"><?php echo e($id->resultado); ?></th>
                          
                       </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $membro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                          <th style="text-align: center;"><?php echo e($m->nome); ?></th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;"><?php echo e($m->solicitacao); ?></th>
                          <th style="text-align: center;"><?php echo e($m->encaminhamento); ?></th>
                          <th style="text-align: center;"><?php echo e($m->resultado); ?></th>
                          
                       </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                        <tr>
                            <th style="text-align: center;">Nenhuma informação encontrada</th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                        </tr> 
                        <?php endif; ?>
                       </tbody>
              </table>


          </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>