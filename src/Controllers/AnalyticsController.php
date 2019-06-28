<?php

namespace CungHocVui\Analytics\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnalyticsController extends Controller
{
    //
    public function index(){
        $rows = \GACungHocVui::analysisPagePath();
        return view('analytics::index', ['rows' => $rows]);
    }
    
    public function postSearch(Request $request){
        $validator = Validator::make($request->all(), [
            'pathPage' => 'required'
        ]);
        if ($validator->fails()){
            return redirect()->back()->with('info', 'Please type path into input');
        }
        $path = $request->input('pathPage');
        if (strpos($path, 'https://cunghocvui.com') === 0){
            $path = substr($path, 22, strlen($path));
        }
        $rows = \GACungHocVui::searchPageWeek($path);
        return view('analytics::index', ['rows' => $rows]);
    }
}
