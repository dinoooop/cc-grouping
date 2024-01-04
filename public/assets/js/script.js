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
                'Authorization': 'Bearer eyJpdiI6IjZuc2hsOHQzb0ZCZ1cxaTBxcnEwcHc9PSIsInZhbHVlIjoiQzNkTmVHU3pNY2VEWFJxZXBCbVVkWUZvcWYvaFR4TG9ucFAvaGVuUys3OEN5VkM0NHVxdStwdlpZNHgzaGJZMTczY3hJNVhvQ21TYXRrK2VhWnpYOHdwRTN3Vy95ZkdUQTdSVktZU0FHQ3Ria1NiUjA1Q1Vla0dmdGRLdk9yQUwiLCJtYWMiOiJmZWY2OGVmZTJhMjI4YmM3MDgzZTM3OTQ4ZDhhYTM1OWRkZTUzMGRjMDhjYTU5YTcwNWIzZTAzZWRjODNkN2Q2IiwidGFnIjoiIn0='
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