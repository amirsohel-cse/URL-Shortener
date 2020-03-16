<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

     public function store(Request $request)
     {
         $request->validate([
             'link' => 'required|url'
         ]);

         $store = new ShortLink();
         $store->long_links = $request->link;
         $store->short_codes = $this->random_strings(10);
         $code=$store->short_codes;

         $store->save();

         Session::flash('success',"Hurrah ! Link Generated Successfully :)");
         return redirect()->back()->with('code',$code);

     }

    function random_strings($length_of_string)
    {
        // Alphanumeric Characters with Lowercase and number only

        $str_result = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result),
            0, $length_of_string);
    }
}
