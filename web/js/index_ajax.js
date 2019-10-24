//encodeURI pour echapper les charactère spéciaux
//envoyer les datas pour voir si user exist

/**
 *
 * Ajax to send email to an user
 *
 */
function ajaxForReinitializeMail() {
    var datas = {
        bJSON: 1,
        page: 'index_ajax',
        mode: 'initialize_mail',
        email_user_forgot: $('#formateur_mail_forgot').val()
    }
    $.ajax({
        type: "POST",
        url: "route.php",
        async: true,
        data: datas,
        dataType: "json",
        cache: false,

    })
        .done((result) => {
            if(result[0]["error"] === 0){
                displayPop();
            } else if(result[0]["error"] === 1){
                $('.modal-info').text(result[0]["message"]);g(result[0]["message"]);
            }
        })
        .fail((err) => {
            alert('error : ' + err.status);
        });
}