<?php

namespace App\Http\Controllers;
use Mail;
use DB;
use Excel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create the excell file
            Excel::create('Inventory Report', function($excel){
                // CPU Sheet
                $excel->sheet('CPU', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('desktops', 'desktops.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Desktop')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });
                // Firewall Sheet
                $excel->sheet('Firewall', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('firewalls', 'firewalls.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Firewall')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });
                // Hard Disk Sheet
                $excel->sheet('Hard Disk', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('hard_disks', 'hard_disks.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Hard Disk')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets-capacity')->with('data',$data);
                });
                // Headset Sheet
                $excel->sheet('Headset', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('headsets', 'headsets.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Headset')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Keyboard Sheet
                $excel->sheet('Keyboard', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('keyboards', 'keyboards.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Keyboard')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Mac Sheet
                $excel->sheet('Mac', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('macs', 'macs.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Mac')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets-mac')->with('data',$data);
                });

                // Memory Sheet
                $excel->sheet('Memory', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('memories', 'memories.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Memory')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets-memory')->with('data',$data);
                });

                // Monitor Sheet
                $excel->sheet('Monitor', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('monitors', 'monitors.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Monitor')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Mouse Sheet
                $excel->sheet('Mouse', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('mice', 'mice.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Mouse')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Network Switch Sheet
                $excel->sheet('Network Switch', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('network_switches', 'network_switches.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Network Switch')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Portable Hard Disk Sheet
                $excel->sheet('Portable Hard Disk', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('portable_hard_disks', 'portable_hard_disks.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Portable Hard Disk')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets-capacity')->with('data',$data);
                });

                // Printer Sheet
                $excel->sheet('Printer', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('printers', 'printers.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Printer')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Projector Sheet
                $excel->sheet('Projector', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('projectors', 'projectors.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Projector')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Scanner Sheet
                $excel->sheet('Scanner', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('scanners', 'scanners.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Scanner')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Software Sheet
                $excel->sheet('Software', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('softwares', 'softwares.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Software')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets-software')->with('data',$data);
                });

                // Speaker Sheet
                $excel->sheet('Speaker', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('speakers', 'speakers.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Speaker')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Telephone Sheet
                $excel->sheet('Telephone', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('telephones', 'telephones.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Speaker')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Uninterruptible Power Supply Sheet
                $excel->sheet('Uninterruptible Power Supply', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('uninterruptible_power_supplies', 'uninterruptible_power_supplies.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Uninterruptible Power Supply')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Video Card Sheet
                $excel->sheet('Video Card', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('video_cards', 'video_cards.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Video Card')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets')->with('data',$data);
                });

                // Other Component Sheet
                $excel->sheet('Other Component', function($sheet){
                    $data = DB::table('asset_tags')
                    ->join('work_stations', 'work_stations.id', '=', 'asset_tags.work_station_id')
                    ->join('other_components', 'other_components.id', '=', 'asset_tags.component_id')
                    ->select('*')
                    ->where('asset_tags.component_type', 'Other Component')
                    ->orderBy('work_stations.name')
                    ->get();

                    $sheet->loadView('excel.assets-other')->with('data',$data);
                });
            })->download('xls');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
