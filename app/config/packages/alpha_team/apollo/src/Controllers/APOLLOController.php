<?php
namespace Alpha_team\APOLLO\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class APOLLOController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('weight') && $request->has('high')) {
            $weight = $request->get('weight');
            $high = $request->get('high');
            $apollo = round($weight / ($high * $high),1);
        }
        return view('apollo::index', compact('apollo'));
    }
}