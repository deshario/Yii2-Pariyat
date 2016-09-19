$(function () {
    $('#ModalButton').click(function () {
        $('#modal_create').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});