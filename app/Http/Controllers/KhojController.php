<?php

namespace App\Http\Controllers;

use App\khoj;
use App\User;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KhojController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('getAllInputValues');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('khoj.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'input_values' => 'required|string',
            'search_value' => 'required|string'
        ]);
        //split with single value in array
        $inputValuesArray = explode(',', $request->input('input_values'));

        // sort input_values DESC
        rsort($inputValuesArray);

        // search in input_values
        $searchStatus = array_search($request->input('search_value'),$inputValuesArray); // return false | index of array

        // convert this array to string for store in database
        $inputValuesString = implode(",", $inputValuesArray);


        //store in database using eloquent
        khoj::create([
            'input_values' => $inputValuesString,
            'search_value' => $request->input('search_value'),
            'user_id' => Auth::id()
        ]);



        return back()->withInput($request->all())->with('searchResult', $searchStatus ? "true" : "false");
    }

    /**
     * Display the specified resource.
     *
     * @param khoj $khoj
     * @return Response
     */
    public function show(khoj $khoj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param khoj $khoj
     * @return Response
     */
    public function edit(khoj $khoj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param khoj $khoj
     * @return Response
     */
    public function update(Request $request, khoj $khoj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param khoj $khoj
     * @return Response
     */
    public function destroy(khoj $khoj)
    {
        //
    }

    public function getAllInputValues($start_time, $end_time, User $user)
    {
//        return Carbon::parse($start_time);
        try {
          $start_time =  Carbon::parse($start_time);
          $end_time = Carbon::parse($end_time);
        }catch (InvalidFormatException $invalidFormatException){
            return array('Date Time format is invalid');
        }


        $result = khoj::where('created_at', '>=', $start_time)
            ->where('created_at', '<=', $end_time)->get();


        // check if no result found
        if ($result->count() > 0){
            return array(
                'status' => 'success',
                'user_id' => $user->id,
                'payload' => $result
            );
        }
        return array(
           'no Data found of user: '.$user->name
        );
    }
}
