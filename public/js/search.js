/**
 * Created by Joseph on 8/20/2016.
 */
$(function () {

    getSearchResults();

    function getSearchResults(params = ''){

        $('#searchResults').html("<table id='example' class='display' cellspacing='0' width='100%'><thead><tr><th>Location</th><th>Land use</th><th>Block</th><th>Plot#</th><th>Size</th><th>Price</th></tr></thead><tfoot><tr><th>Location</th><th>Land use</th><th>Block</th><th>Plot#</th><th>Size</th><th>Price</th></tr></tfoot></table>");

        var url = '/search/performSearch' + params;
        $('#example').DataTable( {
            "ajax": url
        }); 
       console.log(url);   
    }

    $("#btn-search").on("click", function () {

        // check if user has not specified both the area name and area type name
        if($('#area_id').val() == 0 && $('#area_type_id').val() == 0){
            getSearchResults();

        // check if user has specified both the area name and area type name  
        }else if($('#area_id').val() != 0 && $('#area_type_id').val() != 0){
            getSearchResults('?area_id=' + $('#area_id').val() + '&area_type_id=' + $('#area_type_id').val());
        // check if user has specified the area name only     
        }else if($('#area_id').val() != 0){
            getSearchResults('?area_id=' + $('#area_id').val());
        // check if user has specified the area type name only     
        }else if($('#area_type_id').val() != 0){
            getSearchResults('?area_type_id=' + $('#area_type_id').val());
        }

    });
});