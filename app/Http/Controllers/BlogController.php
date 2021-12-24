<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    public function index()
    {
        $blog=blog::get();
        return view('admin.frontend.master',compact('blog'));
    }


    //backend

    public function blogLogin()
    {
        $blog = blog::latest()->get();
        return view('admin.backend.pages.table', compact('blog'));
    }

    public function blogCreate()
    {
        return view('admin.backend.pages.form');
    }

    public function blogStore(Request $request)
    {
        $store = new blog;

        if ($request->hasfile('image_one')) {
            $file = $request->file('image_one');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $store->image_one = $filename;
        }
        if ($request->hasfile('image_big')) {
            $file = $request->file('image_big');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $store->image_big = $filename;
        }




        $store->title = $request->input('title');
        $store->description = $request->input('description');
        $store->save();

        return redirect()->route('blog.login');
    }

    public function blogEdit($id)
    {
        $edit = blog::where('id', $id)->first();
        return view('admin.backend.pages.edit', compact('edit'));
    }

    public function blogUpdate(Request $request)
    {

        $id = $request->id;
        $store = new blog;
        if ($request->hasfile('image_one')) {
            $destination = 'uploads/students/' . $store->image_one;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image_one');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $store->image_one = $filename;
        }
        if ($request->hasfile('image_big')) {
            $destination = 'uploads/students/' . $store->image_big;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image_big');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/students/', $filename);
            $store->image_big = $filename;
        }




        $store->title = $request->input('title');
        $store->description = $request->input('description');
        $store->update();

        return redirect()->route('blog.login');
    }

    public function blogDelete($id)
    {
        blog::where('id',$id)->delete();
        return redirect()->back();
    }
}
