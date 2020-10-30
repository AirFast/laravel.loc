require('./bootstrap');

// Custom js
$('#confirmation-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);

    let time = button.data('time');
    let userId1 = button.data('user-id-1');
    let userId2 = button.data('user-id-2');

    modal.find('#confirmation-modal-time').text(time + ':00');
    modal.find('#store-time').val(time);
    modal.find('#store-user-id-1').val(userId1);
    modal.find('#store-user-id-2').val(userId2);
})
