<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{

    // Login is not required to go to original link by short link.
    // Anyone having short link, can be access original long link.

    public function show($code)
    {
        $links = ShortLink::where('short_codes',$code)->first();

        $long_link = $links->long_links;

        return redirect($long_link);


    }


}
