<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\SubGoal;
use App\LogBook;
use App\Goal;
use App\User;

class GoalsController extends Controller
{
    /**
     * Create a new controller instance.
     * This code make anything unaccessible before login except => []
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $goals = Goal::where('user_id', $id)->get();
        return view("goals.index")->with('goals', $goals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("goals.create");
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
            'name' => 'required',
            'description' => 'required'
        ]);
        
        // Create Goal
        $goal = new Goal;
        $goal->name = $request->input('name');
        $goal->description = $request->input('description');
        $goal->user_id = auth()->user()->id;
        $goal->save();

        return redirect('/goals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goal = Goal::find($id);
        $logBooks = LogBook::where('goal_id', $id)->take(10)->get();
        $subGoals = SubGoal::where('goal_id', $id)->take(10)->get();

        return view('goals.show', ['goal' => $goal, 'logBooks' => $logBooks, 'subGoals' => $subGoals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::find($id);
        return view('goals.edit')->with('goal', $goal);
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
    public function destroy(Goal $goal)
    {
        $coba = $goal->subGoals->each;
        $coba = $goal->logBooks->each;
        // $coba = $goal->subGoals->each->steps->each;
        // echo $goal->subGoals->get(1).steps;
        $subGoals =  Goal::find(1)->subGoals;
        foreach($subGoals as $subGoal){
            echo $subGoal;
        }
        // dd($coba);
        // $goal->delete();
        // return redirect()->route('goals.index');
    }

    /**
     * For Yajra datatables
     */

    public function getUsers(){
        return Datatables::of(User::query())->make(true);
    }

    /**
     * For AJAX fetching
     */
    public function getGoals(Request $request){
        $id = 2;
        $goal = Goal::find($id);
        $logBooks = LogBook::where('goal_id', $id)->take(10)->get();
        $subGoals = SubGoal::where('goal_id', $id)->take(10)->get();

        return $logBooks->toJson();
    }
}
