let names = [];
let $ = jQuery;

function resp(photos_count) {
    let current_length = names.length;
    //console.log('curr'+current_length);
    let $ = jQuery;
    let item = names[current_length - 1];
    let launch_invalidation = false;
    
    if (current_length == 1) {
        launch_invalidation = true;
    }
    if (names.length > 0) {
        let data = {
            'item': item,
            'launch_invalidation': launch_invalidation,
            action: 'load_files_smwas3c'
        };
        $.post(ajaxurl, data, function(response) {
                if (response['status']) {
                    item = item.split('/');
                    item.pop();
                    let dir = item.join('/');
                    let progress = 100 - Math.floor((current_length - 1) / photos_count * 100);
                    $('#legend_to_loader').html('Uploading files from: ' + dir);
                    $('#loader_outer').fadeIn('fast');
                    $('#photo_names_loading_s3').fadeIn('fast');
                    $('#photo_names_loading_s3').val($('#photo_names_loading_s3').val() + '\r\n' + response['current']);
                    $('#loader_inner').animate({
                        width: progress + '%'
                    });
                    names.pop();
                    resp(photos_count);
                    if (!($('[name="cloudfront"]:checked').val() == 0)) {
                        if (response['is_invalidation_id']) {
                            $('#invalidation_id_smwas3c').html(`<b>Invalidation requested with Invalidation ID: ${response['invalidation_id']} </b>`);
                            $('#message_no_keys_s3').fadeIn('fast');

                        }
                    }
                } else {
                    $('#message_no_keys_s3').html(`<b>Error message: ${response['errors']['message']}</b>`);
                    $('#message_no_keys_s3').fadeIn('fast');
                    return;
                }
            },
            'json')
    }
}
$(document).on('ready', function() {
    let $ = jQuery;
    if ($('[name="cloudfront"]:checked').val() == 0) {
        $('#cloudfront_hide').fadeOut('fast');
    } else {
        $('#cloudfront_hide').fadeIn('fast');
    }
})

$('#submit_for_s3_general').on('click', function(e) {
    let $ = jQuery;
    $('#message_no_keys_s3').fadeOut('fast');
    $("#waiting_loader_inner_s3").fadeIn();
    e.preventDefault();
    let data = {
        action: 'choose_files_smwas3c'
    };
    $.post(ajaxurl, data, function(response) {
                $("#waiting_loader_inner_s3").fadeOut();
                if (!response['status']) {
                    $('#message_no_keys_s3').html(`<b>Error message: ${response['errors']['message']}</b>`);
                    $('#message_no_keys_s3').fadeIn('fast');
                    return;
                }
                if (response['status']) {
                    let photos_count = response['count'];
                    names = response['names'];
                    resp(photos_count);
                }
            },
            'json')
        .fail(function(xhr, textStatus) {
            if (xhr.status == 500) {
                $("#waiting_loader_inner_s3").fadeOut();
                $('#message_no_keys_s3').html(`Error message: Aws classes are in use somewhere else`);
                $('#message_no_keys_s3').css('color', 'red');
                $('#message_no_keys_s3').fadeIn('fast');
            };
        })
})

$('#submit_for_s3_diff').on('click', function(e) {
    let $ = jQuery;
    $('#message_no_keys_s3').fadeOut('fast');
    $("#waiting_loader_inner_s3").fadeIn();
    e.preventDefault();
    let data = {
        action: 'get_diff_files_smwas3c'
    };
    $.post(ajaxurl, data, function(response) {

                $("#waiting_loader_inner_s3").fadeOut();
                if (!response['status']) {
                    $('#message_no_keys_s3').html(`<b>Error message: ${response['errors']['message']}</b>`);
                    $('#message_no_keys_s3').fadeIn('fast');
                    return;
                }
                if (response['status']) {
                    let photos_count = response['count'];
                    names = response['names'];
                    resp(photos_count);
                }
            },
            'json')
        .fail(function(xhr, textStatus) {
            if (xhr.status == 500) {
                $("#waiting_loader_inner_s3").fadeOut();
                $('#message_no_keys_s3').html(`Error message: Aws classes are in use somewhere else`);
                $('#message_no_keys_s3').css('color', 'red');
                $('#message_no_keys_s3').fadeIn('fast');
            };
        })
})

$('#submit_for_s3_delete').on('click', function(e) {
    let $ = jQuery;
    $('#message_no_keys_s3').fadeOut('fast');
    $("#waiting_loader_inner_s3").fadeIn();
    e.preventDefault();
    let data = {
        action: 'clear_bucket_smwas3c'
    };
    $.post(ajaxurl, data, function(response) {

                $("#waiting_loader_inner_s3").fadeOut();
                if (!response['status']) {
                    $('#message_no_keys_s3').html(`<b>Error message: ${response['errors']['message']}</b>`);
                    $('#message_no_keys_s3').fadeIn('fast');
                    return;
                }
                if (response['status']) {
                    $('#message_no_keys_s3').html(`<b>Message: ${response['message']}</b>`);
                    $('#message_no_keys_s3').fadeIn('fast');
                }
            },
            'json')
        .fail(function(xhr, textStatus) {
            if (xhr.status == 500) {
                $("#waiting_loader_inner_s3").fadeOut();
                $('#message_no_keys_s3').html(`Error message: Aws classes are in use somewhere else`);
                $('#message_no_keys_s3').css('color', 'red');
                $('#message_no_keys_s3').fadeIn('fast');
            };
        })
})

$('#check_keys_for_s3_bucket').on('click', function() {
    let $ = jQuery;
    let cloudfront_id;
    let cloudfront;
    $("#waiting_loader_inner_s3").fadeIn();
    $('#message_bucket_keys_s3').fadeOut('fast');
    let bucket_and_keys = {
        '[name="bucketname"]': 'Bucket name',
        '[name="access_key"]': 'Access key',
        '[name="secret_key"]': 'Secret key'
    };
    for (let empty in bucket_and_keys) {
        if (!$(empty).val().trim()) {
            $("#waiting_loader_inner_s3").fadeOut();
            $('#message_bucket_keys_s3').css('color', 'red');
            $('#message_bucket_keys_s3').html(`Error message: Field "${bucket_and_keys[empty]}" can\'t be empty`);
            $('#message_bucket_keys_s3').fadeIn('fast');
            return;
        }
    }
    if ($('[name="cloudfront"]:checked').val() == 1) {
        if (!$('[name="cloudfront_id"]').val().trim()) {
            $("#waiting_loader_inner_s3").fadeOut();
            $('#message_bucket_keys_s3').css('color', 'red');
            $('#message_bucket_keys_s3').html('Error message: Field "Cloudfront_id" can\'t be empty');
            $('#message_bucket_keys_s3').fadeIn('fast');
            return;
        } else {
            cloudfront_id = $('[name="cloudfront_id"]').val();
            cloudfront = $('[name="cloudfront"]:checked').val();
        }
    } else {
        cloudfront = $('[name="cloudfront"]:checked').val();
    }
    let data = {
        name: $('[name="bucketname"]').val(),
        access_key: $('[name="access_key"]').val(),
        secret_key: $('[name="secret_key"]').val(),
        end_points: $('#end_points option:selected').val(),
        cloudfront_id: cloudfront_id,
        cloudfront: cloudfront,
        action: 'test_smwas3c'
    };

    // с версии 2.8 'ajaxurl' всегда определен в админке
    jQuery.post(ajaxurl, data, function(response) {
                $("#waiting_loader_inner_s3").fadeOut('fast');
                if (response['status']) {
                    $("#waiting_loader_inner_s3").fadeOut();
                    $('#message_bucket_keys_s3').css('color', '#000');
                    $('#message_bucket_keys_s3').html(response['errors']['message']);
                    $('#message_bucket_keys_s3').fadeIn('fast');
                    return;
                }
                if (!response['status']) {
                    $("#waiting_loader_inner_s3").fadeOut();
                    $('#message_bucket_keys_s3').html(`Error message: ${response['errors']['message']}`);
                    $('#message_bucket_keys_s3').css('color', 'red');
                    $('#message_bucket_keys_s3').fadeIn('fast');
                    return;
                }
                $('#message_bucket_keys_s3').fadeIn('fast');
                return
            },
            'json')
        .fail(function(xhr, textStatus) {
            if (xhr.status == 500) {
                $("#waiting_loader_inner_s3").fadeOut();
                $('#message_bucket_keys_s3').html(`Error message: Aws classes are in use somewhere else`);
                $('#message_bucket_keys_s3').css('color', 'red');
                $('#message_bucket_keys_s3').fadeIn('fast');
            };
        })
})

$('#submit_for_s3_get_list').on('click', function(e) {
    let $ = jQuery;
    $.ajax({
        url: ajaxurl,
        method: 'POST',
        dataType: 'text',
        data: {
            action : 'get_list_files_smwas3c',
        },
        success: function(response) {
             
        },
        error: function(response) {
          
        }

    });


    
})


$('#submit_options_s3').on('click', function(e) {
    let $ = jQuery;
    $('#message_bucket_keys_s3').fadeOut('fast');
    $("#waiting_loader_inner_s3").fadeIn();
    if ($('input[name="cloudfront"]:checked').val() == 1) {
        if (!$('[name="cloudfront_id"]').val().trim()) {
            $("#waiting_loader_inner_s3").fadeOut();
            $('#message_bucket_keys_s3').html('Error message: Field "Cloudfront_id" can\'t be empty');
            $('#message_bucket_keys_s3').css('color', 'red');
            $('#message_bucket_keys_s3').fadeIn('fast');
            return;
        }

    }

    //check credentials
    if ($('[name="bucketname"]').val() == '') {
        $('#message_bucket_keys_s3').html('Error message: Field "Bucket name" can\'t be empty');
        $('#message_bucket_keys_s3').css('color', 'red');
        $('#message_bucket_keys_s3').fadeIn('fast');
        return
    }
    if ($('[name="access_key"]').val() == '') {
        $('#message_bucket_keys_s3').html('Error message: Field "Access key" can\'t be empty');
        $('#message_bucket_keys_s3').css('color', 'red');
        $('#message_bucket_keys_s3').fadeIn('fast');
        return
    }
    if ($('[name="secret_key"]').val() == '') {
        $('#message_bucket_keys_s3').html('Error message: Field "Secret key" can\'t be empty');
        $('#message_bucket_keys_s3').css('color', 'red');
        $('#message_bucket_keys_s3').fadeIn('fast');
        return
    }

    e.preventDefault();
    let directories = [];
    let file_types = ['css','js','image'];
    $('#directories option:selected').each(function() {
        directories.push($(this).val());
    });
    // $('#file_types option:selected').each(function() {
    //     file_types.push($(this).val());
    // });
    let data = {
        bucketname: $('[name="bucketname"]').val(),
        access_key: $('[name="access_key"]').val(),
        secret_key: $('[name="secret_key"]').val(),
        end_points: $('[name="end_points"] option:selected').val(),
        cloudfront: $('input[name="cloudfront"]:checked').val(),
        cloudfront_id: $('[name="cloudfront_id"]').val(),
        directories: directories,
        file_types: file_types,
        action: 'save_configuration_smwas3c'
    };
    jQuery.post(ajaxurl, data, function(response) {
                $("#waiting_loader_inner_s3").fadeOut('fast');
                if (response['status']) {
                    window.location.href = 'admin.php?page=sync-media-with-aws-s3-cloudfront/templates/main_page_s3.php&tab=options_s3';
                } else {
                    $('#message_bucket_keys_s3').css('color', 'red');
                    $('#message_bucket_keys_s3').html(`Error message: ${response['errors']['message']}`);
                    $('#message_bucket_keys_s3').fadeIn('fast');
                }
            },
            'json')
        .fail(function(xhr, textStatus) {
            if (xhr.status == 500) {
                $("#waiting_loader_inner_s3").fadeOut();
                $('#message_bucket_keys_s3').html(`Error message: Aws classes are in use somewhere else`);
                $('#message_bucket_keys_s3').css('color', 'red');
                $('#message_bucket_keys_s3').fadeIn('fast');
            };
        })
})

$('[name="cloudfront"]').on('click', function() {
    let $ = jQuery;

    if ($('[name="cloudfront"]:checked').val() == 0) {
        $('#cloudfront_hide').fadeOut('fast');
    } else {
        $('#cloudfront_hide').fadeIn('fast');
    }
})