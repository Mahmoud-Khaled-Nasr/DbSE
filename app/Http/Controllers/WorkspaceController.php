<?php

namespace App\Http\Controllers;

use App\Workspace;
use Illuminate\Http\Request;
use TomLingham\Searchy\Facades\Searchy;
use Illuminate\Filesystem\Filesystem;

/**
 * Class WorkspaceController
 * @package App\Http\Controllers
 */
class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showstates()
    {
        $states = \DB::select('SELECT DISTINCT state FROM workspaces;');
        $response = $states;
        return response()->json($response,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showworkspaces($state)
    {
        $workspaces = Workspace::all()->where('state','=',$state);
        $response = array();
        foreach ($workspaces as $workspace ){
            array_push($response,['id'=>$workspace->id , 'name'=>$workspace->name ,'logo'=>$workspace->logo , 'rate'=>$workspace->rate]);
        }
        return response()->json($response,200);


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function searchworkspaces(Request $request)

    {
        $name=$request->name;
        $state=$request->state;
        $city=$request->city;
        $type=$request->type;
        $air_conditioning=$request->air_conditioning;
        $private_rooms=$request->private_rooms;
        $data_show=$request->data_show;
        $wifi=$request->wifi;
        $laser_cutter=$request->laser_cutter;
        $printing_3D=$request->printing_3D;
        $PCB_printing=$request->PCB_printing;
        $girls_area=$request->girls_area;
        $smoking_area=$request->smoking_area;
        $cafeteria=$request->cafeteria;
        $cyber=$request->cyber;
        $wss = Searchy::search('workspaces')->fields('name::state::city::type::air_conditioning::private_rooms::data_show::wifi::laser_cutter::printing_3D::PCB_printing::girls_area::smoking_area::cafeteria::cyber')->query($name.'::'.$state.'::'.$city.'::'.$type.'::'.$air_conditioning.'::'.$private_rooms.'::'.$data_show.'::'.$wifi.'::'.$laser_cutter.'::'.$printing_3D.'::'.$PCB_printing.'::'.$girls_area.'::'.$smoking_area.'::'.$cafeteria.'::'.$cyber)->get();
        return response()->json($wss,200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function searchworkspace(Request $request)

    {
        $name=$request->name;
        $state=$request->state;
        $city=$request->city;
        $type=$request->type;
        $air_conditioning=$request->air_conditioning;
        $private_rooms=$request->private_rooms;
        $data_show=$request->data_show;
        $wifi=$request->wifi;
        $laser_cutter=$request->laser_cutter;
        $printing_3D=$request->printing_3D;
        $PCB_printing=$request->PCB_printing;
        $girls_area=$request->girls_area;
        $smoking_area=$request->smoking_area;
        $cafeteria=$request->cafeteria;
        $cyber=$request->cyber;
        $wss = Searchy::search('workspaces')->fields('name::state::city::type::air_conditioning::private_rooms::data_show::wifi::laser_cutter::printing_3D::PCB_printing::girls_area::smoking_area::cafeteria::cyber')->query($name.'::'.$state.'::'.$city.'::'.$type.'::'.$air_conditioning.'::'.$private_rooms.'::'.$data_show.'::'.$wifi.'::'.$laser_cutter.'::'.$printing_3D.'::'.$PCB_printing.'::'.$girls_area.'::'.$smoking_area.'::'.$cafeteria.'::'.$cyber)->select('id','name','logo','rate')->get();
        return response()->json($wss,200);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = Workspace::where('id','=',$id)->firstOrFail();
        $response = [
            'workspace' => $workspace,
        ];

        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$request)
    {
        Workspace::updatews($id,$request);
        return response(["msg"=>"updated successfully"],200);

    }
}
