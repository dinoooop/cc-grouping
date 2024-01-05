$(document).ready(function () {

    $('.trash').click(function () {
        var modelEndPoint = $(this).data('model-end-point');
        var modelId = $(this).data('model-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve CSRF token from a meta tag

        $(this).closest('tr').remove();

        $.ajax({
            url: '/admin/' + modelEndPoint + '/' + modelId,
            type: 'DELETE',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) { },
            error: function (xhr, status, error) { }
        });

    });

    $('.select-item').click(function () {
        $(this).toggleClass("checked");
    });

    $('.api-test').click(function () {
        $.ajax({
            url: '/api/groups',
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + TOKEN
            },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });


});