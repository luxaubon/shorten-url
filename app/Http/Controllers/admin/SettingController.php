<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use Auth;
use Illuminate\Support\Facades\File as LaraFile;

class SettingController extends Controller
{
    //

    public function __construct(){

        //$this->middleware('auth');
       //$this->middleware('auth',['except'=>['store']]);

    }
    public function folder(){return 'setting';}

    public function index(){

     	$pages = Setting::find(1);
        $data = array(
            'pages' => $pages,
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);


    }

    public function edit(Request $request){

     $post = Setting::find(1);
     $address_th[] =  array(
                    'company_th' =>  (mysql_escape(stripslashes($request->company_th))),
                    'address_th' =>  (mysql_escape(stripslashes($request->address_th))),
                    'tel_th' =>  (mysql_escape(stripslashes($request->tel_th))),
                    'fax_th' =>  (mysql_escape(stripslashes($request->fax_th))),
                    'phone_th' =>  (mysql_escape(stripslashes($request->phone_th))),
                    'ifram_th' =>  (mysql_escape(stripslashes($request->ifram_th))),
                );
    $address_en[] =  array(
                    'company_en' =>  (mysql_escape(stripslashes($request->company_en))),
                    'address_en' =>  (mysql_escape(stripslashes($request->address_en))),
                    'tel_en' =>  (mysql_escape(stripslashes($request->tel_en))),
                    'fax_en' =>  (mysql_escape(stripslashes($request->fax_en))),
                    'phone_en' =>  (mysql_escape(stripslashes($request->phone_en))),
                    'ifram_en' =>  (mysql_escape(stripslashes($request->ifram_en))),
                ); 
    $email[] = array(
                    'email' =>  (mysql_escape(stripslashes($request->email))),
                    'host' =>  (mysql_escape(stripslashes($request->host))),
                    'user' =>  (mysql_escape(stripslashes($request->user))),
                    'password' =>  (mysql_escape(stripslashes($request->password))),
                    'port' =>  (mysql_escape(stripslashes($request->port))),
                    'secure' =>  (mysql_escape(stripslashes($request->secure))),
                );
    $social[] = array(
                    'fb' =>  (mysql_escape(stripslashes($request->fb))),
                    'ig' =>  (mysql_escape(stripslashes($request->ig))),
                    'gg' =>  (mysql_escape(stripslashes($request->gg))),
                    'yt' =>  (mysql_escape(stripslashes($request->yt))),
                    'twt' =>  (mysql_escape(stripslashes($request->twt))),
                    'line' =>  (mysql_escape(stripslashes($request->line))),
                    'tiktok' =>  (mysql_escape(stripslashes($request->tiktok))),
                );
    $payment[] = array(
                    'pompay' =>  (mysql_escape(stripslashes($request->pompay))),
                    'opk' =>  (mysql_escape(stripslashes($request->opk))),
                    'osk' =>  (mysql_escape(stripslashes($request->osk))),
                    'merchant_id' =>  (mysql_escape(stripslashes($request->merchant_id))),
                    'secret_key' =>  (mysql_escape(stripslashes($request->secret_key))),
                    'payment_url' =>  (mysql_escape(stripslashes($request->payment_url))),
                );
    $seo[] = array(
                    'fb_id' =>  (mysql_escape(stripslashes($request->fb_id))),
                    'title' =>  (mysql_escape(stripslashes($request->title))),
                    'keyword' =>  (mysql_escape(stripslashes($request->keyword))),
                    'description' =>  (mysql_escape(stripslashes($request->description))),
                    'script_gg' =>  (stripslashes($request->script_gg)),
                );

    if ($request->hasFile('imagefb')) {

        $request->validate([
            'imagefb' => 'required|file|mimetypes:image/jpeg,image/png,application/pdf',
        ]);
        $file = $request->file('imagefb');
        $fileExtension = $file->getClientOriginalExtension();

        if (in_array($fileExtension, ['jpeg', 'jpg', 'png'])) {
            if($post->imagefb){
                @LaraFile::delete("images/".$post->imagefb);
            }
            $slidename = 'imagefb'.date('dym').time().'.'.$request->imagefb->getClientOriginalExtension();
            $slide = $request->imagefb->move('images/',$slidename);
            $post->imagefb = $slidename;
        }else {
            return back()->withErrors([
                'message' =>'UPLOAD FAIL'
            ]);
        }

    }

    if ($request->hasFile('image')) {

        $request->validate([
            'image' => 'required|file|mimetypes:image/jpeg,image/png,application/pdf',
        ]);
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension();

        if (in_array($fileExtension, ['jpeg', 'jpg', 'png'])) {
            if($post->image){
                LaraFile::delete("images/".$post->image);
            }
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('images/',$filename);
            $post->image = $filename;
        }else{
            return back()->withErrors([
                'message' =>'UPLOAD FAIL'
            ]);
        }

    }

    $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
    $post->email = json_encode($email,JSON_UNESCAPED_UNICODE);
    $post->social = json_encode($social,JSON_UNESCAPED_UNICODE);
    $post->address_th = json_encode($address_th,JSON_UNESCAPED_UNICODE);
    $post->address_en = json_encode($address_en,JSON_UNESCAPED_UNICODE);
    $post->payment = json_encode($payment,JSON_UNESCAPED_UNICODE);
    $post->save();  
    }

    


}
