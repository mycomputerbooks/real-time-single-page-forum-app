<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['only' => ['login','signup']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Question::latest()->get();
        return QuestionResource::collection(Question::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // $question = new Question;
        // $question->title = $request->title;
        // $question->slug = $request->slug;
        // $question->body = $request->body;
        // $question->category_id = $request->category_id;
        // $question->user_id = $request->user_id;
        // $question->save();
        //added protected $guarded = [] to Question.php;
        //auth()->user()->question()->create($request->all());

        Question::create($request->all());
        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //added getRouteKeyName in Question.php
        // return $question;
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        //echo $request;
        return response('Update', Response::HTTP_ACCEPTED);
    }

    // public function update(Request $request, Question $question){
	// 	$question->update(['title'=> $request->title, 'slug'=>str_slug($request->title), 'body'=>$request->body,]);
	// 	return response('Update', 200);
    // }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
