
jQuery(document).ready(function() {
    var postJSON;
    postJSON = 'aa';

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    jQuery('.add').click(function(e) {
        clearTips(jQuery('.tips'));
        var tipo = jQuery(this).data('tipo');

        jQuery('#nominativo1').val('');
        jQuery(".default_sel").remove();
        jQuery('#nominativo1 option[value="'+jQuery(this).data('id_nome')+'"]').attr("selected", "selected");
        $("#nominativo1").select2();
        jQuery('.select_cat').show();
        jQuery('.inp_cat').hide();
        jQuery('#categoria1').val('');
        jQuery('#categoria_s').val('');
        $("#categoria_s").select2({
            placeholder: "<?= $this->lang->line('seleziona_categoria');?>",
            allowClear: true
        });
        jQuery('#modello1').val('');
        jQuery('#guasto1').val('');
        jQuery('#pezzo1').val('');
        jQuery('#anticipo1').val('');
        jQuery('#prezzo1').val('');
        jQuery('#commenti1').val('');
        jQuery('#sms').prop('checked', false);

        $(".modal-content .custom").each(function() {
            $(this).val('');
        });

        if (tipo == 2) {
            jQuery('#tit').html('<?= $this->lang->line('js_nuova_rip');?>');
            jQuery('#pezzo1').attr("disabled", true);
        } else {
            jQuery('#tit').html('<?= $this->lang->line('js_nuovo_ord');?>');
            jQuery('#pezzo1').attr("disabled", false);
        }

        jQuery('#footerOR1').html("<div class=\"btn-group btn-group-justified left\"> <select id=\"status_edit\" class=\"form-control m-bot15\"><option value=\"1\"><?= $this->lang->line('incorso');?></option><option value=\"3\"><?= $this->lang->line('inattesa');?></option><option value=\"2\"><?= $this->lang->line('daconsegnare');?></option><option value=\"0\"><?= $this->lang->line('completato');?></option><option value=\"5\"><?= $this->lang->line('nonriparato');?></option></select> <input id=\"codice\" type=\"text\" class=\"validate form-control\" value=\"\" placeholder=\"<?= $this->lang->line('codice');?>\"></div><div class=\"btn-group btn-group-justified right\"><button data-dismiss=\"modal\" class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-reply\"></i> <?= $this->lang->line('js_torna_indietro');?></button><button id='submitOR' class='btn btn-success' data-tipo=" + tipo + " data-modo='apri'><i class=\"fa fa-plus-circle\"></i> <?= $this->lang->line('js_aggiungi');?></a></div>");
    });

    jQuery(document).on("click", "#submitOR", function() {
        var modo = jQuery(this).data("modo");
        var id = jQuery(this).data("num");

        var nominativo = jQuery('#nominativo1').val();
        var categoria = jQuery('#categoria1').val();
        var modello = jQuery('#modello1').val();
        var guasto = jQuery('#guasto1').val();
        var pezzo = jQuery('#pezzo1').val();
        var anticipo = jQuery('#anticipo1').val();
        var prezzo = jQuery('#prezzo1').val();
        var commenti = jQuery('#commenti1').val();
        var codice = generateRandom4DigitValue();

// Function to generate a random 4-digit value
function generateRandom4DigitValue() {
  var min = 1000; // Minimum 4-digit value (inclusive)
  var max = 9999; // Maximum 4-digit value (inclusive)
  var randomValue = Math.floor(Math.random() * (max - min + 1)) + min;
  return randomValue.toString(); // Convert the value to a string
}
        var status = jQuery('#status_edit').val();
        var custom = {};

        $(".modal-content .custom").each(function() {
            custom[$(this).attr( "id").substring(2)] = this.value;
        });

        if (jQuery('#sms').prop('checked')) {
            var sms = 1;
        } else {
            var sms = 0;
        }
        clearTips(jQuery('.tips'));
        //validate
        var tipo = jQuery(this).data('tipo');
        if (tipo == 1) {
            var valid = validLongName(jQuery('#categoria1'), "<?=$this->lang->line('Categoria_t');?>", jQuery('.tips')) && validLongName(jQuery('#modello1'), "<?=$this->lang->line('Modello_t');?>", jQuery('.tips')) && validLongName(jQuery('#pezzo1'), "<?=$this->lang->line('Pezzo_t');?>", jQuery('.tips')) && validNumeric(jQuery('#prezzo1'), jQuery('.tips'), "<?=$this->lang->line('Prezzo_t');?>");
        } else {
            var valid = validLongName(jQuery('#categoria1'), "<?= $this->lang->line('Categoria_t');?>", jQuery('.tips')) && validLongName(jQuery('#modello1'), "<?= $this->lang->line('Modello_t');?>", jQuery('.tips')) && validNumeric(jQuery('#anticipo1'), jQuery('.tips'), "<?= $this->lang->line('js_err_anticipo');?>") && validNumeric(jQuery('#prezzo1'), jQuery('.tips'), "<?= $this->lang->line('js_err_prezzo');?>");
        }

        if (valid) {
            var url = "";
            var dataString = "";

            if (modo == "apri") {
                url = base_url + "home/apri_ordine";
                dataString = "nominativo=" + escape(nominativo) + "&categoria=" + escape(categoria) + "&modello=" + escape(modello) + "&guasto=" + escape(guasto) + "&pezzo=" + escape(pezzo) + "&anticipo=" + escape(anticipo) + "&prezzo=" + escape(prezzo) + "&tipo=" + escape(tipo) + "&sms=" + escape(sms) + "&commenti=" + escape(commenti) + "&codice=" + escape(codice) + "&status=" + escape(status) + "&custom=" + escape(JSON.stringify(custom)) + "&token=<?=$_SESSION['token'];?>";
                jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    cache: false,
                    success: function(data) {
                        if (tipo == 1)
                            toastr['success']("<?= $this->lang->line('js_salva_in_corso');?>", "<?= $this->lang->line('js_nuovo_ordine_a');?>")
                            else
                                toastr['success']("<?= $this->lang->line('js_salva_in_corso');?>", "<?= $this->lang->line('js_nuova_riparazione_a');?>")

                                find(data);
                        $('#obj').modal('hide');
                        $('#visualizza_ordini').modal('show');
                        $('#dynamic-table').DataTable().ajax.reload();
                    }
                });
            } else {
                url = base_url + "home/modifica_ordine";
                dataString = "nominativo=" + escape(nominativo ) + "&categoria=" + escape(categoria) + "&modello=" + escape(modello) + "&guasto=" + escape(guasto) + "&pezzo=" + escape(pezzo) + "&anticipo=" + escape(anticipo) + "&prezzo=" + escape(prezzo) + "&tipo=" + escape(tipo) + "&id=" + escape(id) + "&sms=" + escape(sms) + "&commenti=" + escape(commenti) + "&codice=" + escape(codice) + "&status=" + escape(status) + "&custom=" + escape(JSON.stringify(custom)) + "&token=<?=$_SESSION['token'];?>";
                jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    cache: false,
                    success: function(data) {
                        if (tipo == 1) {
                            toastr['success']("<?= $this->lang->line('js_salva_in_corso');?>", "<?= $this->lang->line('js_agg_ordine_a');?>");

                        } else {
                            toastr['success']("<?= $this->lang->line('js_salva_in_corso');?>", "<?= $this->lang->line('js_agg_riparazione_a');?>");
                        }
                        $('#obj').modal('hide');
                        find(id);
                        $('#visualizza_ordini').modal('show');
                        $('#dynamic-table').DataTable().ajax.reload();
                    }
                });
            }
        }
        return false;
    });

    jQuery('.no_cliente').click(function(e) {
        toastr['error']('<?= $this->lang->line('js_no_cliente');?>', '');

    });

    if (getUrlVars()["id"]) {
        find(getUrlVars()["id"]);
        $('#visualizza_ordini').modal('show');
    }


    function find(num) {
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/prendi_oggetto",
            data: "id=" + num,
            cache: false,
            dataType: "json",
            success: function(data) {
                if (typeof data.Nominativo === 'undefined') {
                    alert('Codice inesistente');
                } else {

                    if (data.Tipo == 1)
                        var t = "<?= $this->lang->line('js_tipo_ordine_pezzo');?>"
                        else
                            var t = "<?= $this->lang->line('js_tipo_riparazione');?>"

                            jQuery('#titoloOE').html(t + " " + data.Modello + " <span>");
                    jQuery('#clientec').html("<a data-dismiss='modal' class='visualizza' href='#visualizza_clienti' data-toggle='modal' data-num='"+data.ID_Nominativo+"'>"+data.Nominativo+"</a>");
                    jQuery('#codicec').html(data.ID);
                    jQuery('#telefonoc').html(data.Telefono);
                    jQuery('#dataAperturac').html(data.dataApertura);
                    jQuery('#guastoc').html(data.Guasto);
                    jQuery('#categoriac').html(data.Categoria);
                    jQuery('#modelloc').html(data.Modello);
                    jQuery('#commentic').html(data.Commenti);
                    jQuery('#cod_rip').html(data.codice);

                    jQuery('.show_custom').html('');

                    var IS_JSON = true;
                    try
                    {
                        var json = $.parseJSON(data.custom_field);
                    }
                    catch(err)
                    {
                        IS_JSON = false;
                    }                

                    if(IS_JSON) 
                    {

                        $.each(json, function(id_field, val_field) {
                            jQuery('#v'+id_field).html(val_field);
                        });
                    }

                    if (data.Tipo == 1)
                        jQuery('#pezzoc').html(data.Pezzo);
                    else
                        jQuery('#pezzoc').html("No");
                    jQuery('#anticipoc').html(<?=$this->Impostazioni_model->get_money('data.Anticipo', false, true);?>);
                    jQuery('#prezzoc').html(<?=$this->Impostazioni_model->get_money('data.Prezzo', false, true);?>);
                    var string = "<div class=\"right col-sm-12 col-lg-6 btn-group\"><button type=\"button\" data-tipo=\"2\" data-num=\"" + data.ID + "\" id=\"stampa\" class=\"btn btn-default\"><i class=\"fa fa-print\"></i> <?= $this->lang->line('resoconto');?></button><button type=\"button\" data-tipo=\"1\" data-num=\"" + data.ID + "\" id=\"stampa\" class=\"btn btn-default\"><i class=\"fa fa-print\"></i> <?= $this->lang->line('invoice');?></button><button data-dismiss=\"modal\" class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-reply\"></i> <?= $this->lang->line('js_torna_indietro');?></button></div><div class=\"col-sm-12 col-lg-6  btn-group left\"><button data-dismiss=\"modal\" id=\"elimina\" data-num=\"" + data.ID + "\" data-tipo=\"" + data.Tipo + "\" class=\"btn btn-danger\" type=\"button\"><i class=\"fa fa-trash-o \"></i> <?= $this->lang->line('js_elimina');?></button>";

                    if ((data.Tipo == 1) && (data.status) == 1)
                        string = string + "<button id=\"inriparazione\" data-num=\"" + data.ID + "\" class=\"btn btn-info\" type=\"button\"><i class=\"fa fa-wrench \"></i> <?= $this->lang->line('js_converti_inr');?></button>";
                    if (data.status == 1) {
                        string = string + "<button id=\"modifica\" data-dismiss=\"modal\" href=\"#obj\" data-toggle=\"modal\" data-num=\"" + data.ID + "\" class=\"btn btn-success\"><i class=\"fa fa-pencil\"></i> <?= $this->lang->line('modifica');?></button><button type=\"button\" id=\"daconsegnare\" class=\"btn btn-primary\" data-num=\"" + data.ID + "\" data-tipo=\"" + data.Tipo + "\"><i class=\"fa fa-check\"></i> <?= $this->lang->line('daconsegnare');?></button>";
                    }
                    if (data.status == 2) {
                        string = string + "<button id=\"modifica\" data-dismiss=\"modal\" href=\"#obj\" data-toggle=\"modal\" data-num=\"" + data.ID + "\" class=\"btn btn-success\"><i class=\"fa fa-pencil\"></i> <?= $this->lang->line('modifica');?></button><button type=\"button\" id=\"completa\" class=\"btn btn-primary\" data-num=\"" + data.ID + "\" data-tipo=\"" + data.Tipo + "\"><i class=\"fa fa-check\"></i> <?= $this->lang->line('completato');?></button>";
                    }

                    if (data.status == 3) {
                        string = string + "<button id=\"modifica\" data-dismiss=\"modal\" href=\"#obj\" data-toggle=\"modal\" data-num=\"" + data.ID + "\" class=\"btn btn-success\"><i class=\"fa fa-pencil\"></i> <?= $this->lang->line('modifica');?></button><button type=\"button\" id=\"approva\" class=\"btn btn-primary\" data-num=\"" + data.ID + "\" data-tipo=\"" + data.Tipo + "\"><i class=\"fa fa-check\"></i> <?= $this->lang->line('approva');?></button>";
                    }

                    string = string + "</div>";
                    if (data.status == 1) {
                        jQuery('#statoc').html('<?= $this->lang->line('incorso');?>');
                        jQuery('#statoc').css('color','<?= $impostazioni[0]['colore1']; ?>');
                    } else if (data.status == 0) {
                        jQuery('#statoc').html('<?= $this->lang->line('completato');?>');
                        jQuery('#statoc').css('color', '<?= $impostazioni[0]['colore4']; ?>');
                    } else if (data.status == 3) {
                        jQuery('#statoc').html('<?= $this->lang->line('inattesa');?>');
                        jQuery('#statoc').css('color', '<?= $impostazioni[0]['colore3']; ?>');
                    }
                    else if (data.status == 2) {
                        jQuery('#statoc').html('<?= $this->lang->line('daconsegnare');?>');
                        jQuery('#statoc').css('color', '<?= $impostazioni[0]['colore2']; ?>');
                    }
                    else {
                        jQuery('#statoc').html('<?= $this->lang->line('nonriparato');?>');
                        jQuery('#statoc').css('color', '<?= $impostazioni[0]['colore5']; ?>');
                    }

                    jQuery('#footerOR').html(string);
                }
            }
        });
    }

    jQuery(document).on("click", "a.visualizza_or", function() {
        var numero = jQuery(this).data("num");
        find(numero);

    });

    jQuery(document).on("click", "#sendsmsfast", function() {
        var txt = jQuery('#fastsms').val();
        var numero = jQuery('#telefonoc').html();
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/send_sms",
            data: "testo=" + txt + "&numero=" + numero + "&token=<?=$_SESSION['token'];?>",
            cache: false,
            dataType: "json",
            success: function(data) {

                if(data.stato == true) toastr['success']("<?= $this->lang->line('Fastsms_t');?>", '<?= $this->lang->line('Fastsms_inviato');?>');
                else toastr['error']("<?= $this->lang->line('Fastsms_t');?>", '<?= $this->lang->line('Fastsms_noninviato');?>');
            }
        });
    });

    jQuery(document).on("click", "#modifica", function() {
        jQuery('#tit').html('<?= $this->lang->line('modifica');?>');
        clearTips(jQuery('.tips'));
        var num = jQuery(this).data("num");

        jQuery.ajax({
            type: "POST",
            url: base_url + "home/prendi_oggetto",
            data: "id=" + escape(num),
            cache: false,
            dataType: "json",
            success: function(data) {
                jQuery('#nominativo1 option[value="'+data.ID_Nominativo+'"]').attr("selected", "selected");
                jQuery("#nominativo1").select2();
                jQuery('.inp_cat').hide();
                jQuery('.select_cat').show();
                if ( jQuery('#categoria_s option[value="'+data.Categoria+'"]').length ) {

                    jQuery('#categoria_s option[value="'+data.Categoria+'"]').attr("selected", "selected")

                }
                else
                {
                    jQuery("#categoria_s").prepend("<option selected=\"selected\" value=\"" + data.Categoria + "\">" + data.Categoria + "</option>");
                }

                jQuery("#categoria_s").select2();
                jQuery('#categoria1').val(jQuery("#categoria_s").val());
                jQuery('#modello1').val(data.Modello);
                jQuery('#guasto1').val(data.Guasto);
                if (data.Tipo == 1) {
                    jQuery('#pezzo1').val(data.Pezzo);
                } else {
                    jQuery('#pezzo1').val('');
                }

                jQuery('#anticipo1').val(data.Anticipo);
                jQuery('#prezzo1').val(data.Prezzo);
                jQuery('#commenti1').val(data.Commenti);

                $(".modal-content .custom").val('');

                var IS_JSON = true;
                try
                {
                    var json = $.parseJSON(data.custom_field);
                }
                catch(err)
                {
                    IS_JSON = false;
                }                

                if(IS_JSON) 
                {

                    $.each(json, function(id_field, val_field) {
                        jQuery('#mo'+id_field).val(val_field);
                    });
                }


                if (data.sms == 1)
                    jQuery('#sms').prop('checked', true);
                else
                    jQuery('#sms').prop('checked', false);

                jQuery('#footerOR1').html("<div class=\"btn-group btn-group-justified left\"><select id=\"status_edit\" class=\"form-control m-bot15\"><option value=\"1\"><?= $this->lang->line('incorso');?></option><option value=\"3\"><?= $this->lang->line('inattesa');?></option><option value=\"2\"><?= $this->lang->line('daconsegnare');?></option><option value=\"0\"><?= $this->lang->line('completato');?></option><option value=\"5\"><?= $this->lang->line('nonriparato');?></option></select> <div class=\"iconic-input nolabel\"><i class=\"fa fa-eye\"></i><input id=\"codice\" type=\"text\" class=\"validate form-control\" value=\"" + data.codice + "\" placeholder=\"<?= $this->lang->line('codice');?>\"></div></div><div class=\"btn-group btn-group-justified right\"><button data-dismiss=\"modal\" class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-reply\"></i> <?= $this->lang->line('js_torna_indietro');?></button> <button id='submitOR' class='btn btn-success' data-tipo=" + data.Tipo + " data-modo='modifica' data-num=" + data.ID + "><i class=\"fa fa-save\"></i> <?= $this->lang->line('js_save');?></button></div>")
                jQuery('#status_edit option[value="'+data.status+'"]').attr("selected", "selected");
            }
        });
    });

    jQuery(document).on("click", "#inriparazione", function() {
        var num = jQuery(this).data("num");
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/inriparazione",
            data: "id=" + escape(num) + "&token=<?=$_SESSION['token'];?>",
            cache: false,
            dataType: "json",
            success: function(data) {
                toastr['success']("<?= $this->lang->line('js_ordine');?>", "<?= $this->lang->line('js_convertito');?>");
                find(num);
                $('#dynamic-table').DataTable().ajax.reload();
            }
        });
    });

    jQuery(document).on("click", "#approva", function() {
        var num = jQuery(this).data("num");
        var tipo = jQuery(this).data("tipo");
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/approva",
            data: "id=" + escape(num) + "&token=<?=$_SESSION['token'];?>",
            cache: false,
            dataType: "json",
            success: function(data) {
                if (tipo == 1) {
                    toastr['success']("<?= $this->lang->line('js_ordine');?>", "<?= $this->lang->line('js_or_approvato_c');?>");
                } else {
                    toastr['success']("<?= $this->lang->line('js_riparazione');?>", "<?= $this->lang->line('js_ri_approvata_c');?>");
                }
                $('#dynamic-table').DataTable().ajax.reload();
                find(num);
            }
        });
    });


    jQuery(document).on("click", "#completa", function() {
        var num = jQuery(this).data("num");
        var tipo = jQuery(this).data("tipo");
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/completa",
            data: "id=" + escape(num) + "&token=<?=$_SESSION['token'];?>",
            cache: false,
            dataType: "json",
            success: function(data) {
                if (tipo == 1) {
                    toastr['success']("<?= $this->lang->line('js_ordine');?>", "<?= $this->lang->line('js_or_completato_c');?>");
                } else {
                    toastr['success']("<?= $this->lang->line('js_riparazione');?>", "<?= $this->lang->line('js_ri_completata_c');?>");
                }
                $('#dynamic-table').DataTable().ajax.reload();
                find(num);
            }
        });
    });

    jQuery(document).on("click", "#daconsegnare", function() {
        var num = jQuery(this).data("num");
        var tipo = jQuery(this).data("tipo");
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/daconsegnare",
            data: "id=" + escape(num) + "&token=<?=$_SESSION['token'];?>",
            cache: false,
            dataType: "json",
            success: function(data) {
                if (tipo == 1) {
                    toastr['success']("<?= $this->lang->line('js_ordine');?>", "<?= $this->lang->line('js_ordine_segnato_consegnare');?>");
                } else {
                    toastr['success']("<?= $this->lang->line('js_riparazione');?>", "<?= $this->lang->line('js_riparazione_segnata_consegnare');?>");
                }
                $('#dynamic-table').DataTable().ajax.reload();
                find(num);

            }
        });
    });



    jQuery(document).on("click", "#stampa", function() {
        var num = jQuery(this).data("num");
        var tipo = jQuery(this).data("tipo");
        toastr['success']("<?= $this->lang->line('js_stampa_in_corso');?>");
        var thePopup = window.open( base_url + "home/invoice/" + escape(num) + "/" + tipo, '_blank', "width=890, height=700");
    });


    jQuery(document).on("click", "#elimina", function() {
        var num = jQuery(this).data("num");
        var tipo = jQuery(this).data("tipo");
        jQuery.ajax({
            type: "POST",
            url: base_url + "home/elimina",
            data: "id=" + escape(num) + "&token=<?=$_SESSION['token'];?>",
            cache: false,
            dataType: "json",
            success: function(data) {
                if (tipo == 1) {
                    toastr['success']("<?= $this->lang->line('js_ordine');?>", "<?= $this->lang->line('js_ordine_eliminato');?>");

                } else {
                    toastr['success']("<?= $this->lang->line('js_riparazione');?>", "<?= $this->lang->line('js_riparazione_eliminata');?>");
                }
                $('#dynamic-table').DataTable().ajax.reload();
            }
        });
    });

    jQuery("#categoria_s").on("select2:select", function (e) {
        var selezionata = jQuery("#categoria_s").val();
        if(selezionata === 'other') {
            jQuery('.select_cat').hide();
            jQuery('.inp_cat').show();
            jQuery('#categoria1').val('');
        }
        else
        {
            jQuery('#categoria1').val(selezionata);
        }
    });

    jQuery("#scrolldash").hover(
        function() {
            var div = document.getElementById('scrolldash'); // need real DOM Node, not jQuery wrapper
            var cursor = div.scrollWidth>div.clientWidth;
            if(cursor == true) {
                $("#scrolldash").addClass("dragged");
            }
            else
            {
                $("#scrolldash").removeClass("dragged");
            }
        }
    );


});


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}
