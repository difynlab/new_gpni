<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\AskQuestion;
use App\Models\AskQuestionReply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AskQuestionController extends Controller
{
    private function processAskQuestions($ask_questions)
    {
        foreach($ask_questions as $ask_question) {
            $ask_question->action = '
            <a href="'. route('backend.communications.ask-questions.edit', $ask_question->id) .'" class="edit-button" title="Reply"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$ask_question->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $user = User::find($ask_question->user_id);
            $ask_question->user = $user->first_name . ' ' . $user->last_name;
        }

        return $ask_questions;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $ask_questions = AskQuestion::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $ask_questions = $this->processAskQuestions($ask_questions);

        return view('backend.communications.ask-questions.index', [
            'ask_questions' => $ask_questions,
            'items' => $items
        ]);
    }

    public function edit(AskQuestion $ask_question)
    {
        if($ask_question->is_viewed != '1') {
            $ask_question->is_viewed = '1';
            $ask_question->save();
        }

        $user = User::find($ask_question->user_id);
        $ask_question_replies = AskQuestionReply::where('ask_question_id', $ask_question->id)->where('status', '1')->get();
        $student_ask_question_replies = AskQuestionReply::where('ask_question_id', $ask_question->id)->where('replied_by', '!=', auth()->user()->id)->where('is_viewed', '0')->where('status', '1')->get();

        foreach($student_ask_question_replies as $student_ask_question_reply) {
            $student_ask_question_reply->is_viewed = '1';
            $student_ask_question_reply->save();
        }

        $date_time_string = $ask_question->date . ' ' . $ask_question->time;
        $parsed_date_time = Carbon::parse($date_time_string);
        $time_ago = $parsed_date_time->diffForHumans();
        $ask_question->time_difference = $time_ago;

        foreach($ask_question_replies as $key => $ask_question_reply) {
            $date_time_string = $ask_question_reply->date . ' ' . $ask_question_reply->time;
            $parsed_date_time = Carbon::parse($date_time_string);
            $time_ago = $parsed_date_time->diffForHumans();
            $ask_question_reply->time_difference = $time_ago;
        }

        return view('backend.communications.ask-questions.edit', [
            'ask_question' => $ask_question,
            'ask_question_replies' => $ask_question_replies,
            'user' => $user
        ]);
    }

    public function update(Request $request, AskQuestion $ask_question)
    {
        $ask_question_reply = new AskQuestionReply();
        $ask_question_reply->ask_question_id = $ask_question->id;
        $ask_question_reply->replied_by = auth()->user()->id;
        $ask_question_reply->message = $request->message;
        $ask_question_reply->date = Carbon::now()->toDateString();
        $ask_question_reply->time = Carbon::now()->toTimeString();
        $ask_question_reply->is_viewed = '0';
        $ask_question_reply->status = '1';
        $ask_question_reply->save();
        
        return redirect()->route('backend.communications.ask-questions.edit', $ask_question)->with('success', "Successfully sent!");
    }

    public function destroy(AskQuestion $ask_question)
    {
        $ask_question_replies = AskQuestionReply::where('ask_question_id', $ask_question->id)->where('status', '!=', '0')->get();

        if($ask_question_replies) {
            foreach($ask_question_replies as $ask_question_reply) {
                $ask_question_reply->status = '0';
                $ask_question_reply->save();
            }
        }

        $ask_question->status = '0';
        $ask_question->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.communications.ask-questions.index');
        }

        $user = $request->user;
        $subject = $request->subject;
        $date = $request->date;

        $users = User::where('status', '1');
        $ask_questions = AskQuestion::where('status', '1')->orderBy('id', 'desc');

        if($user != null) {
            $user_ids = $users->where('name', 'like', '%' . $user . '%')->pluck('id')->toArray();
            $ask_questions->whereIn('user_id', $user_ids);
        }

        if($subject != null) {
            $ask_questions->where('subject', 'like', '%' . $subject . '%');
        }

        if($date != null) {
            $ask_questions->where('date', $date);
        }

        $items = $request->items ?? 10;
        $ask_questions = $ask_questions->paginate($items);
        $ask_questions = $this->processAskQuestions($ask_questions);

        return view('backend.communications.ask-questions.index', [
            'ask_questions' => $ask_questions,
            'items' => $items,
            'user' => $user,
            'subject' => $subject,
            'date' => $date
        ]);
    }
}