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
        var category = $('#myCategory').val();
        if (category) {
            var base_url = window.location.origin;
            $.ajax({
                url: base_url + "/@admin@/api/updateProject",
                data: {'project_id': project_id, 'category': category},
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

    $('#myCategory').on('keyup', function (e) {
        if (e.keyCode === 13) {
            $('#updateProject').click();
        }
    });


    setTimeout(function () {
        $('.sessionValue').fadeOut('fast');
    }, 1000);


    function updatePrice() {
        var price = $('#myEditPrice').val();
        var projectId = $('#myProject_id').val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/@admin@/api/updatePrice",
            data: {'project_id': projectId, 'price': price},
            cache: false,
            success: function (data) {
                if (data === 'Price should be numeric or Free') {
                    $('.updatedFailed').slideDown(function () {
                        setTimeout(function () {
                            $('.updatedFailed').slideUp();
                        }, 1000);
                    });
                } else {
                    $('#editPrice').text(data);
                    $('.updatedSuccessfully').slideDown(function () {
                        setTimeout(function () {
                            $('.updatedSuccessfully').slideUp();
                        }, 1000);
                    });
                }

            }
        });
    }


    $('#updatePrice').on('click', function () {
        updatePrice();
    });


    $('#myEditPrice').on('keyup', function (e) {
        if (e.keyCode === 13) {
            $('#updatePrice').click();
        }
    });

    function updateAbout() {
        var about = $('textarea#myEditAbout').val();
        var projectId = $('#myProject_id').val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/@admin@/api/updateAbout",
            data: {'project_id': projectId, 'about': about},
            cache: false,
            success: function (data) {
                $('.updatedSuccessfully').slideDown(function () {
                    setTimeout(function () {
                        $('.updatedSuccessfully').slideUp();
                    }, 1000);
                });
            }
        });
    }

    $('#updateAbout').on('click', function () {
        updateAbout();
    });

    function updateLanguage() {
        var language = $('#myEditLanguage').val();
        var projectId = $('#myProject_id').val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/@admin@/api/updateLanguage",
            data: {'project_id': projectId, 'language': language},
            cache: false,
            success: function (data) {
                $('#editLanguage').text(data);
                $('.updatedSuccessfully').slideDown(function () {
                    setTimeout(function () {
                        $('.updatedSuccessfully').slideUp();
                    }, 1000);
                });
            }
        });
    }

    $("#updateLanguage").on('click', function () {
        updateLanguage();
    });


    function updateType() {
        var publicOrPrivate = $('#publicOrPrivate').val();
        var type = $('#type').val();
        var projectId = $('#myProject_id').val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/@admin@/api/updateType",
            data: {'project_id': projectId, 'type': type, 'publicOrPrivate': publicOrPrivate},
            cache: false,
            success: function (data) {
                console.log(data);

                $('#editType').text(data);
                $('.updatedSuccessfully').slideDown(function () {
                    setTimeout(function () {
                        $('.updatedSuccessfully').slideUp();
                    }, 1000);
                });
            }
        });
    }


    $('#updateType').on('click', function () {
        updateType();
    });



});


