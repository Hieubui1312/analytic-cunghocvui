<?php

namespace CungHocVui\Analytics\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    //
    public function index(){
        $rows = \GACungHocVui::analysisPagePath();
        return view('analytics::index', ['rows' => $rows]);
    }

    public function search(){
        $result = \GACungHocVui::searchPagePath('/bai-viet/6-meo-nho-nhanh-cac-cong-thuc-luong-giac-hieu-qua-nhat-cunghocvui-com.html');
        dd($result);
    }

    public function postSearch(Request $request){
        $path = $request->input('pathPage');
        $rows = \GACungHocVui::searchPagePath($path);
        return view('analytics::index', ['rows' => $rows]);
    }
}
