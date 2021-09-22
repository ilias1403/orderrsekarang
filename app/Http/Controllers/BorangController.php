<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Borang;
use App\Providers\Agent;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BorangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borang = DB::table('customers')->get();
   
        return view('borang/index', compact('borang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function show(Borang $borang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function edit(Borang $borang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borang $borang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borang $borang)
    {
        //
    }

    public function getOS($user_agent=NULL) 
    {
        if($user_agent)
        {
            $os_array =   array(
                    '/windows nt 10/i'     =>  'Windows 10',
                    '/windows nt 6.3/i'     =>  'Windows 8.1',
                    '/windows nt 6.2/i'     =>  'Windows 8',
                    '/windows nt 6.1/i'     =>  'Windows 7',
                    '/windows nt 6.0/i'     =>  'Windows Vista',
                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                    '/windows nt 5.1/i'     =>  'Windows XP',
                    '/windows xp/i'         =>  'Windows XP',
                    '/windows nt 5.0/i'     =>  'Windows 2000',
                    '/windows me/i'         =>  'Windows ME',
                    '/win98/i'              =>  'Windows 98',
                    '/win95/i'              =>  'Windows 95',
                    '/win16/i'              =>  'Windows 3.11',
                    '/macintosh|mac os x/i' =>  'Mac OS X',
                    '/mac_powerpc/i'        =>  'Mac OS 9',
                    '/linux/i'              =>  'Linux',
                    '/ubuntu/i'             =>  'Ubuntu',
                    '/iphone/i'             =>  'iPhone',
                    '/ipod/i'               =>  'iPod',
                    '/ipad/i'               =>  'iPad',
                    '/android/i'            =>  'Android',
                    '/blackberry/i'         =>  'BlackBerry',
                    '/webos/i'              =>  'Mobile'
                );
                foreach ($os_array as $regex => $value) 
                { 
                    if (preg_match($regex, $user_agent)) 
                    {
                        $os_platform    =   $value;
                    }
                } 
        }
        else
        {
            $os_platform = NULL;
        }
        return $os_platform;
    }

    public function url($code)
    {
        if(isset($code))
        {
            $find = DB::table('customers')->where('phone_number', $code)->first();
        }
        else
        {
            $find = '';
        }

        // dd($find);
        return $this->borang($find);
    }

    public function borang($data)
    {
        $borang = $data;

        return view('borang/borang_pesanan', compact('borang'));
    }

    public function send_borang(Request $request)
    {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os = $this->getOS($user_agent);

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['postcode'] = $request->postcode;
        $data['city'] = $request->city;
        $data['state'] = $request->sate;
        $data['country'] = $request->country;
        $data['set_code'] = $request->set_code;

        $info_pakej = DB::table('setcode')->select('*')->where('set_code',$data['set_code'])->first();
        // dd($info_pakej);

        $text = '*OrderrSekarang*'.PHP_EOL
        .'-------------------------------------'.PHP_EOL
        .'-*(1x)* Olive Tin - '.$info_pakej->package_name.PHP_EOL.PHP_EOL
        .'*Nama:* '.$data['name'].PHP_EOL.PHP_EOL
        .'*Number Telefon:* '.$data['phone'].PHP_EOL.PHP_EOL
        .'*Alamat:* '.PHP_EOL
        .$data['address'].PHP_EOL
        .$data['postcode'].PHP_EOL
        .$data['city'].PHP_EOL
        .$data['state'].''.$data['country'].PHP_EOL
        .'-------------------------------------'.PHP_EOL
        .'*Jumlah:* RM '.$info_pakej->price.PHP_EOL.PHP_EOL
        .'Terima kasih';

        $text_2 = urlencode($text);

        $phone = '0135224660';

        if(in_array($os,array('Android','iPhone','Blackberry','Mobile'))) 
        {

            $url="whatsapp://send?text=$text_2&phone=+6$phone";
    
            header("refresh:0; url=$url");
            die();

        }
        else
        { 
            
            $url="https://web.whatsapp.com/send?text=$text_2&phone=+6$phone";
            $url_v2=str_replace(PHP_EOL, '', $url);
            
            header("refresh:0; url=$url");
            die();
        }
    }
}
