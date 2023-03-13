<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    //
    public function get_comment(Request $request, $page)
    {
        $page = Page::find($page);
        $page->timelabels();

        foreach($page->timelabels() as $value) {
            // 
        }
        return response()->json([

        ]);
    }
}
