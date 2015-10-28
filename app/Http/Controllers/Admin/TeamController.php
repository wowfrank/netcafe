<?php

namespace Netcafe\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Netcafe\Http\Requests;
use Netcafe\Http\Controllers\Controller;

use Netcafe\Models\Team;
use Netcafe\Http\Requests\TeamCreateRequest;
use Netcafe\Http\Requests\TeamUpdateRequest;

use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    protected $fields = [
                'name'      => '',
                'nickname'  => '',
                'imgname'   => '',
                'phone'     => '',
                'duty'      => '',
                'dob'       => '',
                'gender'    => '0',
                'weibo'     => '',
                'qq'        => '',
                'wechat'    => '',
                'education' => '',
                'status'    => '0',

    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $teams = Team::all();

        return view('admin.team.index')
                    ->withTeams($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.team.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TeamCreateRequest $request)
    {
        //
        $team = new Team();
        foreach (array_keys($this->fields) as $field) {
            $team->$field = $request->get($field);
        }
        
        if($request->hasFile('imageUploader')) {
            try  {
                $image          =   $request->file('imageUploader');
                $extension      =   $image->getClientOriginalExtension();
                $imageRealPath  =   $image->getRealPath();
                $imageName      =   $team->id . '_'. $image->getClientOriginalName();
                
                //$imageManager = new ImageManager(); // use this if you don't want facade style code
                //$img = $imageManager->make($imageRealPath);
                
                $img = Image::make($imageRealPath);
                $img->fit(500, 500)
                    ->encode('jpg', 75)
                    ->save(public_path('images'). '/uploads/team/'. $imageName)
                    ->destroy();

                $team->imgname = $imageName;
            } catch(Exception $e) {
                return false;
            }
        }

        $team->save();

        return redirect('/admin/team')
            ->withSuccess("The team '$team->name' was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $team = Team::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $team->$field);
        }

        return view('admin.team.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TeamUpdateRequest $request, $id)
    {
        //
        $team = Team::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['team'])) as $field) {
            $team->$field = $request->get($field);
        }
        if($request->hasFile('imageUploader')) {
            try  {
                $image          =   $request->file('imageUploader');
                $extension      =   $image->getClientOriginalExtension();
                $imageRealPath  =   $image->getRealPath();
                $imageName      =   $team->id . '_'. $image->getClientOriginalName();
                
                //$imageManager = new ImageManager(); // use this if you don't want facade style code
                //$img = $imageManager->make($imageRealPath);
                
                $img = Image::make($imageRealPath);
                $img->fit(500, 500)
                    ->encode('jpg', 75)
                    ->save(public_path('images'). '/uploads/team/'. $imageName)
                    ->destroy();
                $team->imgname = $imageName;
            } catch(Exception $e) {
                return false;
            }
        }

        $team->save();

        return redirect("/admin/team/$id/edit")
            ->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect('/admin/team')
            ->withSuccess("The '$team->title' team has been deleted.");
    }
}
