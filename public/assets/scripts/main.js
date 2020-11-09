$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    $('.delete-class').click(function () {
        let id = $(this).data('id');
        let form = $(this).data('form');
        let modal = $('#areYouSureModal');
        modal.modal('show');
        $('#delete_approve').click(function () {
            form.submit();
        });
    });


    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    let process_status = $("body").data("status");
    let process_type = $("body").data("type");

//alert(process_type);


    switch (process_type) {

        case 'error' :
            toastr.error(process_status);
            break;

        case 'success' :
            toastr.success(process_status);
            break;

        case 'info' :
            toastr.info(process_status);
            break;

        case 'warning' :
            toastr.warning(process_status);
            break;
    }

});

$(window).on('load', function()
{
    $("#preloader").fadeOut(800, function () {
        $("#app").fadeIn(1000).removeClass('d-none');
    });

});

ClassicEditor.defaultConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            '|',
            'bulletedList',
            'numberedList',
            '|',
            'insertTable',
            '|',
            '|',
            'undo',
            'redo'
        ]
    },
    table: {
        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
    }
};


