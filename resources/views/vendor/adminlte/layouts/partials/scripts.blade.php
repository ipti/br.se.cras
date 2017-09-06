<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
  <script src="{{url('//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js')}}"></script>
<script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js')}}"></script>  


<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<!-- <script src="{{ url ('/js/jquery-3.2.1.js') }}" type="text/javascript"></script> -->
<script src="{{ url('/js/tabelaCadastro.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/pagesCadastro.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/jquery.mask.min.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
 

<script src="{{asset('/plugins/jquery.dataTables.js') }}"></script>
<script src="{{asset('/plugins/dataTables.bootstrap.min.js') }}"></script>

<script src="{{asset('/plugins/jquery.inputmask.js') }}"></script>
<script src="{{asset('/plugins/jquery.inputmask.date.extensions.js') }}"></script>

<script src="{{ url('/js/notify.js') }}"></script>


<!-- <script type="text/javascript">
	      	$("[data-mask]").inputmask();
</script> -->

<script>
  $(function () {
 
    $('#example2').DataTable({
      "paging": true,
        "order":[[2,"desc"]],
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>


<script>
    $(function () {

        $('#familias').DataTable({
            "paging": true,
            "order":[[0,"asc"]],
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>


<!-- Validações dos campos -->

<script type="text/javascript">
$(document).ready(function(){
  $('#cpf').mask('000.000.000-00');
});

$(document).ready(function(){
  $('#data_nascimento').mask('00/00/0000');
});


$(document).ready(function(){
  $('#data_atendimento').mask('00/00/0000');
});

$(document).ready(function(){
  $('#data_entrada').mask('00/00/0000');
});

$(document).ready(function(){
  $('#data_saida').mask('00/00/0000');
});

$(document).ready(function(){
  $('#RgEmissao').mask('00/00/0000');
});


$("#name").on("input", function(){
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

$("#apelido").on("input", function(){
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

$('#RgOrgaoEmissor').keyup(function () { 
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
});
$('#deficiencia').keyup(function () { 
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
});
$('#mae').keyup(function () { 
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
});
$('#pai').keyup(function () { 
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
});
$('#profissao').keyup(function () { 
  var regexp = /[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g;
    });
$(document).ready(function(){
  $('#telefone').mask('(99) 9 9999-9999');
});


$(document).on('keyup', '#nome',function () { 
    this.value = this.value.replace(/[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g,' ');
});

$(document).on('keyup', '#parentesco',function () {
    this.value = this.value.replace(/[^a-zA-Z áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ]/g,'');
});


function verificaNumero(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            }
            $(document).ready(function() {
                $("#NumeroCadastro").keypress(verificaNumero);
                $("#nis").keypress(verificaNumero);
                // $("#txtCEP3").keypress(verificaNumero);
            });


            //USADO NA VIEW VISUALIZAR
            //NÃO PERMITE NUMEROS EM ALGUNS CAMPOS COMO O DE NOME            
            function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
    $("#apenasLetras").on("input", function(){
  var regexp = /[^a-zA-Z]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});
    function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 65 || charCode > 90) &&
        (charCode < 97 || charCode > 122)) {
      $.notify("Caracteres numéricos não são aceitos", "error");
        return false;
    }
    return true;
}
function alerta(){
  $.notify("Caracteres numéricos não são aceitos", "info");
}

</script>

