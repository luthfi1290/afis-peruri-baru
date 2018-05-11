<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\MacAddress as MacModel;
use Afis;

class PageController extends Controller
{
    /**
     * halaman login Afis
     */
    public function halLoginAfis(){      

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
                        return view('login.login-afis');
                        break;
                    case '1':
                        return view('errors.404');
                        break;                    
                }
            }
        } catch (\Exception $e){
            \Log::info($e->messages());
            return response()->json(['error'=>$e->messages(),'success' => false]);
        }  
        
    }

    /**
     * halama login photo extractor
     */
    public function halLoginPhotoExtractor(){

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
                        return view('errors.404');
                        break;
                    case '1':
                        return view('login.login-photo-extractor');                        
                        break;                    
                }
            }
        } catch (\Exception $e){
            \Log::info($e->messages());
            return response()->json(['error'=>$e->messages(),'success' => false]);
        }
        
    }

    /**
     * dashboard Photo Extractor
     */

    public function dashboardPhoto(){
        return 'haiii';
    }
}
