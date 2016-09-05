/**
 * Created by Joseph on 8/20/2016.
 */
$(function () {

    min_size = $("#min_size").val();
    max_size = $("#max_size").val();

    add_params = "min_size=" + min_size + "&max_size=" + max_size;

    getSearchResults({params: add_params});

    function getSearchResults(parameters) {
        var params = parameters.params;

        $('#searchResults').html("<table id='example' class='display' cellspacing='0' width='100%'><thead><tr><th>Location</th><th>Matumizi ya Ardhi</th><th>Kitalu</th><th>Namba ya Kiwanja</th><th>Ukubwa</th><th>Gharama</th></tr></thead><tfoot><tr><th>Eneo</th><th>Matumizi ya Ardhi</th><th>kitalu</th><th>Namba ya Kiwanja</th><th>Ukubwa</th><th>Gharama</th></tr></tfoot></table>");

        var url = '/search/performSearch?' + params;
        $('#example').DataTable({
            "ajax": url
        });
        console.log(url);
    }

    $("#btn-search").on("click", function () {

        var min_size = $("#min_size").val();
        var max_size = $("#max_size").val();

        var add_params = "min_size=" + min_size + "&max_size=" + max_size;

        console.log("Min size = " + min_size + "\nMax size = " + max_size);

        console.log("Additional params = " + add_params);

        // check if user has not specified both the area name and area type name
        if ($('#area_id').val() == 0 && $('#area_type_id').val() == 0) {
            getSearchResults({params: add_params});
            // check if user has specified both the area name and area type name
        } else if ($('#area_id').val() != 0 && $('#area_type_id').val() != 0) {
            getSearchResults({params: 'area_id=' + $('#area_id').val() + '&area_type_id=' + $('#area_type_id').val() + "&" + add_params});
            // check if user has specified the area name only
        } else if ($('#area_id').val() != 0) {
            getSearchResults({params: 'area_id=' + $('#area_id').val() + "&" + add_params});
            // check if user has specified the area type name only
        } else if ($('#area_type_id').val() != 0) {
            getSearchResults({params: 'area_type_id=' + $('#area_type_id').val() + "&" + add_params});
        }

    });
});