<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotReservationView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
CREATE VIEW plot_reservation_view AS (
SELECT
plots.plot_no AS plot_no,
blocks.name AS block,
areas.name AS location,
area_types.name AS land_use,
plot_assignment.size AS size,
area_assignment.price AS price,
(plot_assignment.size * area_assignment.price) AS total_price,
plot_reservation.deadline AS deadline,
user_details.first_name AS first_name,
user_details.middle_name AS middle_name,
user_details.last_name AS last_name,
user_details.address AS address,
user_details.region AS region,
plot_reservation.created_at AS created_at,
plot_reservation.user_detail_id AS user_credential_id
FROM
user_details, plots, blocks, areas, area_types, plot_assignment, area_assignment, plot_reservation
WHERE
user_details.user_detail_id=plot_reservation.user_detail_id AND
plots.plot_id=plot_reservation.plot_id AND
blocks.block_id=plot_reservation.block_id AND
areas.area_id=plot_reservation.area_id AND
area_types.areas_type_id=plot_reservation.areas_type_id AND
plot_assignment.area_id=plot_reservation.area_id AND
plot_assignment.areas_type_id=plot_reservation.areas_type_id AND
plot_assignment.block_id=plot_reservation.block_id AND
plot_assignment.plot_id=plot_reservation.plot_id AND
area_assignment.areas_type_id=plot_reservation.areas_type_id AND
area_assignment.area_id=plot_reservation.area_id
)        
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW plot_reservation_view');
    }
}
