import base_uri from '../config/index.js'

$(document).ready(function () {

    const uri = base_uri + '/mortalitas/data-json.php'

    $.ajax({
        url: uri,
        type: 'GET',
        success: function (response) {
            $("#showParents").autocomplete({
                source: response
            })
        }
    })


})