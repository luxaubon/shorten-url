<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Url;

use Auth;

use Illuminate\Support\Facades\File as LaraFile;

class UrlsController extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');

    }

    public function folder(){return 'url';}

    public function index()
    {
        $pages = Url::all();
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

     public function store(Request $request)
     {
    	//
    }

    public function show($id)
    {
       //
    }
    public function edit(Request $request)
    {
        //
    }

    public function del_content(Request $request){

        $page = Url::find($request->numrow);
        $page->delete();

    }

}
