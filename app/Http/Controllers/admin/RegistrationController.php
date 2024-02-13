<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as LaraFile;

class RegistrationController extends Controller
{
    //


   /* public function index()
    {
        $data = array(
                'alert' => ''
        );
        return view('admin.dashboard.register',$data);
    }*/

    public function folder(){return 'dashboard';}
    public function status(){return '1';}
    public function index()
    {
        $member = Auth::user();

        if($member->id == 1){
            $user = User::all()->where('is_admin',$this->status());
        }else{
            $user = User::where('id',$member->id)->get();
        }

        $data = array(
            'user' => $user,
            'user_id' => '',
            'folder' => $this->folder(),
            'alert' => ''
        );

        return view('admin.'.$this->folder().'.listadmin',$data);
    }


    public function show($id)
    {
        $user_id = User::findOrFail($id);
        $user = User::all()->where('is_admin',$this->status());

        $data = array(
            'user_id' => $user_id,
            'user' => $user,
            'folder' => $this->folder(),
            'alert' => ''
         );
        return view('admin.'.$this->folder().'.listadmin',$data);
    }

    public function edit(Request $request){

        $this->validate(request(), [
                'name' => 'required',

                'lname' => 'required',
            ]);
        $post = User::find($request->id);

        if ($request->password != '') {
             $this->validate(request(), [
                'password' => 'required|string|min:6|confirmed'
            ]);
            $post->password = Hash::make(request()->password);
        }
        if ($request->hasFile('image')) {
            LaraFile::delete("images/".$post->image);
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('images/',$filename);
            $post->image = $filename;
        }

        $post->name = $request->name;
        $post->lname = $request->lname;
        $post->save();


        $user = User::all()->where('is_admin',$this->status());
        $data = array(
            'user' => $user,
            'user_id' => '',
            'folder' => $this->folder(),
            'alert' => ''
        );
        return redirect()->back();
    }
    
    public function del_content(Request $request){
        $page = User::find($request->numrow);
        if ($page->image) {
            LaraFile::delete("images/".$page->image);
        }
        // DELETE DATABSE
        $page->delete();
    }


    public function store(Request $request){

           // dd(request()->all());
           $this->validate(request(), [
                'name' => 'required',

                'lname' => 'required',

                'email' => 'required|string|email|max:255|unique:users|confirmed',

                'password' => 'required|string|min:6|confirmed'
            ]);

            if ($request->hasFile('image')) {
                $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move('images/',$filename);
            }else{ $filename = '';}

            $post = new User;
            $post->name = $request->name;
            $post->lname = $request->lname;
            $post->email = $request->email;
            $post->password = Hash::make($request->password);
            $post->is_admin = User::ADMIN_TYPE;
            $post->image = $filename;
            $post->save();

            $user = User::all()->where('is_admin',$this->status());
            $data = array(
                'alert' => 'alert',
                'user' => $user,
                'user_id' => '',
                'folder' => $this->folder(),
                'alert' => 'alert'
            );
            return view('admin.'.$this->folder().'.listadmin',$data);

            //\Mail::to($user)->send(new WelcomeAgain($user));
	    }



}
