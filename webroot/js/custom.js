let perPage = 25;
let perLeft = 2;
let perRigth = 2;

function updateTabId(tab_id) {
    let url = new URL(location.href);
    url.searchParams.set('tab_id', tab_id);

    window.history.pushState('', 'New Page Title', url);
}

function submitCommentTicket(url) {
    var myEditor = document.querySelector('.ck-content');
    var el = new SimpleBar(document.getElementById('scrollbar_messages'));
    if(myEditor.innerHTML != '')
        $('#submit_comment_ticket').prop('disabled', true);

    $('#comment').val(myEditor.innerHTML);

    var formData = new FormData(document.getElementById('comment_ticket_form'));

    console.log(formData);

    $.ajax({
        url: url,
        method: "post",
        type: 'JSON',
        data: formData,
        processData: false,
        contentType: false,
        success: function (html) {
            // var data = JSON.parse(html.toString());
            // if (data.status == 1) {
            $('#submit_comment_ticket').prop('disabled', false);
            $('#comment_ticket_input').val('')
            $('#comment_ticket_attachment').val('')
            $('#comment_ticket_content').append(html);
            $('#comment_ticket_input').html = "";

            editor.setData("");


            el.getScrollElement().scrollTop = 100

            Toastify({
                    text: "Comentário cadastrado com sucesso!",
                    duration: in_teste ? 30000 : 10000,
                    className: "bg-success",
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                }
            ).showToast();

        },error: function(jq,status,message) {
            Toastify({
                    text: message,
                    duration: in_teste ? 30000 : 10000,
                    className: "bg-danger",
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                }
            ).showToast();
        }

    });

}

function updateUnitTabId(unit_id) {
    let url = new URL(location.href);
    url.searchParams.set('unit_id', unit_id);

    window.history.pushState('', '', url);

    $.ajax({
        url: "<?= $this->Url->build('/sessions/unit_update/')?>" + unit_id,
        type: "GET",
        success: function (html) {
        }
    });
}

function clickMenu(menuUrl) {
    let url = new URL(location.href);
    var buttonUrl = new URL(menuUrl);
    buttonUrl.searchParams.set('unit_id', url.searchParams.get('unit_id'));
    window.location = buttonUrl;

    return false;
}
//
// function copyToClickBoard(text){
//
//     navigator.clipboard.writeText(text)
//         .then(() => {
//             showToast('Copiado para área de transferência', 'success');
//         })
//         .catch(err => {
//             showToast('Não foi possível copiar link para área de transferência', 'danger');
//         })
//
// }

const unsecuredCopyToClipboard = (text) => { const textArea = document.createElement("textarea"); textArea.value=text; document.body.appendChild(textArea); textArea.focus();textArea.select(); try{document.execCommand('copy')}catch(err){console.error('Unable to copy to clipboard',err)}document.body.removeChild(textArea)};

/**
 * Copies the text passed as param to the system clipboard
 * Check if using HTTPS and navigator.clipboard is available
 * Then uses standard clipboard API, otherwise uses fallback
 */
const copyToClickBoard = (content) => {
    if (window.isSecureContext && navigator.clipboard) {
        navigator.clipboard.writeText(content);
        showToast('Copiado para área de transferência', 'success');
    } else {
        unsecuredCopyToClipboard(content);
        showToast('Copiado para área de transferência', 'success');
    }
};

function getChartColorsArray(t) {
    if (null !== document.getElementById(t)) {
        var t = document.getElementById(t).getAttribute("data-colors");
        return (t = JSON.parse(t)).map(function (t) {
            var e = t.replace(" ", "");
            if (-1 === e.indexOf(",")) {
                var a = getComputedStyle(document.documentElement).getPropertyValue(e);
                return a || e;
            }
            t = t.split(",");
            return 2 != t.length ? e : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(t[0]) + "," + t[1] + ")";
        });
    }
}

function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}

function getFormatedDate(date, format = 1){

    if(format == 1)
        return  pad(date.getFullYear(), 2) +'-'+pad((date.getMonth()+1), 2) +'-'+ pad(date.getDate(), 2) + 'T' + pad(date.getHours(), 2) +':'+ pad(date.getMinutes(), 2) +':'+ pad(date.getSeconds(), 2);
    else{
        return  pad(date.getFullYear(), 2) +'-'+pad((date.getMonth()+1), 2) +'-'+ pad(date.getDate(), 2) + ' ' + pad(date.getHours(), 2) +':'+ pad(date.getMinutes(), 2) +':'+ pad(date.getSeconds(), 2);
    }
}

function limparForm() {
    $('.form-control').val('').val(null).trigger('change');
}

function searchActions(url, div = '#action-table', postdata = null, tableName = '.pge-data-table', redirect = null, view='default', updateUrl = false) {

    if(!postdata) {
        postdata = $("#actions-search-form").serialize();
    }else{

    }

    if(view == 'default') {
        $(div).text("Carregando...");
    }

    var url_get = '';

    url_get = url + '&' + postdata;

    if (redirect)
        url_get = url_get + '&redirect=' + encodeURIComponent(redirect);


    if(updateUrl) {
        let updateUrl = new URL(location.href);
        updateUrl.searchParams.set('q_url', encodeURIComponent(postdata));
        window.history.pushState('', '', updateUrl);
    }

    // alert(url);
    // alert(postdata);
    // alert(url_get);

    $.ajax({
        url: url_get,
        type: 'GET',
        success: function (html) {
            if(view == 'default') {
                $(div).html(html);
            }
        }
    });

}

function closeModelModal() {
    $('#modelFormModal').modal('toggle');
}

function openScheduleView (id) {

    $('#schedule-view-content-modal').text("Carregando...");

    $.ajax({
        url: "<?= $this->Url->build('/schedules/view')?>/" + id + '/modal',
        type: "GET",
        success: function (html) {
            $('#schedule-view-content-modal').html(html);
        }
    });

}

function initChoices() {
    if(!in_teste) {
        document.querySelectorAll("[data-choices]").forEach(function (e) {
            var t = {},
                a = e.attributes;
            a["data-choices-groups"] && (t.placeholderValue = "This is a placeholder set in the config"),
            a["data-choices-search-false"] && (t.searchEnabled = !1),
            a["data-choices-search-true"] && (t.searchEnabled = !0),
            a["data-choices-removeItem"] && (t.removeItemButton = !0),
            a["data-choices-sorting-false"] && (t.shouldSort = !1),
            a["data-choices-sorting-true"] && (t.shouldSort = !0),
                a["data-choices-multiple-default"],
                a["data-choices-multiple-groups"],
            a["data-choices-multiple-remove"] && (t.removeItemButton = !0),
            a["data-choices-limit"] && (t.maxItemCount = a["data-choices-limit"].value.toString()),
            a["data-choices-limit"] && (t.maxItemCount = a["data-choices-limit"].value.toString()),
            a["data-choices-editItem-true"] && (t.maxItemCount = !0),
            a["data-choices-editItem-false"] && (t.maxItemCount = !1),
            a["data-choices-text-unique-true"] && (t.duplicateItemsAllowed = !1),
            a["data-choices-text-disabled-true"] && (t.addItems = !1),
                a["data-choices-text-disabled-true"] ? new Choices(e, t).disable() : new Choices(e, t);
        });
    }
}

function initSelectAjax(select_id, url, parent) {
    $("#"+select_id).select2({
        minimumInputLength: 2,
        dropdownParent: (parent ? $(parent): false),
        "language": {
            "noResults": function(){
                return "Nenhum resultado encontrado";
            },
            inputTooShort: function() {
                return "Digite 2 ou mais caracteres";
            }
        },
        ajax: {
            url: url,
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (q) {
                return {
                    q: q
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
        }
    });
}

function initPhoneMask() {
    var cleaveBlocks = new Cleave('.phone-mask', {
        delimiters: ['(', ')', '-'],
        blocks: [0, 2, 5, 4]
    });
}

function initSelect2(select='.select_pge', parent='.modal_class') {
    $(select).select2({
        dropdownParent: (parent ? $(parent): false),
        "language": {
            "noResults": function(){
                return "Nenhum resultado encontrado";
            }
        }
    });
}



function modalSubmitGlobal(modal_form, modal_button_id){
    $('#'+modal_form).submit();
    $('#'+modal_button_id).text("Carregando...");
    $('#'+modal_button_id).prop('disabled', true);
}

function onShowModalGlobal(modal_id, modal_label_id, modal_label_edit, modal_label_add, modal_content, modal_form, modal_button_id, model_id, edit_url, edit_query,add_url, loading_content) {
    var method;
    document.getElementById(modal_id).addEventListener("show.bs.modal", function (e) {
        $('#' + modal_content).html(loading_content);


        (model_id = e.relatedTarget.getAttribute('model-id'));

        var inner_url = edit_url + model_id + '/modal';

        if (e.relatedTarget.classList.contains("refresh-item-btn")) {
            inner_url+='/default/true';
        }

        inner_url+= edit_query;

        e.relatedTarget.classList.contains("edit-item-btn")
            ? ((document.getElementById(modal_label_id).innerHTML = modal_label_edit),
                    ($.ajax({
                        url: inner_url,
                        type: "GET",
                        success: function (html) {
                            insertHTML(html, modal_id, modal_content);
                        }
                    })),
                    (method = 'edit')
            )
            : e.relatedTarget.classList.contains("add-item-btn")
            ? (
                (document.getElementById(modal_label_id).innerHTML = modal_label_add
                ),
                    ($.ajax({
                        url: add_url,
                        type: "GET",
                        success: function (html) {
                            insertHTML(html, modal_id, modal_content);
                        }
                    })),
                    (method = 'add')
            )
            : ((document.getElementById(modal_label_id).innerHTML = "Carregando"),
                    (document.getElementById(modal_id).querySelector(".modal-footer").style.display = "none")
            );
        if (method == 'add') {
            $('#modal_button_id').text("Adicionar");
        } else {
            $('#modal_button_id').text("Salvar");
        }

        if (e.relatedTarget.classList.contains("refresh-item-btn")) {
            $('#modal_button_id').text("Atualizar");
            document.getElementById(modal_label_id).innerHTML = 'Enviar nova versão';
        }

        $('#modal_button_id').prop('disabled', false);
    });

    return method;
}

function insertHTML(html, modal_id, modal_content){
    try{
        var dados = JSON.parse(html);
        if(dados.status === 0) {
            setTimeout(function () {
                $('#' + modal_id).modal('hide');
            }, 1000);
            toastAJAX(dados);
            return false;
        }
    }catch (objError) {
        if (objError instanceof SyntaxError) {
            $('#' + modal_content).html(html);
        }
    }
}

function toastAJAX(data) {
    var msgType;

    if (data.status === 1) {
        msgType = 'bg-success';
    }else{
        msgType = 'bg-danger';
    }

    showToast(data.message, msgType);
}

function showToast(msg,type){
    Toastify({
            text: msg,
            duration: in_teste ? 30000 : 10000,
            className: 'bg-' + type,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }
    ).showToast();
}

function toggleSaveButton(buttonId, action) {
    var saveButton = $('#' + buttonId);
    var isLoading = saveButton.prop('disabled');


    if(action == 'edit') {
        if (!isLoading) {
            // Disable the save button and show loading indicator
            saveButton.prop('disabled', true);
            saveButton.html('Salvando...');
        } else {
            // Enable the save button and hide loading indicator
            saveButton.prop('disabled', false);
            saveButton.html('Salvar');
        }
    }else if(action == 'add'){
        if (!isLoading) {
            // Disable the save button and show loading indicator
            saveButton.prop('disabled', true);
            saveButton.html('Adicionando...');
        } else {
            // Enable the save button and hide loading indicator
            saveButton.prop('disabled', false);
            saveButton.html('Adicionar');
        }
    }
}

function toggleAddButton(buttonId) {
    var saveButton = $('#' + buttonId);
    var isLoading = saveButton.prop('disabled');

    if (!isLoading) {
        // Disable the save button and show loading indicator
        saveButton.prop('disabled', true);
        saveButton.html('Adicionando...');
    } else {
        // Enable the save button and hide loading indicator
        saveButton.prop('disabled', false);
        saveButton.html('Adicionar');
    }

}

// Função para armazenar as configurações antes de editar ou excluir
function storeTableSettings(table_id) {
    // Obtenha a página atual e outros parâmetros que deseja armazenar
    var currentPage = $(table_id).DataTable().page();
    var searchValue = $(table_id).DataTable().search();

    // Armazene os valores na sessão local
    sessionStorage.setItem(table_id.substring(1)+'_currentPage', currentPage);
    sessionStorage.setItem(table_id.substring(1)+'_searchValue', searchValue);
}

var buttonsArray = [
    {
        extend: 'csv',
        exportOptions: {
            columns: "thead th:not(.noExport)"
        }
    }, {
        extend: 'excel',
        exportOptions: {
            columns: "thead th:not(.noExport)"
        }
    }, {
        extend: 'print',
        text: 'Imprimir',
        exportOptions: {
            columns: "thead th:not(.noExport)"
        }
    }];

var language = {
    "lengthMenu": "Mostrar &nbsp; _MENU_ &nbsp; por página",
        "zeroRecords": "Sem resultados encontrados",
        "loadingRecords": "Carregando...",
        "info": "Mostrando _START_ até _END_ de _TOTAL_",
        "infoEmpty": "Nenhum registro encontraro.",
        "infoFiltered": "(filtrando de um total de _MAX_ registros)",
        "search": "Buscar: ",
        "thousands": ".",
        "paginate": {
        "first":      "Início",
            "last":       "Fim",
            "next":       "Próximo",
            "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
    }

};

function initTables(buttons = false, tableElement = '.pge-data-table') {
    buttonsArray = [];
    if(buttons)
        buttonsArray = [
            {
                extend: 'csv',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'excel',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }];
    var table = $(tableElement).DataTable({
        stateSave: true,
        "pageLength": 50,
        dom: 'Bfrtip',
        buttons: buttonsArray,
        "language": {
            "lengthMenu": "Mostrar &nbsp; _MENU_ &nbsp; por página",
            "zeroRecords": "Sem resultados encontrados",
            "info": "Mostrando _START_ até _END_ de _TOTAL_",
            "infoEmpty": "Nenhum registro encontraro.",
            "infoFiltered": "(filtrando de um total de _MAX_ registros)",
            "search": "Buscar: ",
            "thousands": ".",
            "paginate": {
                "first":      "Início",
                "last":       "Fim",
                "next":       "Próximo",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }

        }
    });

}


// function setCookie(cname, cvalue) {
//     const d = new Date();
//     d.setTime(d.getTime() + (7*24*60*60*1000));
//     let expires = "expires="+ d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
//
// }

function setCookie(cName, cValue) {
    let date = new Date();
    date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
