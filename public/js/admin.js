function initImagesList(accessToken) {

    const deleteButtonHtml = $('#delete-button-tpl').html();
    let config = {
        processing: true,
        serverSide: true,
        // scrollX: true,
        ajax: '/admin/api/images?token=' + accessToken,
        pageLength: 10,
        filter: false,
        order: [],
        dom: "<'row table-container'<'col-sm-12'tr>><'p-2'<'row pagination-container'<'col-sm-4'i><'col-sm-8'p>>>",
        language: {
            url: '/data_tables/ru.json'
        },
        columnDefs: [
            {
                render: function (url) {
                    return (
                        '<div class="text-center"/>'
                            + '<img alt="" src="' + url + '" class="img-thumbnail"/>'
                            + '<div class="mt-1 text-center">' + url + '</div>'
                        + '</div>'
                    );
                },
                targets: 0,
                width: 300
            },
            {
                render: function () {
                    return deleteButtonHtml;
                },
                targets: 3,
                width: 80
            }
        ]
    }

    $('#images-list').DataTable(config)
        .on('init', function (event, settings) {
            let $table = $(settings.nTable);
            let api = $table.dataTable().api();
            $table.on('click', 'button.delete-image', function () {
                const $btn = $(this);
                let requireConfirmation = $btn.attr('data-confirm');
                let proceed = true;
                if (requireConfirmation) {
                    proceed = confirm(requireConfirmation)
                }
                if (proceed) {
                    $btn.prop('disabled', true);
                    const rowData = api.row($btn.closest('tr')).data();
                    $.ajax({
                            url: '/admin/api/image/' + rowData.id + '?_method=DELETE&token=' + accessToken,
                            cache: false,
                            method: 'POST'
                        })
                        .always(function () {
                            $btn.prop('disabled', false);
                            api.draw();
                        });
                }

                return false;
            });
        });
}
