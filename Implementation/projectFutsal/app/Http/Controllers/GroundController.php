<?php

namespace App\Http\Controllers;
use App\Ground;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class GroundController extends Controller
{
    protected $image_dir = "uploads/grounds";

    public function index()
    {
        $grounds = Ground::query();
        $grounds = $grounds->get();
        return view('admins.viewGround', [
            'grounds' => $grounds
        ]);
       
    }

    public function create()
    {
        return view('admins.addGround');
    }

    public function uploadFile($file, $dir)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = md5(time()) . '.' . $file_extension;
        $file->move($dir, $file_name);
        return $file_name;
    }
    public function store()
    {
        /** validate your form fields */
        $this->validate(request(), [
            'ground' => 'required | max:150',
            'image' => 'nullable|image|max:2048'
        ], [
            'ground.required' => 'Ground Name is required'
        ]);

        $req = request();
        $form_req = $req->all();
        $ground = new Ground();

        if (request()->hasFile('image')) {
            $file_name = $this->uploadFile(request()->file('image'), $this->image_dir);
            $ground->image = $file_name;
        }

        $ground->ground = $form_req['ground'];
        $status = $ground->save();
        return redirect()->to('viewGround')->withSuccess('New Ground successfully added');
    }

    public function edit($id)
    {
        $ground = Ground::find($id);
        // if (!$ground) {
        //     return redirect()->back();
        // }
        // return view('admins.editGround', [
        //     'ground' => $ground
        // ]);
            return view('admins.editGround')->with('ground',$ground);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ground' => 'required|max:150',
            'image' => 'nullable|image|max:2048'
        ]);

        $ground = Ground::find($id);

        if ($request->hasFile('image')) {
            if ($ground->image && app('files')->exists($this->image_dir . '/' . $ground->image)) {
                app('files')->delete($this->image_dir . '/' . $ground->image);
            }

            $file_name = $this->uploadFile($request->file('image'), $this->image_dir);
            $ground->image = $file_name;

        }

        $form_req = $request->all();

        $ground->ground = $form_req['ground'];
        
        $status = $ground->save();
        return redirect()->to('viewGround')->withSuccess('Ground successfully updated');
    }

    public function destroy($id)
    {
        $ground = Ground::find($id);
        if ($ground->image && app('files')->exists($this->image_dir . '/' . $ground->image)) {
            app('files')->delete($this->image_dir . '/' . $ground->image);
        }
        $ground->delete();
        return redirect()->to('/viewGround')->withSuccess('Ground successfully deleted');

    }

}
