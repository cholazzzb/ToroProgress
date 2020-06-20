<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class StepsController extends Controller
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
        $objective_id = $request->objective;
        return view('steps.create', ['goal_id' => $goal_id, 'objective_id' => $objective_id]);
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
            'step' => 'required'
        ]);

        $goal_id = $request->goal;
        $objective_id = $request->objective;

        $step = new Step;
        $step->step = $request->input('step');
        $step->objective_id = $objective_id;
        $step->isCompleted = false;

        $step->save();

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
        $step = Step::where('id', $id)->get();
        return $step;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Step $step)
    {
        return view('steps.edit', ['step' => $step, 'goal_id' => $request->goal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Step $step)
    {
        $step->step = $request->step;
        $step->save();
        return redirect(route('goals.show', $request->goal));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        $step->delete();
        return redirect()->back();
    }

    /**
     * Fof AJAX 
     */
    public function getSteps(Request $request){
        if ($request->objective == null){
            return 'you are not passing any parameter';
        }

        $objective_id = $request->objective;
        $step = Step::where('objective_id', $objective_id)->take(10)->get();

        return $step->toJson();
    }
}
