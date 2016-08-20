/**
 * Created by Joseph on 8/20/2016.
 */
$(function () {

    area_id = 0,
        area_type_id = 0,
        min_size = 0,
        max_size = 0;


    function getValues() {
        area_id = $("#area_id").val();
        area_type_id = $("#area_type_id").val();

        if ($("#min_size").val() === null || $("#min_size").val() === "") {
            min_size = 0;
        } else {
            min_size = $("#min_size").val();
        }

        if ($("#max_size").val() === null || $("#max_size").val() === "") {
            min_size = 0;
        } else {
            min_size = $("#max_size").val();
        }
    }

    $("#btn-search").on("click", function () {

        getValues();

        var url = "http://localhost:8080/search/performSearch";
        $.get(url,{area_id:area_id, area_type_id:area_type_id, min_size:min_size, max_size:max_size},function (data,status){
            console.log("json received = "+data);

            var jsonData = JSON.parse(data);
/*            blockListView.find('li').hide();
            plotPanel.hide();
            sitePlanPanel.hide();*/

            var html = "";

            html += "<table class='table table-hover table-stripped'>";
                html += "<thead>";
                    html += "<th>Area</th>";
                    html += "<th>Type</th>";
                    html += "<th>Block</th>";
                    html += "<th>Plot#</th>";
                    html += "<th>Size</th>";
                    html += "<th>Price</th>";
                html += "</thead>";
            html += "<tbody>";


            if(jsonData.length > 0){
                for (var i = 0; i < jsonData.length; i++) {
                    var counter = jsonData[i];
                    console.log(counter.name);
                    html += "<tr>";
                    html += "<td>" + counter.area_name + "</td>";
                    html += "<td>" + counter.area_type_name + "</td>";
                    html += "<td>" + counter.block_name + "</td>";
                    html += "<td>" + counter.plot_no + "</td>";
                    html += "<td>" + counter.plot_size + "</td>";
                    html += "<td>" + counter.price + "</td>";
                    html += "</tr>";
                }
            }else{
                $("#searchResults").html("<div class='alert alert-info'>No Matches</div>");

            }

            html += "</tbody></table>";

            $("#searchResults").html(html);
        });

        console.log("Area Id = " + area_id + "\nArea Type Id = " + area_type_id + "\nMin_size = " + min_size + "\nMax size = " + max_size);

    });
});