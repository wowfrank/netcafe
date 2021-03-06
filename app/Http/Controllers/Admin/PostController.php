<?php

namespace Netcafe\Http\Controllers\Admin;

use Netcafe\Models\Posts;
use Netcafe\User;
use Redirect;

use Netcafe\Http\Redirect\PostFormRequest;
use Netcafe\Http\Requests\PostCreateRequest;
use Netcafe\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;

use Netcafe\Http\Requests;
use Netcafe\Http\Controllers\Controller;
use Netcafe\Jobs\PostFormFields;

use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('admin.post.index')
                    ->withPosts(Posts::all());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // create a new post
        $data = $this->dispatch(new PostFormFields());

        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostCreateRequest $request)
    {
        //
        // $post = new Posts();
        // $post->title = $request->get('title');
        // $post->body = $request->get('body');
        // $post->slug = str_slug($post->title);
        // if($request->has('save')) {
        //     $post->active = 0;
        //     $message = 'Post saved successfully';   
        // } else {
        //     $post->active = 1;
        //     $message = 'Post published successfully';
        // }
        // $post->save();

        // return redirect('admin/post/'.$post->slug.'/edit/')->withMessage($message);
        $post = Posts::create($request->postFillData());
        if($request->hasFile('imageUploader')) {
            try  {
                $image          =   $request->file('imageUploader');
                $extension      =   $image->getClientOriginalExtension();
                $imageRealPath  =   $image->getRealPath();
                $imageName      =   $post->id . '_'. $image->getClientOriginalName();
                
                //$imageManager = new ImageManager(); // use this if you don't want facade style code
                //$img = $imageManager->make($imageRealPath);
                
                $img = Image::make($imageRealPath);
                $img->fit(600, 600)
                    ->encode('jpg', 75)
                    ->save(public_path('images'). '/uploads/gallery/'. $imageName)
                    ->destroy();
                $post->page_image = $imageName;
                $post->save();
            } catch(Exception $e) {
                return false;
            }
        }
        $post->syncTags($request->get('tags', []));

        return redirect()
                ->route('admin.post.index')
                ->withSuccess('New Post Successfully Created.');
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
        // $post = Posts::where('slug', $slug)->first();
        // if($post)
        //     return view('admin.post.edit')->with('post', $post);
        // else
        //     return redirect('/admin/post/'.$post->slug.'/edit/')->withErrors('you have not sufficient permissions');

        $data = $this->dispatch(new PostFormFields($id));

        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Posts::findOrFail($id);

        $post->fill($request->postFillData());
        if($request->hasFile('imageUploader')) {
            try  {
                $image          =   $request->file('imageUploader');
                $extension      =   $image->getClientOriginalExtension();
                $imageRealPath  =   $image->getRealPath();
                $imageName      =   $post->id . '_'. $image->getClientOriginalName();
                
                //$imageManager = new ImageManager(); // use this if you don't want facade style code
                //$img = $imageManager->make($imageRealPath);
                
                $img = Image::make($imageRealPath);
                $img->fit(600, 600)
                    ->encode('jpg', 75)
                    ->save(public_path('images'). '/uploads/gallery/'. $imageName)
                    ->destroy();
                $post->page_image = $imageName;
            } catch(Exception $e) {
                return false;
            }
        }

        $post->save();
        $post->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Post saved.');
        }

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('Post saved.');
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
        $post = Posts::findOrFail($id);
        if($post) {
            $post->tags()->detach();
            $post->delete();
            $data['message'] = 'Post deleted Successfully';
        } else {
            $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
        }

        return redirect('/admin/post/')->with($data);
        return redirect()
                    ->route('admin.post.index')
                    ->withSuccess('Post deleted.');
    }
}
