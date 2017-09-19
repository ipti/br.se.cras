<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(trans('adminlte_lang::message.home')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

    <div class="container-fluid">
    <!-- TO DO List -->
    <div class="box box-info" style="padding-left: 20px; padding-right: 20px;">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <div class="row">
    <div class="col-md-12">

    </div>
    <div class="col-md-6">
<h3 class="box-title"> Todos os Atendimentos</h3>
    </div>
   
</div>
            <hr>
        </div>

        <table id="example2" class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;">nº do Cadastro</th>
                <th style="text-align: center;">Nome</th>
                <th style="text-align: center;">Data de Atendimento</th>
                <th style="text-align: center;">RG/NIS</th>
                <th style="text-align: center;">Técnico</th>
                <th style="text-align: center;">Solicitação</th>
                <th style="text-align: center;">Encaminhamento</th>
                <th style="text-align: center;">Resultado </th>
                <th style="text-align: center;">Editar </th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($identificacao) != 0 || count($membro) != 0): ?><tr>
            <?php $__currentLoopData = $identificacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                <th style="text-align: center;"><?php echo e($id->id); ?></th>                
                <th style="text-align: center;"><?php echo e($id->nome_usuario); ?></th>
                <th style="text-align: center;"><?php echo e($id->data); ?></th>
                <th style="text-align: center;"><?php echo e($id->numero_rg); ?>-<?php echo e($id->emissao_rg); ?>-<?php echo e($id->uf_rg); ?> | <?php echo e($id->NIS); ?></th>
                <th style="text-align: center;"><?php echo e($id->nome_tecnico); ?> </th>
                <th style="text-align: center;"><?php echo e($id->solicitacao); ?></th>
                <th style="text-align: center;"><?php echo e($id->encaminhamento); ?></th>
                <th style="text-align: center;"><?php echo e($id->resultado); ?></th>     
                <th style="text-align: center;">
                <a href="<?php echo e(url("/attendance/edit/$id->id_usuario/$id->id_atendimento")); ?>" ><i class="fa fa-pencil"></i> </th>

            </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 <?php $__currentLoopData = $membro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                          <th style="text-align: center;"><?php echo e($m->id); ?></th>
                          <th style="text-align: center;"><?php echo e($m->nome_usuario); ?></th>
                          <th style="text-align: center;"><?php echo e($m->data); ?></th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;"><?php echo e($m->nome_tecnico); ?></th>
                          <th style="text-align: center;"><?php echo e($m->solicitacao); ?></th>
                          <th style="text-align: center;"><?php echo e($m->encaminhamento); ?></th>
                          <th style="text-align: center;"><?php echo e($m->resultado); ?></th>
                          <th style="text-align: center;">
                           <a href="<?php echo e(url("/attendance/edit/$m->id_usuario/$m->id_atendimento")); ?>" ><i class="fa fa-pencil"></i> 
                          </th>
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
                            <th style="text-align: center;"></th>
                        </tr> 
                        <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>