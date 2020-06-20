<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objective;

class ObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('objectives/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $goal_id = $request->goal;
        return view('objectives/create')->with('goal_id', $goal_id);
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
            'name' => 'required'
        ]);

        $goal_id = $request->goal;

        // Create Data with Eloquent
        $subGoal = new Objective;
        $subGoal->name = $request->input('name');
        $subGoal->goal_id = $goal_id;
        $subGoal->save();

        return redirect('goals/'.$goal_id);
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
    public function edit(Objective $objective)
    {
        return view('objectives.edit', ['objective' => $objective]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objective $objective)
    {
        $objective->name = $request->name;
        $objective->save();
        return redirect(route('goals.show', $objective->goal_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        $goal_id = $objective->goal_id;
        $steps = $objective->steps;
        foreach ($steps as $step) {
            $step->delete();
        }
        $objective->delete();

        return redirect()->route('goals.show', $goal_id);
    }
}
