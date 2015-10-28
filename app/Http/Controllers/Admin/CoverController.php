<?php

namespace Netcafe\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Netcafe\Http\Requests;
use Netcafe\Http\Controllers\Controller;

use Netcafe\Http\Requests\CoverCreateRequest;
use Netcafe\Http\Requests\CoverUpdateRequest;
use Netcafe\Models\Cover;

use Intervention\Image\Facades\Image;

class CoverController extends Controller
{
    protected $fields = [
                'name'          => '',
                'title'         => '',
                'subtitle'      => '',
                'link'          => '',
                'linktitle'     => '',
                'active'        => '0',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $covers = Cover::all();

        return view('admin.cover.index')
                    ->withCovers($covers);
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

        return view('admin.cover.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CoverCreateRequest $request)
    {
        //
        $cover = new Cover();
        foreach (array_keys($this->fields) as $field) {
            $cover->$field = $request->get($field);
        }

        if($request->hasFile('imageUploader')) {
            try  {
                $image          =   $request->file('imageUploader');
                $extension      =   $image->getClientOriginalExtension();
                $imageRealPath  =   $image->getRealPath();
                $imageName      =   $cover->id . '_'. $image->getClientOriginalName();
                
                //$imageManager = new ImageManager(); // use this if you don't want facade style code
                //$img = $imageManager->make($imageRealPath);
                
                $img = Image::make($imageRealPath);
                $img->fit(1600, 750)
                    ->encode('jpg', 75)
                    ->save(public_path('images'). '/uploads/slider/'. $imageName)
                    ->destroy();
                $cover->name = $imageName;
                $cover->save();
            } catch(Exception $e) {
                return false;
            }
        }
        $cover->save();

        return redirect('/admin/cover')
            ->withSuccess("The cover '$cover->title' was created.");
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
        $cover = Cover::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $cover->$field);
        }

        return view('admin.cover.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CoverUpdateRequest $request, $id)
    {
        //
        $cover = Cover::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['cover'])) as $field) {
            $cover->$field = $request->get($field);
        }
        if($request->hasFile('imageUploader')) {
            try  {
                $image          =   $request->file('imageUploader');
                $extension      =   $image->getClientOriginalExtension();
                $imageRealPath  =   $image->getRealPath();
                $imageName      =   $cover->id . '_'. $image->getClientOriginalName();
                
                //$imageManager = new ImageManager(); // use this if you don't want facade style code
                //$img = $imageManager->make($imageRealPath);
                
                $img = Image::make($imageRealPath);
                $img->fit(1600, 750)
                    ->encode('jpg', 75)
                    ->save(public_path('images'). '/uploads/slider/'. $imageName)
                    ->destroy();
                $cover->name = $imageName;
                $cover->save();
            } catch(Exception $e) {
                return false;
            }
        }

        $cover->save();

        return redirect("/admin/cover/$id/edit")
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
        $cover = Cover::findOrFail($id);
        $cover->delete();

        return redirect('/admin/cover')
            ->withSuccess("The '$cover->title' cover has been deleted.");
    }
}
