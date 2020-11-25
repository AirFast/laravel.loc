require('./bootstrap');

// Custom js
var activeTab = $('.nav-tabs.card-header-tabs .nav-link.active'),
    navTabs = $('.nav-tabs.card-header-tabs');

var scrollPosition = activeTab.offset().left + activeTab.outerWidth()/2 - navTabs.width()/4;
navTabs.animate({ scrollLeft: scrollPosition });

$('#create-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);

    let time = button.data('time');
    let userId1 = button.data('user-id-1');
    let userId2 = button.data('user-id-2');

    modal.find('#create-modal-time').text(time + ':00');
    modal.find('#store-time').val(time);
    modal.find('#store-user-id-1').val(userId1);
    modal.find('#store-user-id-2').val(userId2);
})

$('#update-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);
    const form = modal.find('#edit-form');

    let updateUrl = button.data('update-url');
    let crtDltSign = button.data('crt-dlt-sign');
    let time = button.data('time');
    let userId1 = button.data('user-id-1');
    let userId2 = button.data('user-id-2');

    form.attr('action', updateUrl);
    modal.find('#crt-dlt-sign').text(crtDltSign);
    modal.find('#update-modal-time').text(time + ':00');
    modal.find('#edit-user-id-1').val(userId1);
    modal.find('#edit-user-id-2').val(userId2);
})

$('#delete-modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const modal = $(this);
    const form = modal.find('#delete-form');

    let deleteUrl = button.data('delete-url');
    let userName = button.data('user');

    form.attr('action', deleteUrl);
    modal.find('#user-name').text(userName);
})
