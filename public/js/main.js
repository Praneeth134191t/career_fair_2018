
/*
* edit menu click action
* */

$('.edit').on('click', function(event)
{
    event.preventDefault();
    var firstName = $('#firstName').html();
    var lastName = $('#lastName').html();
    var phone = $('#phone').html();
    var degree = $('#degree').html();
    var linkedin = $('#linkedin').text();
    var objective = $('#objective').html();
    var techs = $('#techs').html();

    $('#firstName-modal').val(firstName);
    $('#lastName-modal').val(lastName);
    $('#phone-modal').val(phone);
    $('#degree-modal').val(degree);
    $('#linkedin-modal').val(linkedin);
    $('#objective-modal').val(objective);
    $('#techskills-modal').val(techs);

    $('#edit-modal').modal();

});

/*
* update profile details AJAX request
*
 */

$('#modal-save').on('click', function()
{
    $.ajax({
        method: 'POST',
        url : urlEdit,
        data : {firstName: $('#firstName-modal').val(),lastName: $('#lastName-modal').val(), phone: $('#phone-modal').val(), degree: $('#degree-modal').val(), linkedin : $('#linkedin-modal').val(),objective: $('#objective-modal').val(),techskills: $('#techskills-modal').val(),_token: token}
    }).done(function(msg){
        $('#firstName').text(msg['firstName']);
        $('#lastName').text(msg['lastName'])
        $('#phone').text(msg['phone'])
        $('#degree').text(msg['degree'])
        $('#linkedin').text(msg['linkedin'])
        $('#objective').text(msg['objective'])
        $('#techs').text(msg['techs'])
        $('#edit-modal').modal('hide');
    });
});