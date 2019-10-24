submitResetPassword = () => {
    let isCodeValid = false;
    let el = $('#error-display');
    let aOfDatas = [
        {type : 'email', val : $('#formateur_mail_forgot').val().toLowerCase()},
    ];
    let isValid = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$', 'i');
    isCodeValid = isValid.test(aOfDatas[0].val);

    if(!isCodeValid) {
        $('#formateur_mail_forgot').css('border', '2px solid red');
        $('.modal-info').text('*L\'email n\'est pas valide').css('color', 'red');
    } else {
        console.log('launch ajax')
        ajaxForReinitializeMail();
    }
};

/**
 * CHECK VALIDITY of the code provided by user
 *   Return boolean
 */
const isCodeFormValid = () => {
    let isCodeValid = false;
    let el = $('#error-display');
    let aOfDatas = [
        {type : 'email', val : $('#formateur-email').val().toLowerCase()},
        {type : 'password', val : $('#formateur-password').val().toLowerCase()}
    ];


    aOfDatas.map(data => {
        switch(data.type) {
            case "email":
                let isValid = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$', 'i');
                isCodeValid = isValid.test(data.val);

                break;
            case "password":
                (data.val !== "") ? isCodeValid = true : isCodeValid = false;
                break;
            default:
                break
        }
    });

    if(!isCodeValid) {
        el.parent().parent().find('.c-tooltip')
            .addClass('invalid-tootip')
            .html("Vos identifiants sont incorrects.")

        setTimeout(()=> {
            el.siblings('.c-tooltip')
                .removeClass('invalid-tootip')
                .html("")
        }, 2000)
    }
    return isCodeValid

};


function resetInput() {
    $('#formateur_mail_forgot').val('');
    $('.modal-info').text('').css('color', 'red');
}

function displayPop() {
    let element = $( "#index-info-pop" );
    element.attr("class","w3-container w3-center w3-animate-left" ).show();
    console.log('adding class for animate');
}