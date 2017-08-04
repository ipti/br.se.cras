(function($) {
   var cont=0;
  AddTableRow = function() {

    var newRow = $("<tr>");
    var cols = "";
    cols += '<th><input type="number" class="form-control" id="nisMembro" name="nis '+cont+'"></th>';
    cols += '<th><input type="text" class="form-control" id="nome" name="nomeMembro '+cont+'"></th>';
    cols += '<th style=width:11%;><input type="text" class="form-control" id="parentesco" name="parentesco '+cont+'"></th>';
    cols += '<th style=width:7%;><input type="number" class="form-control" id="idade" name="idade '+cont+'" ></th>';
    cols += '<th><select class="form-control select2 select2-hidden-accessible" name="sexo '+cont+'"><option value=m>Masculino</option><option value=f>Feminino</option></select></th>';
    cols += '<th style=width:25%;>';
    cols += '<small>Marque o benefício e o valor correspondente</small>';
    cols += '<div class=input-group><span class=input-group-addon>LOAS/BPC</span><input style=height:1%!important; type="number" class="form-control" id="loasMembro" name="loas '+cont+'" /><span class=input-group-addon><span>R$</span></span></div>';
    cols += '<br>';
    cols += '<div class=input-group><span class=input-group-addon> Bolsa Família</span><input style=height:1%!important; type="number" class="form-control" id="bolsaFamiliaMembro" name="bolsaFamilia '+cont+'" /><span class=input-group-addon><span>R$</span></span></div>';
    cols += '<br>';
    cols += '<div class=input-group><span class=input-group-addon> Previdência Social</span><input style=height:1%!important; type="number" class="form-control" id="previdenciaMembro" name="previdencia '+cont+'" /><span class=input-group-addon><span>R$</span></span></div>';
    cols += '<br>';
    cols += '<div class=input-group><span class=input-group-addon> Renda Mensal</span><input style=height:1%!important; type="number" class="form-control" id="rendaMensalUser" name="rendaMensalUser '+cont+'" /><span class=input-group-addon><span>R$</span></span></div>';
    cols += '</th>';
    cols += '<th>';
    cols += '<button onclick="remove(this)" type="button" class="btn btn-danger btn-sm">Remover</button>';
    cols += '</th>';
    newRow.append(cols);
    $("#products-table").append(newRow);
    cont++;
    return false;
  };
})(jQuery);

(function($) {
  remove = function(item) {
    var tr = $(item).closest('tr');
    tr.fadeOut(400, function() {
      tr.remove();  
    });
    return false;
  }
})(jQuery);