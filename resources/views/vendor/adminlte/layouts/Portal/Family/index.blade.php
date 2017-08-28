@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

@if(Session::has('alert'))
    {!! Session::get('alert') !!}

@endif
       

<section class="content">
  <div class="row">
    <div class="col-xs-12" >
      <div class="box box-warning">
        <h3 class="box-title" style="padding-left: 1%;">Lista de Famílias Referenciadas
        	 <div class="col-md-2 pull-right" >
          		<!--  -->
          			<a href="{{url('/familyCdst')}}" style="color:white; text-decoration:none;">
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
                      @forelse($identificacao as $id)
                    	 <tr>
                    	   	<th style="text-align: center;">{{$id->id}}</th>
                    	   	<th style="text-align: center;">{{$id->nome}}</th>
                    	   	<th style="text-align: center;">{{$id->data_nascimento}}</th>
                    	   	<th style="text-align: center;">{{$id->data_inicial}}</th>
                    	   	<th style="text-align: center;">
                           <a href="{{url("/family/$id->id")}}" ><i class="fa fa-search"></i> 
                          </th>
                          <th style="text-align: center;">
                           <a href="{{url("/attendance/$id->id")}}" ><i class="fa fa-plus-square-o"></i> 
                          </th>
                    	 </tr>
                       @empty
                       <tr>
                          <th>Nenhuma informação encontrada</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                       </tr>
                @endforelse
                       </tbody>
              </table>
          
         </div>
       </div>
 	 </div>
  </div>
</section>

@endsection