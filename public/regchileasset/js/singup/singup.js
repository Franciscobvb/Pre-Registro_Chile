var emailDuplicado = false;
var emailNotMatchbol = false;
var dataRegist;

var URLactual = window.location;

$('#btnProfile').on('click', function(){
    var data = $('#formProfile').serialize();
    document.getElementById("btnProfile").disabled = true;

    var brithdate = $('#birthDate').val();
    var birthYear = brithdate.split('-');
    var today = new Date();
    var currentYear = today.getFullYear();

    var associated = $('#superSearch').val()
    $('#sponsorLabel').text(associated);
    $('#sponsorCode').text(associated);
    associated = associated.split(' - ');
    if(associated.length >= 2){
        var email = $('#email').val();
        if(email != ''){
            var confEmail = $('#confEmail').val();
            if(confEmail != email){
                emailNotMatch();
            }
            else{
                if((parseInt(currentYear) - parseInt(birthYear)) < 18){
                    swal({
                        title: 'Error',
                        text: alertHeigtAge,
                        type: 'error',
                        padding: '2em'
                    })
                }
                else if(parseInt(birthYear) < 1930){
                    swal({
                        title: 'Error',
                        text: alertAgeInvalid,
                        type: 'error',
                        padding: '2em'
                    })
                }
                else{
                    if($('#name').val() == '' || $('#birthDate').val() == '' || $('#firstName').val() == '' || $('#secondName').val() == '' || $('#celPhone').val() == '' || $('#email').val() == '' || $('#confEmail').val() == '' || $('#sponsorId').val() == '' ){
                        swal({
                            title: 'Error',
                            text: rquired,
                            type: 'error',
                            padding: '2em'
                        });
                    }
                    else {
                        var mail = $('#email').val();
                        var dataMail = {email: mail}
                        $.ajax({
                            type: 'GET',
                            url: URLactual + '/validateEmail',
                            data: dataMail,
                            success: function(Response) {
                                if(Response != ''){
                                    alertMailDup();
                                    document.getElementById("btnProfile").disabled = false;
                                }
                                else{
                                    $.ajax({
                                        type: 'GET',
                                        url: URLactual + '/submitregistro',
                                        data: data,
                                        success: function(Response) {
                                            if(Response != ''){
                                                dataRegist = Response;
                                                SwAlert(alertRegistrationOk);
                                                $('#formConfirmation').css('display', 'block');
                                                $('#confirmationAltert').css('display', 'block');
                                                $('#formProfile').css('display', 'none');
                                                $('#profileAltert').css('display', 'none');
                                                $('#permissions').css('display', 'none');
                                                var advisorcode = Response[0].AssociateId;
                                                var advisonName = Response[0].ApLastName + ', ' + Response[0].ApFirstName;
                                                $('#newadvisorCode').text(advisorcode);
                                                $('#newadvisorName').text(advisonName);
                                                $("#formProfile").trigger("reset");
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }
                }
            }
        }
    }
    else{
        alertErroSponsorId();
    }
})

function SwAlert(message){
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        padding: '2em'
    });
    toast({
        type: 'success',
        title: message,
        padding: '2em',
    })
}

function showProfile(){
    $('#formProfile').show();
    $('#profileAltert').show();
    $('#formConfirmation').hide();
    $('#confirmationAltert').hide();
}

$('#superSearch').on('change', function(){
    var associated = $('#superSearch').val()
    $('#sponsorLabel').text(associated);
    $('#sponsorCode').text(associated);
    associated = associated.split(' - ');
    if(associated.length >= 2){
        $('#sponsorId').val(associated[0]);
    }
    else{
        alertErroSponsorId();
    }
});

$('#celPhone').on('change', function(){
    var phone = $('#celPhone').val()
    $('#newadvisorPhone').text(phone);
});

$('#phone').on('change', function(){
    var phone2 = $('#phone').val()
    $('#newadvisorPhone2').text(phone2);
});

$('#email').on('change', function(){
    var email = $('#email').val()
    $('#newadvisorEmail').text(email);
});

function validateMailEqual(){
    var email = $('#email').val();
    if(email != ''){
        var confEmail = $('#confEmail').val();
        if(confEmail != email){
            emailNotMatch();
        }
    }
}

$("#chk2").on( 'click', function() {
    if($("#chk2").is(':checked')){
        document.getElementById("btnProfile").disabled = false;
    }
    else{
        $('#btnProfile').disabled;
        document.getElementById("btnProfile").disabled = true;
    }
});

$(function(){
    $('#celPhone').keypress(function(e) {
        if(isNaN(this.value + String.fromCharCode(e.charCode))) 
        return false;
    })
    .on("cut copy paste",function(e){
        e.preventDefault();
    });
    $('#phone').keypress(function(e) {
        if(isNaN(this.value + String.fromCharCode(e.charCode))) 
        return false;
    })
    .on("cut copy paste",function(e){
        e.preventDefault();
    });

    var associated = $('#superSearch').val()
    $('#sponsorLabel').text(associated);
    $('#sponsorCode').text(associated);
    associated = associated.split(' - ');
    $('#sponsorId').val(associated[0]);

    var phone = $('#celPhone').val()
    $('#newadvisorPhone').text(phone);

    var phone2 = $('#phone').val()
    $('#newadvisorPhone2').text(phone2);
    
    var email = $('#email').val()
    $('#newadvisorEmail').text(email);

    loadSponsors();
});

function validateMail(){
    var mail = $('#email').val();
    var data = {email: mail}
    $.ajax({
        type: 'GET',
        url: URLactual + '/validateEmail',
        data: data,
        success: function(Response) {
            if(Response != ''){
                alertMailDup();
                emailDuplicado = true;
            }
            else{
                emailDuplicado = false;
            }
        }
    });
}

function login(){ 
    var userName = $('#userName').val();
    var userPass = $('#userPass').val();
    var _token = $('#_token').val();
    var data = {userName: userName, userPass: userPass, _token: _token}
    $.ajax({
        type: 'GET',
        url: URLactual + '/loginprocess',
        data: data,
        success: function(Response) {
            if(Response != ''){
                document.write('<form id="genealogyForm" method="post" action="' + URLactual + '/genealogy"><input name="associateid" type="hidden" value="' + Response[0].Associateid + '" /><input name="_token" type="hidden" value="' + _token + '" /></form>');
                f=document.getElementById('genealogyForm');
                if(f){
                    f.submit();
                }
            }
            else{
                loginErrorAlert();
            }
        }
    });
}


var down = 0;
var up = 0;

function seeDown(){
    if(down == 0){
        $('.down').css('display', 'none');
        down = 1;
    }
    else{
        $('.down').css('display', 'block');
        down = 0;
    }
}

function seeUp(){
    switch(up){
        case 0:
            $('.up').css('display', 'none');
            up = 1;
            break;
        case 1:
            $('.up').css('display', 'block');
            up = 0;
            break;
    }
}

function getPdf(){
    window.open(URLactual + "/pdf?associateid=" + dataRegist[0].AssociateId + "&sponsorid=" + dataRegist[0].SponsorId , "ventana1" , "width=500,height=300,scrollbars=NO")
}

function finalizar(){
    
}

function loadSponsors(){
    var valor = $('#superSearch').val();
    var data = {datoabuscar: valor}
    $.ajax({
        type: 'GET',
        url: URLactual + '/sponsors',
        data: data,
        success: function(Response) {
            var availableTags = [];
            var length = Response.length
            for (var i = 0; i < length; i++) {
                var currentSponsor = Response[i].associateid + " - " + Response[i].associateName;
                availableTags.push ( currentSponsor,);
            }
            $( "#superSearch" ).autocomplete({
                source: availableTags
            });
        }
    });
}
