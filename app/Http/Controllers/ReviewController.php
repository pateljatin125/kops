<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Twilio\Rest\Client;
use Validator;
use Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
    }

    public function postreview($id)
    {
        $id = Crypt::decryptString($id);
        $reviewrequest = DB::table('review_requests')
            ->where('id', '=', $id)
            ->get();
        
        return view('postreview', ['reviewrequest' => $reviewrequest,'requestId' => $id ]);
    }
    public function reviewposting($id)
    {
        $reviewrequest = DB::table('review_requests')
            ->where('token', '=', $id)
            ->get();
        foreach($reviewrequest as $reviewrequestval)
        {
            $request_link = $reviewrequestval->request_link;
        }
        //$requestLink = $reviewrequest->request_link;    
        if($request_link!="")
        {
            header("location:".$request_link);
        }
        else
        {
            echo "Something wrong with the link! try again later";
        }
        
    }
    public function submitreview(Request $request)
    {
        $data['requestId'] = $request->Input('requestId');
        $request_from = $request->Input('request_from');
        $data['review'] = $request->Input('review');
        $rating = $request->Input('rating');
        $averagestars = $request->Input('averagestars');
        $data['rating'] = serialize($rating);
        $totalstars = 0;
        $ratingCount = sizeof($rating);
        foreach($rating as $key=>$val)
        {
            $totalstars = $totalstars + $val;
        }
        
        $averagegivenstars = ceil($totalstars/$ratingCount);

        $reviewformdata = DB::table('review_form')->where( "designed_by",$request_from )->get()->first();
		$data['pattern'] = $reviewformdata->formelements;

        $redirectUrl = $request->Input('redirectUrl');
        if (!empty($data)) {
            $lastId = DB::table('reviews')->insertGetId($data);
        }
        
        $dataUpdate = array( "review_status" => '1' );
                DB::table('review_requests')
                ->where('id', '=', $data['requestId'])
                ->update($dataUpdate);
                
        if($averagegivenstars >= $averagestars)
        { ?>
            <script>
              alert("Thanks for your comment! Please give us review on google!");
              window.location = "<?php echo $redirectUrl;?>";
            </script>
        <?php //return Redirect::to($redirectUrl); 
        }
        else{ ?>
            <script>
              alert("Thanks for your attention! Please visit our store again!");
            </script>
       <?php echo "<div style='font-weight:bold;font-size:20px;background-color:black;color:white;padding:20px 10px'>You can close this wondow now ! thanks ! </div>"; } 
      
       
                
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userId = Auth::id();
        $data['request_from'] = $userId;
        $this->userMail = $request->Input('email');
        $data['request_email'] = $request->Input('email');
        $data['request_phone'] = $request->Input('phone');
        if (!empty($data)) {
            $lastId = DB::table('review_requests')->insertGetId($data);
            if($lastId!="")
            {
                $entryId = $lastId;
                $lastId = Crypt::encryptString($lastId);
                $requestToken = Crypt::encryptString( $data['request_from'] );
                $linkurl = env('APP_URL')."postreview/".$lastId."?token=".$requestToken;
                //DB::enableQueryLog();
                $randomGenerator = $this->generateRandomString($entryId);
                $linkmessage = env('APP_URL')."reviewposting/".$randomGenerator;
                $dataUpdate = array( "request_link" => $linkurl,"token"=>$randomGenerator );
                DB::table('review_requests')
                ->where('id', '=', $entryId)
                ->update($dataUpdate);
                //dd(DB::getQueryLog());


                $dataview = array('link'=>$linkurl);
                if($this->userMail!="slsklsk") {
                    // Mail::send('emails.requestreview', $dataview, function($message) {
                    //     $message->to( $this->userMail, 'Dalliance Motors')->subject
                    //         ('Thanks for Visting Us!');
                    //     $message->from('gaurav@shardainfosys.com','Dalliance Motors');
                    // });
                }

                if($data['request_phone'] != "") {
                    $this->sendSmsexpert( $data['request_phone'] ,$linkmessage );
                }
                echo "Review request sent to customer!";

            }
            else{
                echo "Some problem with the request!!";

            }
            
        }
    }

    public function generateRandomString($lastId,$length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomString .= $lastId;
        return $randomString;
    }

    public function sendSmsexpert($phone,$link)
    {
        $userId = Auth::id();
        $reviewformdata = DB::table('review_form')->where( "designed_by",$userId )->get()->first();
        $message = $reviewformdata->message;
        if($message)
        {
            $msgtext = str_replace("##link##",$link,$message);
        }
        else
        {
            $msgtext = 'Thanks for visitng us! Please review us for our service, Click on the link below for posting '.$link;
        }
         // Base URLS for three methods
        $base_url_SendSMS = 'https://www.experttexting.com/ExptRestApi/sms/json/Message/Send';
        $base_url_QueryBalance = 'https://www.experttexting.com/ExptRestApi/sms/json/Account/Balance?';

        // Public Variables that are used as parameters in API calls
        $username = 'shardaInfosysIT';
        $password = 'Shardainfosys@123';
        $apikey = '945zzhdu77b42zg';
        $from = 'DEFAULT';	// USE DEFAULT IN MOST CASES, CONTACT SUPPORT FOR FURTHER DETAILS>
        $to = $phone;		// LET THIS REMAIN BLANK
        

        $fieldcnt    = 6;
        $fieldstring = "username=$username&password=$password&api_key=$apikey&FROM=$from&to=$to&text=$msgtext";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url_SendSMS);
        curl_setopt($ch, CURLOPT_POST, $fieldcnt);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldstring);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        $err = curl_error($ch);
        // print_r($err);
        // print_r($res);
        // die;
        curl_close($ch);
        return true;

    }
    public function sendSms( $phone,$link )
    {
        $link = "https://www.google.com/";
        $msg = "Thanks for visitng us! Please review us for our service, Click on the link below for posting:  ".
       // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );

           $numbers_in_arrays = explode( ',' , $phone );

           $message = $msg;
           $count = 0;

           foreach( $numbers_in_arrays as $number )
           {
               $count++;

               $client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_FROM' ),
                       'body' => $message,
                   ]
               );
           }
           return true;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reviewrequestssent()
    {
        $userId = Auth::id();
        //DB::enableQueryLog();
        $reviewrequestssent = DB::table('review_requests')->where( "request_from",$userId )->orderBy('id', 'DESC')->paginate(50);
        //dd(DB::getQueryLog());
        return view('reviewrequestsent', ['reviewrequestssent' => $reviewrequestssent]);
    }
    public function reviewsgiven()
    {
        $userId = Auth::id();
        //DB::enableQueryLog();
        $reviewsgiven = DB::table('reviews as r')
        ->select('r.*','rr.request_phone','rr.request_email')
        ->join('review_requests as rr','r.requestId','=','rr.id')
        ->where( "rr.request_from",$userId )
        ->paginate(50);
        //dd(DB::getQueryLog());
        return view('reviewsgiven', ['reviewsgiven' => $reviewsgiven]);
    }
    public function managereviewform()
    {
        $userId = Auth::id();
        $reviewformdata = DB::table('review_form')->where( "designed_by",$userId )->get()->first();
        //dd(DB::getQueryLog());
        return view('buildreviewform', ['reviewformdata' => $reviewformdata]);
    }
    public function submitreviewformbuildblocks(Request $request)
    {
        $designed_by = Auth::id();

        $data['message'] = $request->input('message');
        $data['averagestars'] = $request->input('averagestars');
        $data['formelements'] = $request->input('formelements');
        $data['designed_by'] = $designed_by;

        $desingedby = $request->input('designed_by');
        if($desingedby!="")
        {
            if (!empty($data)) {
                DB::table('review_form')
                ->where('designed_by', '=', $designed_by)
                ->update($data);
            }
        }
        else{
            if (!empty($data)) {
                $lastId = DB::table('review_form')->insertGetId($data);
            }
        }
        return $this->managereviewform();
    }
}
