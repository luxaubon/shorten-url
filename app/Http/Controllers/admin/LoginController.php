<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{

    public function store(){
    	if(! Auth()->attempt(request(['email','password']))){
            return back()->withErrors([
    			'message' =>'LOGIN FILD'
    		]);
    	}
        return redirect(env('BASE_URL_DOMAIN').'/admin/dashboard/index');
    }
    public function destroy(){
    	auth()->logout();
    	return view('admin.login');
    }

}
