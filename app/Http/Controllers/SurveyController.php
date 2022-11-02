<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        return view('create-survey');
    }
    public function details($id)
    {


        $q_1 = Survey::avg('q_1');
        $q_2 = Survey::avg('q_2');
        $q_3 = Survey::avg('q_3');
        $q_4 = Survey::avg('q_4');
        $q_5 = Survey::avg('q_5');
        $q_6 = Survey::avg('q_6');
        $q_7 = Survey::avg('q_7');
        $q_8 = Survey::avg('q_8');
        $q_9 = Survey::avg('q_9');
        $q_10 = Survey::avg('q_10');
        $surveyDetails = Survey::findORFail($id);

        return view('detail', compact('q_1', 'q_2', 'q_3', 'q_4', 'q_5', 'q_6', 'q_7', 'q_8', 'q_9', 'q_10', 'surveyDetails'));
    }

    public function store(Request $request)
    {
        $auth_id = Auth::id();
        $input = $request->all();
        $input['user_id'] = Auth::id();

        $id =  Survey::create($input)->id;
        $userDetails = User::findORFail($auth_id);
        $setData['survey_status'] = '1';
        $userDetails->fill($setData)->save();
        return redirect()->route('details', $id)->with('success', 'Successfully Added');
    }

    public function surveyList()
    {
        $myList =  Survey::where('user_id', Auth::id())->paginate(10);
        return view('my-serveyalllist', compact('myList'));
    }

    public function dashboard()
    {

        $today = Survey::where('user_id', Auth::id())->whereYear('created_at', '=', Carbon::now()->year)->count();
        $thisMonth = Survey::where('user_id', Auth::id())->whereMonth('created_at', '=', Carbon::now()->month)->count();
        $thisYear = Survey::where('user_id', Auth::id())->whereYear('created_at', '=', Carbon::now()->year)->count();
        $q_1 = Survey::avg('q_1');
        $q_2 = Survey::avg('q_2');
        $q_3 = Survey::avg('q_3');
        $q_4 = Survey::avg('q_4');
        $q_5 = Survey::avg('q_5');
        $q_6 = Survey::avg('q_6');
        $q_7 = Survey::avg('q_7');
        $q_8 = Survey::avg('q_8');
        $q_9 = Survey::avg('q_9');
        $q_10 = Survey::avg('q_10');
        $totalUser = User::whereYear('created_at', '=', Carbon::now()->year)->count();
        return view('dashboard', compact('q_1', 'q_2', 'q_3', 'q_4', 'q_5', 'q_6', 'q_7', 'q_8', 'q_9', 'q_10', 'today', 'thisMonth', 'thisYear','totalUser'));
    }

    public function userList(){
        $userList = User::where('survey_status', '0')->paginate(10);
        return view('user-list', compact('userList'));
    }
}
