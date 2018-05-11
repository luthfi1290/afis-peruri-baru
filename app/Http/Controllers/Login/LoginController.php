<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MacAddress as MacModel;
use App\UserPhoto as UserPhotoModel;
use App\User as UserModel;
use Afis,Session,Hash,Auth;

class LoginController extends Controller
{
    /**
     * mengarahkan pada hal login masing masing sesuai database
     */
    public function tujuanLogin(){
        
        try {
            // check mac address pada database
            $mac_windows = Afis::macAddressWindows();
            $cek_mac_address = MacModel::where('mac_address','=',$mac_windows)->first();

            //jika menemuka data pada database
            if($cek_mac_address != null){
                $tipe_akses = $cek_mac_address->tipe_akses;
                //filter berdasarkan tipe akses pada database
                switch($tipe_akses){
                    case '0':
                        return redirect()->route('afis.login');
                        break;
                    case '1':
                        return redirect()->route('photo.extractor.login');
                        break;                    
                }
            }
        } catch (\Exception $e){
            \Log::info($e->messages());
            return response()->json(['error'=>$e->messages(),'success' => false]);
        }
       
    }

    public function loginAfis(Request $request){
        // validasi form login
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->get('email');       
        $check_user = UserModel::where('email',$email)->first();
        
        if($check_user != null){
            //status aktif
            $status = $check_user->aktif;
            switch($status){
                case 0:
                    /**
                     * jika users sudah tidak aktif maka keluarkan error
                     */
                    Session::flash("error", [
                        "level"=>"danger",
                        "message"=>"Akun Anda Sudah Tidak Aktif !!"
                    ]);
                    return redirect()->back()->withInput($request->only('email', 'remember'));

                    break;
                case 1:
                    /**
                     * jika users masih aktif
                     */
                    //password
                    $password_input = $request->password;
                    $password_user = $check_user->password;
                    //pencocokan password
                    $matching_password = Hash::check($password_input,$password_user);

                    /**
                     * jika password cocok
                     */
                    if($matching_password){
                        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password,'aktif' => 1], $request->remember)) {
                            
                            return redirect()->intended(route('home'));
                        }
                    }else{
                        /**
                         * jika password tidak cocok maka beri pesan error
                         */
                        Session::flash("error", [
                            "level"=>"danger",
                            "message"=>"Password Anda Salah !!"
                        ]);
                        
                        return redirect()->back()->withInput($request->only('email', 'remember'));
                    }

                    break;
            }
        }else{
            /**
             * jika akun tidak ditemukan keluarkan pesan error
             */

            Session::flash("error", [
                "level"=>"danger",
                "message"=>"Akun Tidak Terdaftar !!"
            ]);

            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
        
    }

    public function loginPhotoExtractor(Request $request){
        // validasi form login
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->get('email');       
        $check_user = UserPhotoModel::where('email',$email)->first();
        if($check_user != null){
            //status aktif
            $status = $check_user->aktif;
            switch($status){
                case 0:
                    /**
                     * jika users sudah tidak aktif maka keluarkan error
                     */
                    Session::flash("error", [
                        "level"=>"danger",
                        "message"=>"Akun Anda Sudah Tidak Aktif !!"
                    ]);
                    return redirect()->back()->withInput($request->only('email', 'remember'));

                    break;
                case 1:
                    /**
                     * jika users masih aktif
                     */
                    //password
                    $password_input = $request->password;
                    $password_user = $check_user->password;
                    //pencocokan password
                    $matching_password = Hash::check($password_input,$password_user);

                    /**
                     * jika password cocok
                     */
                    if($matching_password){
                        if (Auth::guard('photo')->attempt(['email' => $request->email, 'password' => $request->password,'aktif' => 1], $request->remember)) {
                            
                            return redirect()->intended(route('dashboard.photo'));
                        }
                    }else{
                        /**
                         * jika password tidak cocok maka beri pesan error
                         */
                        Session::flash("error", [
                            "level"=>"danger",
                            "message"=>"Password Anda Salah !!"
                        ]);
                        
                        return redirect()->back()->withInput($request->only('email', 'remember'));
                    }

                    break;
            }
        }else{
            /**
             * jika akun tidak ditemukan keluarkan pesan error
             */

            Session::flash("error", [
                "level"=>"danger",
                "message"=>"Akun Tidak Terdaftar !!"
            ]);

            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
