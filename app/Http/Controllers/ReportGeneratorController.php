<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlotAssignmentRequest;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PlotAssignment;
use App\Area;
use App\AreaType;
use App\Block;
use DB;
use App\Plot;
use Illuminate\Support\Facades\Session;

class ReportGeneratorController extends Controller
{
    public function published(){

    	$sql = "SELECT plot_assignment.plot_id,plot_assignment.plot_id,plot_assignment.status,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.published,plot_assignment.block_id, areas.name AS location, area_types.name
       as land_use, blocks.name as block, plots.plot_no, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id ORDER BY plot_assignment.updated_at DESC;";


       $plot_assignments = DB::select($sql);
       // $reserved_plots_statuses = $this->search($reservedPlotsStatusView, $request);

       $counts=count(1);

       $user = UserDetail::findOrFail(Session::get('id'));
       $areas = Area::all();
        // $area_types = AreaType::all();
        // $blocks = Block::all(); 
            //dd($plot_assignments );
       return view('reportsGenerator.published', compact('plot_assignments', 'user','areas','area_types','blocks','counts'));

   }
   public function reserved()
   {
    $plot_assignments = DB::select("select `dodoma`.`plots`.`plot_no` AS `plot_no`,`dodoma`.`blocks`.`name` AS `block`,`dodoma`.`areas`.`name` AS `location`,`dodoma`.`area_types`.`name` AS `land_use`,`dodoma`.`plot_assignment`.`size` AS `size`,`dodoma`.`area_assignment`.`price` AS `price`,(`dodoma`.`plot_assignment`.`size` * `dodoma`.`area_assignment`.`price`) AS `total_price`,`dodoma`.`plot_reservation`.`deadline` AS `deadline`,`dodoma`.`user_details`.`first_name` AS `first_name`,`dodoma`.`user_details`.`middle_name` AS `middle_name`,`dodoma`.`user_details`.`last_name` AS `last_name`,`dodoma`.`user_details`.`address` AS `address`,`dodoma`.`user_details`.`phone_number` AS `phone_number`,`dodoma`.`user_details`.`region` AS `region`,`dodoma`.`plot_reservation`.`created_at` AS `created_at`,`dodoma`.`plot_reservation`.`user_detail_id` AS `user_credential_id`,`dodoma`.`user_details`.`photo` AS `photo` from (((((((`dodoma`.`user_details` join `dodoma`.`plots`) join `dodoma`.`blocks`) join `dodoma`.`areas`) join `dodoma`.`area_types`) join `dodoma`.`plot_assignment`) join `dodoma`.`area_assignment`) join `dodoma`.`plot_reservation`) where ((`dodoma`.`user_details`.`user_detail_id` = `dodoma`.`plot_reservation`.`user_detail_id`) and (`dodoma`.`plots`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`blocks`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`areas`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`area_types`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`plot_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`plot_assignment`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`area_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`area_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`)AND plot_assignment.status=true)");
    //dd($plot_assignments);
    $user = UserDetail::findOrFail(Session::get('id'));
    $areas = Area::all();
    $counts=count(1);
    return view('reportsGenerator.reserved', compact('plot_assignments', 'user','areas','area_types','blocks','counts'));
        //return view($land_uses);
}
public function unreserved()
{
        //$area_id = $_GET['area_id'];

    $plot_assignments = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false ORDER BY plot_assignment.updated_at DESC");

    $user = UserDetail::findOrFail(Session::get('id'));
    $areas = Area::all();
    $counts=count(1);
        // $area_types = AreaType::all();
        // $blocks = Block::all(); 
        //dd($plot_assignments);
    return view('reportsGenerator.unreserved', compact('user','areas','area_types','blocks','plot_assignments','counts'));
}

public function publishExcel(Request $request){
    $area_id = $request->input('area_id');
    $areas_type_id = $request->input('areas_type_id');
    $block_id = $request->input('block_id');
    $reserved = $request->input('reserved');
    $button = $request->input('excel');
    $counts = 0;

    //return $reserved;


    if(isset($reserved) && empty($area_id) && empty($areas_type_id) && empty($block_id)){
        $sql = "SELECT  areas.name as area, area_types.name as land_use, blocks.name as block, plots.plot_no as plot_no, if(plot_assignment.status=1, 'Reserved', 'Unreserved') as status, plot_assignment.created_at as added, if(plot_assignment.published=1, 'Published', 'Unpublished') as published FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id  AND plot_assignment.published=$reserved ORDER BY plot_assignment.updated_at DESC;";

        $data = DB::SELECT("$sql");

    }
    else if(isset($reserved) && !empty($area_id) && empty($areas_type_id) && empty($block_id)){
        $sql = "SELECT  areas.name as area, area_types.name as land_use, blocks.name as block, plots.plot_no as plot_no, if(plot_assignment.status=1, 'Reserved', 'Unreserved') as status, plot_assignment.created_at as added, if(plot_assignment.published=1, 'Published', 'Unpublished') as published FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id AND plot_assignment.area_id=$area_id AND plot_assignment.published=$reserved ORDER BY plot_assignment.updated_at DESC;";

        $data = DB::SELECT("$sql");

    }elseif (isset($reserved) && !empty($area_id) && !empty($areas_type_id) && empty($block_id)) {

        $sql = "SELECT  areas.name as area, area_types.name as land_use, blocks.name as block, plots.plot_no as plot_no, if(plot_assignment.status=1, 'Reserved', 'Unreserved') as status, plot_assignment.created_at as added, if(plot_assignment.published=1, 'Published', 'Unpublished') as published FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id AND plot_assignment.area_id=$area_id AND plot_assignment.published=$reserved AND plot_assignment.areas_type_id=$areas_type_id ORDER BY plot_assignment.updated_at DESC;";

        $data = DB::SELECT("$sql");

    }elseif (isset($reserved) && !empty($area_id) && !empty($areas_type_id) && !empty($block_id)) {

        $sql = "SELECT  areas.name as area, area_types.name as land_use, blocks.name as block, plots.plot_no as plot_no, if(plot_assignment.status=1, 'Reserved', 'Unreserved') as status, plot_assignment.created_at as added, if(plot_assignment.published=1, 'Published', 'Unpublished') as published FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id AND plot_assignment.area_id=$area_id AND plot_assignment.published=$reserved AND plot_assignment.areas_type_id=$areas_type_id AND plot_assignment.block_id ORDER BY plot_assignment.updated_at DESC;";

        $data = DB::SELECT("$sql");
    }

    $dataArray=[];
    
    $dataArray[] = ['SN','Eneo','Matumizi ya kiwanya','Kitalu','Namba ya kiwanja','Status','Added','Published'];

   
   
    foreach ($data as $datas) {
        $counts++;
        $dataArray[] = [$counts,$datas->area, $datas->land_use, $datas->block, $datas->plot_no, $datas->status, $datas->added, $datas->published];
    }

           // return $data;

    if($button == "excel"){\Excel::create('Publishe', function($excel) use ($dataArray) {

                    // Set the spreadsheet title, creator, and description
        $excel->setTitle('Published');
        $excel->setCreator('DMC')->setCompany('WJ Gilmore, LLC');
        $excel->setDescription('Published file');

                    // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataArray) {
            $sheet->fromArray($dataArray, null, 'A1', false, false);
        });

    })->download('xlsx');
}else if($button == "pdf"){

    \Excel::create('Publishe', function($excel) use ($dataArray) {

                    // Set the spreadsheet title, creator, and description
        $excel->setTitle('Published');
        $excel->setCreator('DMC')->setCompany('WJ Gilmore, LLC');
        $excel->setDescription('Published file');

                    // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataArray) {
            $sheet->fromArray($dataArray, null, 'A1', false, false);
        });

    })->download('pdf');

}

return view('reportsGenerator.published');



}


public function paidExcel(Request $request){

  $payment_details = $request->input('payment_details');
  $button = $request->input('paid');
  $counts = 0;



  $plot_assignments = "select `dodoma`.`plots`.`plot_no` AS `plot_no`,`dodoma`.`blocks`.`name` AS `block`,`dodoma`.`areas`.`name` AS `location`,`dodoma`.`area_types`.`name` AS `land_use`,`dodoma`.`plot_assignment`.`size` AS `size`,`dodoma`.`area_assignment`.`price` AS `price`,(`dodoma`.`plot_assignment`.`size` * `dodoma`.`area_assignment`.`price`) AS `total_price`,`dodoma`.`plot_reservation`.`deadline` AS `deadline`,`dodoma`.`user_details`.`first_name` AS `first_name`,`dodoma`.`user_details`.`middle_name` AS `middle_name`,`dodoma`.`user_details`.`last_name` AS `last_name`,`dodoma`.`user_details`.`address` AS `address`,`dodoma`.`user_details`.`phone_number` AS `phone_number`,`dodoma`.`user_details`.`region` AS `region`,`dodoma`.`plot_reservation`.`created_at` AS `created_at`,`dodoma`.`plot_reservation`.`user_detail_id` AS `user_credential_id`,`dodoma`.`user_details`.`photo` AS `photo` from (((((((`dodoma`.`user_details` join `dodoma`.`plots`) join `dodoma`.`blocks`) join `dodoma`.`areas`) join `dodoma`.`area_types`) join `dodoma`.`plot_assignment`) join `dodoma`.`area_assignment`) join `dodoma`.`plot_reservation`) where ((`dodoma`.`user_details`.`user_detail_id` = `dodoma`.`plot_reservation`.`user_detail_id`) and (`dodoma`.`plots`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`blocks`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`areas`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`area_types`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`plot_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`plot_assignment`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`area_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`area_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`)AND plot_reservation.status='$payment_details')";

  $data = DB::SELECT("$plot_assignments");

  $dataArray=[];
  $dataArray[] = ['SN','Block','Plot number','Area','Status','Land Use','First Name',  'Middle Name', 'Last Name', 'Phone Number'];

  foreach ($data as $datas) {
    $counts++;
    $dataArray[] = [$counts,$datas->block, $datas->plot_no, $datas->location, $datas->land_use, $datas->first_name, $datas->middle_name, $datas->last_name, $datas->phone_number];
}

if($button == "excel"){
  \Excel::create('Paid details', function($excel) use ($dataArray) {

                    // Set the spreadsheet title, creator, and description
    $excel->setTitle('Paid details');
    $excel->setCreator('DMC')->setCompany('WJ Gilmore, LLC');
    $excel->setDescription('Paid details file');

                    // Build the spreadsheet, passing in the payments array
    $excel->sheet('sheet1', function($sheet) use ($dataArray) {
        $sheet->fromArray($dataArray, null, 'A1', false, false);
    });

})->download('xlsx');
}else if($button == "pdf"){

    \Excel::create('Paid details', function($excel) use ($dataArray) {

                    // Set the spreadsheet title, creator, and description
        $excel->setTitle('Paid details');
        $excel->setCreator('DMC')->setCompany('WJ Gilmore, LLC');
        $excel->setDescription('Paid details file');

                    // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataArray) {
            $sheet->fromArray($dataArray, null, 'A1', false, false);
        });

    })->download('pdf');

}

return view('reportsGenerator.reserved');

}


public function reservedExcel(Request $request){

   $area_id = $request->input('area_id');
   $areas_type_id = $request->input('areas_type_id');
   $block_id = $request->input('block_id');

   $button = $request->input('reserved');
   $counts = 0;





   if (!empty($area_id) && empty($areas_type_id) && empty($block_id)) {

    $plot_assignments = "SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
    as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false AND plot_assignment.area_id=$area_id ORDER BY plot_assignment.updated_at DESC";

    $data = DB::SELECT("$plot_assignments");

}else if (!empty($area_id) && !empty($areas_type_id) && empty($block_id)) {

    $plot_assignments = "SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
    as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false AND plot_assignment.area_id=$area_id AND plot_assignment.areas_type_id=$areas_type_id ORDER BY plot_assignment.updated_at DESC";

    $data = DB::SELECT("$plot_assignments");

}else if (!empty($area_id) && !empty($areas_type_id) && !empty($block_id)) {

    $plot_assignments = "SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
    as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false AND plot_assignment.area_id=$area_id AND plot_assignment.areas_type_id=$areas_type_id AND plot_assignment.block=$block_id ORDER BY plot_assignment.updated_at DESC";

    $data = DB::SELECT("$plot_assignments");

}else{

    $plot_assignments = "SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
    as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false ORDER BY plot_assignment.updated_at DESC";
    $data = DB::SELECT("$plot_assignments");

}



$dataArray=[];
$dataArray[] = ['SN','Block','Plot number','Area','Status','Land Use','Plot size','published'];

foreach ($data as $datas) {
    $counts++;
    $dataArray[] = [$counts,$datas->block, $datas->plot_no, $datas->location, $datas->land_use, $datas->size, $datas->published];
}


if($button == "excel"){
  \Excel::create('Unreserved details', function($excel) use ($dataArray) {

                    // Set the spreadsheet title, creator, and description
    $excel->setTitle('Unreserved details');
    $excel->setCreator('DMC')->setCompany('WJ Gilmore, LLC');
    $excel->setDescription('Unreserved details file');

                    // Build the spreadsheet, passing in the payments array
    $excel->sheet('sheet1', function($sheet) use ($dataArray) {
        $sheet->fromArray($dataArray, null, 'A1', false, false);
    });

})->download('xlsx');
}else if($button == "pdf"){

    \Excel::create('Unreserved details', function($excel) use ($dataArray) {

                    // Set the spreadsheet title, creator, and description
        $excel->setTitle('Unreserved details');
        $excel->setCreator('DMC')->setCompany('WJ Gilmore, LLC');
        $excel->setDescription('Unreserved details file');

                    // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataArray) {
            $sheet->fromArray($dataArray, null, 'A1', false, false);
        });

    })->download('pdf');

}

return view('reportsGenerator.unreserved');





}


}

