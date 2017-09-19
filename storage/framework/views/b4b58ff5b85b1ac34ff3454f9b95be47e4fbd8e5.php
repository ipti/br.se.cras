<?php $__env->startSection('main-content'); ?>

 <?php $__empty_1 = true; $__currentLoopData = $identificacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<form action="<?php echo e(url("/attendance/$id->id")); ?>"  method="post" name="formulario" id="formulario">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
    <?php echo e(csrf_field()); ?>

    <div class="box box-info">   

      <h3 class="box-title" style="padding-left: 1%;">Atendimento de Atendimentos
        	 <div class="col-md-2 pull-right" >
          		<!--  -->

          			<a href="#" style="color:white; text-decoration:none;"></a>
       		  </div>
		</h3>
        <hr>   			           
            <div  class="row" id="box1">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group" id="">
                  <span class="input-group-addon">Data do Atendimento</span>
              <input type="text" class="form-control"   name="data_atendimento" id="data_atendimento"  placeholder="Data do atendimento" required="" value="">              
                </div>
              </div>
            </div>

            <div  class="row" id="box1">
          <h4> I - Dados do Atendimento</h4>
          <br>
          
           <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id=""  style="width: 100%;" >
             <div class="input-group">
                  <label class="input-group-addon">Serviço</label>
                  <select class="form-control"  name="servico">
                    <?php $__empty_1 = true; $__currentLoopData = $servico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <option value="<?php echo e($serv->id); ?>" ><?php echo e($serv->nome); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <option>Não tem técnico cadastrado no sistema.</option>
                     <?php endif; ?>
                  </select>
              </div>
            </div>
          </div>
      
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Solicitação</span>
              <input  type="text" name="socicitacao" class="form-control" placeholder="" id="" title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Providências</span>
              <input  type="text" name="providencia"      class="form-control" placeholder="" id=""  title="Informe um nome válido." >
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Resultado</span>
              <input  type="text" name="resultado"      class="form-control" placeholder="" id="" title="Informe um nome válido."  >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
        	<div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group">
                            <label class="input-group-addon">Técnico Responsável</label>
                            <select class="form-control"  name="tecnico">
                              <?php $__empty_1 = true; $__currentLoopData = $tecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($tec->id); ?>" name="tecnico"><?php echo e($tec->nome); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option>Não tem técnico cadastrado no sistema.</option>
                               <?php endif; ?>
                            </select>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">

                        <!-- <span class="input-group-addon">UF</span> -->
                        <div class="input-group">
                            <label class="input-group-addon">Usuário ou Membro Familiar</label>
                            <select class="form-control" name="id_user" placeholder="<?php echo e($id->nome); ?>">
                              <option name='id_user' value=""><?php echo e($id->nome); ?></option>
                              <?php $__currentLoopData = $membro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->id); ?>" tipo ="<?php echo e($m->id); ?>"><?php echo e($m->nome); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                </div>
        </div>
         <br><br>
         <div class="row"  style="text-align: center;">
              <input type="submit" name="Finalizar Cadastro" class="btn btn-success">
            </div>
        <br><br>
</div>
</form>
 <?php
// var_dump(DB::table('attendance_daily')->get());exit();


 // for ($i=0; $i < 1; $i++) { 
 //    // $iden = $id;
 //    // dd($iden);

 //   // $consulta = mysql_query("SELECT * FROM attendance_daily WHERE id_indentification_person = $iden");
 //   // dd($consulta);
 // }
 ?>  
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>