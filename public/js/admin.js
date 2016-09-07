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
                html += "<option>Hakuna maeneo ya kuweka gharama zake kwa sasa</option>";
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
                html += "<option>Hakuna maeneo ya kuweka gharama zake kwa sasa</option>";
                $("#btn-submit").attr("disabled", "disabled");
            }

            $("#block_assignment_areas_type_id").html(html);

        });
    });


    $("#block_assignment_areas_type_id").change(function () {

        var area_id = $("#block_assignment_area_id").val();
        var block_assignment_areas_type_id = $("#block_assignment_areas_type_id").val();

        console.log(" area_id = " + area_id + "\nareas_type_id = " + block_assignment_areas_type_id);

        var url = "/admin/ajax/blockAssignmentsGetBlock";

        console.log(" url = " + url);

        $.get(url, {area_id: area_id, areas_type_id: block_assignment_areas_type_id}, function (data, status) {

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
                html += "<option>Hakuna maeneo ya kuweka gharama zake kwa sasa</option>";
                $("#btn-submit").attr("disabled", "disabled");
            }

            $("#block_assignment_areas_type_id_div").html(html);

        });

    });

    $("#plot_assignment_area_id").on("change", function () {
        console.log('changed');
        var area_id = $("#plot_assignment_area_id").val();
        console.log('area_id = ' + area_id);

        var url = "/admin/ajax/plotAssignmentsGetLandUses";

        console.log('url = ' + url);

        $.get(url, {area_id: area_id}, function (data, status) {
            console.log(" json status = " + status);
            console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            var html1 = "";

            if (jsonData.length > 0) {
                html1 += "<option value=''>-Chagua-</option>";
                console.log('hapa');
                for (var i = 0; i < jsonData.length; i++) {
                    html1 += "<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>";
                    console.log("<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>");
                }
            } else {
                html1 += "<option>-Empty-</option>";
            }

            $('#plot_assignment_areas_type_id').html(html1);
            console.log('html1 = ' + html1);

        });
    });

    $("#plot_assignment_areas_type_id").on("change", function () {
        console.log('changed');
        var area_id = $("#plot_assignment_area_id").val();
        var areas_type_id = $("#plot_assignment_areas_type_id").val();
        console.log('areas_type_id = ' + areas_type_id);

        var url = "/admin/ajax/plotAssignmentsGetBlock";

        console.log('url = ' + url);

        $.get(url, {area_id: area_id, areas_type_id: areas_type_id}, function (data, status) {
            console.log(" json status = " + status);
            console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            var html1 = "";

            if (jsonData.length > 0) {
                console.log('hapa');
                html1 += "<option value=''>-Chagua-</option>";
                for (var i = 0; i < jsonData.length; i++) {
                    html1 += "<option value='" + jsonData[i].block_id + "'>" + jsonData[i].name + "</option>";
                    console.log("<option value='" + jsonData[i].block_id + "'>" + jsonData[i].name + "</option>");
                }
            } else {
                html1 += "<option>-Empty-</option>";
            }

            $('#plot_assignment_block_id').html(html1);
            console.log('html1 = ' + html1);

        });
    });

});
