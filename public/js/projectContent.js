
$(function () {
    $('#editUpDown').on('click', function () {
        var project_id = $(this).parent().parent().find('input').val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/@admin@/api/editContentNo",
            data: {'project_id': project_id},
            cache: false,
            success: function (data) {
                // console.log(data);
                $('.order').toggleClass('hidden');
            }
        });
    });
    $('#updateProject').on('click', function () {
        updateProject();
    });

    function updateProject() {

        var project_id = $('#myProject_id').val();
        var project_name = $('#myContentTitleUpdate').val();
        if (project_name) {
            var base_url = window.location.origin;
            $.ajax({
                url: base_url + "/@admin@/api/updateProject",
                data: {'project_id': project_id, 'project_name': project_name},
                cache: false,
                success: function (data) {
                    $('#myProjectTitle').text(data);
                    $('.updatedSuccessfully').slideDown(function () {
                        setTimeout(function () {
                            $('.updatedSuccessfully').slideUp();
                        }, 1000);
                    });

                }
            });
        }

    }

    $('#myContentTitleUpdate').on('keyup', function (e) {
        if (e.keyCode === 13) {
            $('#updateProject').click();
        }
    });
    setTimeout(function () {
        $('.sessionValue').fadeOut('fast');
    },1000);
});
