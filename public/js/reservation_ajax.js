$(document).ready(function () {

    // Activate bootstrap tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('#locationsTable').DataTable();

    // $("#area_id").change(function () {
    //     var area_id = $("#area_id").val();

    //     console.log("area_id changed = " + area_id);

    //     var url = "/admin/ajax/locationAssignmentsGetLandUse";
    //     $.get(url, {area_id: area_id}, function (data, status) {

    //         console.log("json received = " + data);

    //         var jsonData = JSON.parse(data);

    //         var html = "";

    //         if (jsonData.length > 0) {
    //             $("#btn-submit").removeAttr("disabled");
    //             for (var i = 0; i < jsonData.length; i++) {
    //                 html += "<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>";
    //             }
    //         } else {
    //             html += "<option>Hakuna maeneo ya kuweka gharama zake kwa sasa</option>";
    //             $("#btn-submit").attr("disabled", "disabled");
    //         }

    //         $("#areas_type_id").html(html);

    //     });


    //  });

    $("#block_assignment_area_id").change(function () {
        var area_id = $("#block_assignment_area_id").val();

       // console.log(" area_id changed = " + area_id);

       var url = "/admin/ajax/blockAssignmentGetLandUse";
       $.get(url, {area_id: area_id}, function (data, status) {

           // console.log(" json received = " + data);

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

// //fetching block data using area id
//     $("#block_assignment_areas_type_id").change(function () {

//         var area_id = $("#block_assignment_area_id").val();
//         var block_assignment_areas_type_id = $("#block_assignment_areas_type_id").val();

//         console.log(" area_id = " + area_id + "\nareas_type_id = " + block_assignment_areas_type_id);

//         var url = "/admin/ajax/blockAssignmentsGetBlock";

//         console.log(" url = " + url);

//         $.get(url, {area_id: area_id, areas_type_id: block_assignment_areas_type_id}, function (data, status) {

//             console.log(" json status = " + status);
//             console.log(" json received = " + data);

//             var jsonData = JSON.parse(data);

//             var html = "";

//             if (jsonData.length > 0) {
//                 $("#btn-submit").removeAttr("disabled");
//                 for (var i = 0; i < jsonData.length; i++) {
//                     html += "<option value='" + jsonData[i].block_id + "'>" + jsonData[i].name + "</option>";
//                 }
//             } else {
//                 html += "<option>Hakuna maeneo ya kuweka gharama zake kwa sasa</option>";
//                 $("#btn-submit").attr("disabled", "disabled");
//             }

//             $("#block_assignment_areas_type_id_div").html(html);

//         });

//     });
///BLOCK ASSIGNMENT
$("#plot_assiignment_area_id").on("change", function () {
        // console.log('changed');
        var area_id = $("#plot_assiignment_area_id").val();
        // console.log('area_id = ' + area_id);

        var url = "/admin/ajax/plotAssignmentGetLandUses";

        // console.log('url = ' + url);

        $.get(url, {area_id: area_id}, function (data, status) {
            // console.log(" json status = " + status);
             //console.log(" json received = " + data);
             var jsonData = JSON.parse(data);

             var html1 = "";

             if (jsonData.length > 0) {
                html1 += "<option value=''>-Chagua-</option>";
                // console.log('hapa');
                for (var i = 0; i < jsonData.length; i++) {
                    html1 += "<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>";
                    // console.log("<option value='" + jsonData[i].areas_type_id + "'>" + jsonData[i].name + "</option>");
                }
            } else {
                html1 += "<option>-Empty-</option>";
            }

            $('#plot_assiignment_areas_type_id').html(html1);
            //console.log('html1 = ' + html1);

        });
    });
    //POPULATE TABLE WITH DATA TABLES FROM AJAX
    $("#plot_assiignment_area_id").on("change", function () {
        // console.log('changed');
        var reserved=$("#reserved").val();
        var area_id = $("#plot_assiignment_area_id").val();
        // console.log('area_id = ' + area_id);

        var url = "/admin/ajax/LandUse";

        // console.log('url = ' + url);

        $.get(url, {area_id: area_id,reserved:reserved}, function (data, status) {
            // console.log(" json status = " + status);
            // console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            // console.log(jsonData);

            var html1 = "<table class='table table-bordered'>";
            html1 += '<thead>';
            html1 += ' <tr>';
            html1 += '<th>SN</th>';
            html1 += '<th>Eneo</th>';
            html1 += '<th>Matumizi ya kiwanja</th>';
            html1 += '<th>Kitalu</th>';
            html1 += '<th>Namba ya kiwanja</th>';
            html1 += '<th>Ukubwa</th>';
            html1 += '<th>Status</th>';
            html1 += '<th>Added</th>';
            html1 += '<th>Published</th>';

            html1 += '</tr>  ';              
            html1 += '</thead>';

            html1 += '</tbody>';
            if (jsonData.length > 0) {

                // console.log('hapa');
                for (var i = 0; i < jsonData.length; i++) {
                   // html1 += $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');

                   // console.log('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('#cive').html(html1);

                    html1 += '<tr>';

                    html1 += '<td>'+(i+1)+'</td>';
                    html1 += '<td>' + jsonData[i].location + '</td>';
                    html1 += '<td>' + jsonData[i].land_use + '</td>';
                    html1 += '<td>' + jsonData[i].block + '</td>';
                    html1 += '<td>' + jsonData[i].plot_no + '</td>';
                    html1 += '<td>' + jsonData[i].size + '</td>';
                    html1 += '<td></td>';
                    html1 += '<td></td>';
                    html1 += '<td>';
                    if (jsonData[i].published === 0) {
                        
                                html1 += 'unpublished';
                                
                            }else{
                                html1 += 'Published';
                            }
                            html1 += '</td>';
                            html1 += '</tr>';
                        }
                    }

                    html1 += "</tbody>";
                    html1 += "</table>";

         //console.log(html1);

         $('#cive').html(html1);
        // console.log('html1 = ' + html1);

    });
    });
    //get published data
    $("#reserved").on("change", function () {
        // console.log('changed');
        var reserved=$("#reserved").val();
        // console.log('area_id = ' + area_id);

        var url = "/admin/ajax/published";

        // console.log('url = ' + url);

        $.get(url, {reserved:reserved}, function (data, status) {
            // console.log(" json status = " + status);
            // console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            // console.log(jsonData);

            var html1 = "<table class='table table-bordered'>";
            html1 += '<thead>';
            html1 += ' <tr>';
            html1 += '<th>SN</th>';

            html1 += '<th>Eneo</th>';
            html1 += '<th>Matumizi ya kiwanja</th>';
            html1 += '<th>Kitalu</th>';
            html1 += '<th>Namba ya kiwanja</th>';
            html1 += '<th>Ukubwa</th>';
            html1 += '<th>Status</th>';
            html1 += '<th>Added</th>';
            html1 += '<th>Published</th>';
            
            html1 += '</tr>  ';              
            html1 += '</thead>';
            
            html1 += '</tbody>';
            if (jsonData.length > 0) {

                // console.log('hapa');
                for (var i = 0; i < jsonData.length; i++) {
                   // html1 += $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');

                   // console.log('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('#cive').html(html1);

                    html1 += '<tr>';
                    
                    html1 += '<td>'+(i+1)+'</td>';
                    html1 += '<td>' + jsonData[i].location + '</td>';
                    html1 += '<td>' + jsonData[i].land_use + '</td>';
                    html1 += '<td>' + jsonData[i].block + '</td>';
                    html1 += '<td>' + jsonData[i].plot_no + '</td>';
                    html1 += '<td>' + jsonData[i].size + '</td>';
                    html1 += '<td></td>';
                    html1 += '<td></td>';
                    html1 += '<td>';
                    if (jsonData[i].published === 0) {
                                html1 += 'Publish';
                            }else{
                                html1 += 'Published';
                            }
                            html1 += '</td>';
                            html1 += '</tr>';
                        }
                    }

                    html1 += "</tbody>";
                    html1 += "</table>";

         //console.log(html1);
         
         $('#cive').html(html1);
        // console.log('html1 = ' + html1);

    });
    });
    //GET PAYED & UNPAID RESERVED PLOTS
    $("#payment_details").on("change", function () {
        // console.log('changed');
        var payment_details=$("#payment_details").val();
        // console.log('area_id = ' + area_id);

        var url = "/admin/ajax/payment";

        // console.log('url = ' + url);

        $.get(url, {payment_details:payment_details}, function (data, status) {
            // console.log(" json status = " + status);
            // console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            // console.log(jsonData);

            var html1 = "<table class='table table-bordered'>";
            html1 += '<thead>';
            html1 += ' <tr>';
            html1 += '<th>SN</th>';
            html1 += '<th>Plot Number</th>';
            html1 += '<th>Block</th>';
            html1 += '<th>Area</th>';
            html1 += '<th>Land Use</th>';
            html1 += '<th>First Name</th>';
            html1 += '<th>Middle Name</th>';
            html1 += '<th>Last Name</th>';
            html1 += '<th>Phone Number</th>';
                            
            html1 += '</tr>  ';              
            html1 += '</thead>';
            html1 += '</tbody>';
            if (jsonData.length > 0) {
                    var i;
                // console.log('hapa');
                for (i = 0; i < jsonData.length; i++) {
                   // html1 += $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');

                   // console.log('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('#cive').html(html1);

                    html1 += '<tr>';
                    html1 += '<td>'+(i+1)+'</td>';
                    html1 += '<td>' + jsonData[i].block + '</td>';
                    html1 += '<td>' + jsonData[i].plot_no + '</td>';
                    html1 += '<td>' + jsonData[i].location + '</td>';
                    html1 += '<td>' + jsonData[i].land_use + '</td>';
                    html1 += '<td>' + jsonData[i].first_name + '</td>';
                    html1 += '<td>' + jsonData[i].middle_name + '</td>';
                    html1 += '<td>' + jsonData[i].last_name + '</td>';
                    html1 += '<td>' + jsonData[i].phone_number + '</td>';
                    html1 += '</tr>';
                }
            }

            html1 += "</tbody>";
            html1 += "</table>";

         //console.log(html1);
         
         $('#cive').html(html1);
        // console.log('html1 = ' + html1);

    });
    });
    
    //SELECT DATA USING TWO FIELDS
    $("#plot_assiignment_areas_type_id").on("change", function () {
        // console.log('changed');
        var reserved=$("#reserved").val();

        var areas_type_id = $("#plot_assiignment_areas_type_id").val();
        var area_id = $("#plot_assiignment_area_id").val();
        // console.log('area_id = ' + area_id);

        var url = "/admin/ajax/GetBlok";

        // console.log('url = ' + url);

        $.get(url, {area_id: area_id, areas_type_id: areas_type_id,reserved:reserved}, function (data, status) {
            // console.log(" json status = " + status);
            // console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            // console.log(jsonData);

            var html1 = "<table class='table table-bordered'>";
            html1 += '<thead>';
            html1 += ' <tr>';
            html1 += '<th>SN</th>';
            html1 += '<th>Eneo</th>';
            html1 += '<th>Matumizi ya kiwanja</th>';
            html1 += '<th>Kitalu</th>';
            html1 += '<th>Namba ya kiwanja</th>';
            html1 += '<th>Ukubwa</th>';
            html1 += '<th>Status</th>';
            html1 += '<th>Added</th>';
            html1 += '<th>Published</th>';

            html1 += '</tr>  ';              
            html1 += '</thead>';

            html1 += '</tbody>';
            if (jsonData.length > 0) {

                // console.log('hapa');
                for (var i = 0; i < jsonData.length; i++) {
                   // html1 += $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');

                   // console.log('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('#cive').html(html1);

                    html1 += '<tr>';

                    html1 += '<td>'+(i+1)+'</td>';
                    html1 += '<td>' + jsonData[i].location + '</td>';
                    html1 += '<td>' + jsonData[i].land_use + '</td>';
                    html1 += '<td>' + jsonData[i].block + '</td>';
                    html1 += '<td>' + jsonData[i].plot_no + '</td>';

                    html1 += '<td>' + jsonData[i].size + '</td>';
                    html1 += '<td></td>';
                    html1 += '<td></td>';
                    html1 += '<td>';
                    if (jsonData[i].published === 0) {
                                html1 += 'unpublished';
                            }else{
                                html1 += 'Published';
                            }
                            html1 += '</td>';
                            html1 += '</tr>';
                        }
                    }

                    html1 += "</tbody>";
                    html1 += "</table>";

        // console.log(html1);

        $('#cive').html(html1);
         //console.log('html1 = ' + html1);

     });

    });
//POPULATE DATA TABLE USING THREE FIELDS
$("#plot_assiignment_block_id").on("change", function () {
        // console.log('changed');
        
        var areas_type_id = $("#plot_assiignment_areas_type_id").val();
        var block_id = $("#plot_assiignment_block_id").val();

        var area_id = $("#plot_assiignment_area_id").val();
        // console.log('area_id = ' + area_id);
        var reserved=$("#reserved").val();
        var url = "/admin/ajax/GetSze";

        // console.log('url = ' + url);

        $.get(url, {area_id: area_id, areas_type_id: areas_type_id, block_id: block_id,reserved:reserved}, function (data, status) {
            // console.log(" json status = " + status);
            // console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            // console.log(jsonData);

            var html1 = "<table class='table table-bordered'>";
            html1 += '<thead>';
            html1 += ' <tr>';
            html1 += '<th>SN</th>';
            html1 += '<th>Eneo</th>';
            html1 += '<th>Matumizi ya kiwanja</th>';
            html1 += '<th>Kitalu</th>';
            html1 += '<th>Namba ya kiwanja</th>';
            html1 += '<th>Ukubwa</th>';
            html1 += '<th>Status</th>';
            html1 += '<th>Added</th>';
            html1 += '<th>Published</th>';

            html1 += '</tr>  ';              
            html1 += '</thead>';

            html1 += '</tbody>';
            if (jsonData.length > 0) {

                // console.log('hapa');
                for (var i = 0; i < jsonData.length; i++) {
                   // html1 += $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');

                   // console.log('<tr><td>' + jsonData[i].location+ '</td><td>' + jsonData[i].land_use + '</td><td>' + jsonData[i].block + '</td><td>' + jsonData[i].size + '</td></tr>');
                    // $('#cive').html(html1);

                    html1 += '<tr>';

                    html1 += '<td>'+(i+1)+'</td>';
                    html1 += '<td>' + jsonData[i].location + '</td>';
                    html1 += '<td>' + jsonData[i].land_use + '</td>';
                    html1 += '<td>' + jsonData[i].block + '</td>';
                    html1 += '<td>' + jsonData[i].plot_no + '</td>';
                    html1 += '<td>' + jsonData[i].size + '</td>';
                    html1 += '<td></td>';
                    html1 += '<td></td>';
                    html1 += '<td>';
                    if (jsonData[i].published === 0) {
                        html1 += 'unpublished';
                            }else{
                                html1 += 'Published';
                            }
                            html1 += '</td>';
                            html1 += '</tr>';
                        }
                    }

                    html1 += "</tbody>";
                    html1 += "</table>";

        // console.log(html1);

        $('#cive').html(html1);
         //console.log('html1 = ' + html1);

     });

    });

    //LAST
    $("#plot_assiignment_areas_type_id").on("change", function () {
        // console.log('changed');
        var area_id = $("#plot_assiignment_area_id").val();
        var areas_type_id = $("#plot_assiignment_areas_type_id").val();
        // console.log('areas_type_id = ' + areas_type_id);

        var url = "/admin/ajax/plotAssignmentGetBlock";

        // console.log('url = ' + url);

        $.get(url, {area_id: area_id, areas_type_id: areas_type_id}, function (data, status) {
            // console.log(" json status = " + status);
            // console.log(" json received = " + data);
            var jsonData = JSON.parse(data);

            var html1 = "";

            if (jsonData.length > 0) {
               // console.log('hapa');
               html1 += "<option value=''>-Chagua-</option>";
               for (var i = 0; i < jsonData.length; i++) {
                html1 += "<option value='" + jsonData[i].block_id + "'>" + jsonData[i].name + "</option>";
                    //console.log("<option value='" + jsonData[i].block_id + "'>" + jsonData[i].name + "</option>");
                }
            } else {
                html1 += "<option>-Empty-</option>";
            }

            $('#plot_assiignment_block_id').html(html1);
            // console.log('html1 = ' + html1);

        });
    });

});
