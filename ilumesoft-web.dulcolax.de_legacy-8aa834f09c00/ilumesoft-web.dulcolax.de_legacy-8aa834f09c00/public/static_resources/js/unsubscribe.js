// JavaScript Document
$(document).ready(function (e) {
    if ($('#CID').val() != '') {
        $('#btnSubmitUns').click(function (e) {
            e.preventDefault();
            $dataform = $('#swregForm').serialize();
            $.post('unsubscribe.html', $dataform, function (data, status, jqXHR) {
                if (data.statusCode == 0) {
                    $(".form").hide();
                    $(".formConfirm").show();
                } else {
                    alert('Houston we have a problem');
                }
            });
            ///////////////////
        });
    } else {
        alert('No CID');
		//window.location = '/';
    }
});