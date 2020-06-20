<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogBook;

class LogBooksController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $goal_id = $request->goal;
        return view('logbooks/create')->with('goal_id', $goal_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'details' => 'required'
        ]);

        $goal_id = $request->goal;
        $date = date('Y-m-d');

        // Create LogBook
        $logBook = new LogBook;
        $logBook->topic = $request->input('topic');
        $logBook->details = $request->input('details');
        $logBook->tags = $request->input('tags');
        $logBook->goal_id = $goal_id;
        $logBook->date = $date;
        $logBook->save();

        return redirect('/goals/'.$goal_id);
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
        return $id;
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

        $logBook = LogBook::find($id);
        if ($logBook != null){
            $logBook->delete();
        };
        return redirect()->back();
    }
}
