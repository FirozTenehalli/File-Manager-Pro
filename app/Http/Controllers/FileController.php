<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use App\Files;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request all request parameter
     * 
     * @return String/Boolean file path or false
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,bmp,pdf,mp4,mp3']

        );
        $extention = $request->file('file')->getClientOriginalExtension();
        $name = $request->file('file')->getClientOriginalName();
        $user_id = auth()->user()->id;
        $category = GeneralHelper::getFileCategory($extention);
        $location = $request->file('file')->store($category."_".$user_id);
        $files = Files::store($user_id, $location, $name, $category);
        if(!empty($files)){
            return $location;
        }
        return false;
    }
    /**
     * This function delete the file.
     *
     * @param \Illuminate\Http\Request $id id of the file
     * 
     * @return String/Boolean file path or false
     */
    public function destroy($id)
    {
        $files = Files::find($id);
        $files->delete();
        return redirect()->back();
    }
}
