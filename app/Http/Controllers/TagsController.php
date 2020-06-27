<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $tags = Tag::where('user_id', $id)->get();
        // return view('tags.index')->with('tags', $tags);

        $coba = Tag::find(1);

        // foreach($tags as $tag){
        //     foreach($tag->goals as $goal){
        //         echo 'goal_id'.$goal->pivot->goal_id.'  ';
        //         echo 'tag_id'.$goal->pivot->tag_id;
        //         echo '<br>';
        //     };
        // }

        return view('tags.index')->with('tags', $tags);
        
        // dd($coba);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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

        $user_id = auth()->user()->id;

        // Create Tag
        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->user_id = $user_id;
        $tag->save();

        return redirect('/tags');
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
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag', $tag);
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
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect(route('tags.index'));
    }

    /**
     * API to get goals from tag id
     * 
     * @param int $tag_id
     * @return Goals Collection
     */

    public function getGoals_from_tag(Request $request){
        if(auth()->check()){
            if ($request->tag == null){
                return 'you are not passing any parameter';
            }
            $tag = Tag::find($request->tag);
            $goals_id = array();
            foreach ($tag->goals as $goal) {
                array_push($goals_id, $goal->pivot->goal_id);
            }
            $goals = Goal::findMany($goals_id);
            return $goals->toJson();
        }
    }    
}
