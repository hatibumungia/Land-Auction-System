$(document).ready(function () {

    // Activate bootstrap tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('#locationsTable').DataTable();

    $("#area_id").change(function () {
        var area_id = $("#area_id").val();

        console.log("area_id changed = " + area_id);

        var url = "/admin/ajax/locationAssignmentsGetLandUse";
        $.get(url, {area_id: area_id}, function (data, status) {

            console.log("json received = " + data);

            var jsonData = JSON.parse(data);

            var html = "";

            if (jsonData.length > 0) {
                $("#btn-submit").removeAttr("disabled");
                for (var i = 0; i < jsonData.length; i++) {
                    html += "<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>";
                }
            } else {
                html += "<option>All land uses has already been assigned</option>";
                $("#btn-submit").attr("disabled", "disabled");
            }

            $("#areas_type_id").html(html);

        });


    });

    $("#block_assignment_area_id").change(function () {
        var area_id = $("#block_assignment_area_id").val();

        console.log(" area_id changed = " + area_id);

        var url = "/admin/ajax/blockAssignmentsGetLandUse";
        $.get(url, {area_id: area_id}, function (data, status) {

            console.log(" json received = " + data);

            var jsonData = JSON.parse(data);

            var html = "";

            if (jsonData.length > 0) {
                $("#btn-submit").removeAttr("disabled");
                html += "<option value=''>-Select-</option>"
                for (var i = 0; i < jsonData.length; i++) {
                    html += "<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>";
                }
            } else {
                html += "<option>All land uses has already been assigned</option>";
                $("#btn-submit").attr("disabled", "disabled");
            }

            $("#block_assignment_areas_type_id").html(html);

        });


    });


    $("#block_assignment_areas_type_id").change(function () {
        var area_id = $("#block_assignment_area_id").val();
        var areas_type_id = $("#block_assignment_areas_type_id").val();

        console.log(" area_id = " + area_id + "\nareas_type_id = " + areas_type_id);

        var url = "/admin/ajax/blockAssignmentsGetBlock";

        console.log(" url = " + url);

        $.get(url, {area_id: area_id, areas_type_id: areas_type_id}, function (data, status) {

            console.log(" json status = " + status);
            console.log(" json received = " + data);

            var jsonData = JSON.parse(data);

            var html = "";

            if (jsonData.length > 0) {
                $("#btn-submit").removeAttr("disabled");
                for (var i = 0; i < jsonData.length; i++) {
                    html += "<option value='" + jsonData[i].block_id + "'>" + jsonData[i].name + "</option>";
                }
            } else {
                html += "<option>All land uses has already been assigned</option>";
                $("#btn-submit").attr("disabled", "disabled");
            }

            $("#block_assignment_areas_type_id_div").html(html);

        });


    });

});
