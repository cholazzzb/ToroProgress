<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\Tag;
use App\Objective;
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
        $id = auth()->user()->id;
        $tags = Tag::where('user_id', $id)->get();
        return view("goals.create")->with('tags', $tags);
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
            'description' => 'required',
            'color' => 'required'
        ]);
        
        // Create Goal
        $goal = Goal::create([
            'name' => request('name'),
            'description' => request('description'),
            'color' => request('color'),
            'user_id' => auth()->user()->id
        ]);
        $goal->tags()->attach($request->input('tag'));
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
        $objectives = Objective::where('goal_id', $id)->take(10)->get();

        return view('goals.show', ['goal' => $goal, 'logBooks' => $logBooks, 'objectives' => $objectives]);
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
        $user_id = auth()->user()->id;
        $tags = Tag::where('user_id', $user_id)->get();
             
        return view('goals.edit', ['goal' => $goal, 'tags' => $tags]);
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
        $goal = Goal::find($id);
        $goal->name = $request->name;
        $goal->description = $request->description;
        $goal->color = $request->color;
        $goal->tags()->attach($request->input('tag'));
        $goal->save();
        return redirect(route('goals.show', $goal->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        $objectives = $goal->objectives;
        $logBooks = $goal->logBooks;

        foreach ($logBooks as $logBook) {
            $logBook->delete();
        }

            // Delete all logbooks

        foreach($objectives as $objective){
            $steps =  $objective->steps;

            // Delete all objectives steps
            foreach ($steps as $step) {
                echo $step->delete();
            }
    
            // Delete all objectives
            $objective->delete();
        }

        // Delete the goal
        $goal->delete();

        return redirect()->route('goals.index');
    }

    /**
     * For Yajra datatables
     */

    public function getUsers(){
        return Datatables::of(User::query())->make(true);
    }
}
