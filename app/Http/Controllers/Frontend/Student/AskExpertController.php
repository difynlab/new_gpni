<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\AskQuestion;
use App\Models\AskQuestionReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AskExpertController extends Controller
{
    public function index()
    { 
        $language = session('language', 'en');
        
        $text = [
            'en' => [
                'header_text' => 'Ask the Expert',
                'subject_label' => 'Subject',
                'subject_placeholder' => 'Please mention a subject related to question',
                'question_label' => 'Your Question',
                'question_placeholder' => 'Ask your question',
                'submit' => 'Submit',
                'view_history' => 'View History & Replies'
            ],
            'zh' => [
                'header_text' => '询问专家',
                'subject_label' => '主题',
                'subject_placeholder' => '请提及与问题相关的主题',
                'question_label' => '你的问题',
                'question_placeholder' => '提出你的问题',
                'submit' => '提交',
                'view_history' => '查看历史记录与回复'
            ],
            'ja' => [
                'header_text' => '専門家に聞く',
                'subject_label' => '件名',
                'subject_placeholder' => '質問に関連する件名を記載してください',
                'question_label' => '質問',
                'question_placeholder' => '質問してください',
                'submit' => '送信',
                'view_history' => '履歴と返信を表示'
            ],
        ];
    
        $language_text = $text[$language] ?? $text['en'];
    
        return view('frontend.student.ask-expert', [
            'language_text' => $language_text
        ]);
    }

    public function viewHistory()
    {
        $student_id = Auth::id();
        $language = session('language', 'en');

        $language_text = [
            'en' => [
                'page_title' => 'History & Replies',
                'ask_question' => 'Ask a Question Now',
                'answered_question' => 'Answered Question',
                'question' => 'Question:',
            ],
            'zh' => [
                'page_title' => '历史与回复',
                'ask_question' => '现在提问',
                'answered_question' => '已回答的问题',
                'question' => '问题:',
            ],
            'ja' => [
                'page_title' => '履歴と返信',
                'ask_question' => '今すぐ質問',
                'answered_question' => '回答済みの質問',
                'question' => '質問:',
            ],
        ];

        $questions = AskQuestion::where('user_id', $student_id)->get();

        return view('frontend.student.view-history', [
            'language_text' => $language_text[$language],
            'questions' => $questions
        ]);

    }

    public function questionAnswer($id)
    {
        $language = session('language', 'en');

        switch($language) {
            case 'en':
                $language_text = [
                    'question_answer' => 'Question & Answer',
                    'return_to_history' => 'Return to History',
                    'leave_message' => 'Leave a message',
                    'continue_conversation' => 'Continue the conversation by leaving a message...',
                    'send_message' => 'Send Message',
                ];
                break;
            case 'zh':
                $language_text = [
                    'question_answer' => '问题与回答',
                    'return_to_history' => '返回历史',
                    'leave_message' => '留言',
                    'continue_conversation' => '继续对话，留下消息...',
                    'send_message' => '发送消息',
                ];
                break;
            case 'ja':
                $language_text = [
                    'question_answer' => '質問と回答',
                    'return_to_history' => '履歴に戻る',
                    'leave_message' => 'メッセージを残す',
                    'continue_conversation' => 'メッセージを残して会話を続けてください...',
                    'send_message' => 'メッセージを送信',
                ];
                break;
            default:
                $language_text = [
                    'question_answer' => 'Question & Answer',
                    'return_to_history' => 'Return to History',
                    'leave_message' => 'Leave a message',
                    'continue_conversation' => 'Continue the conversation by leaving a message...',
                    'send_message' => 'Send Message',
                ];
                break;
        }

        $question = AskQuestion::findOrFail($id);

        // Retrieve the replies for this question
        $replies = AskQuestionReply::where('ask_question_id', $id)->orderBy('created_at', 'asc')->get();

        // Pass the question and replies to the view
        return view('frontend.student.question-and-answer', compact('question', 'replies', 'language_text'));
    
    }

    public function sendReply(Request $request)
    {
        $request->validate([
            'ask_question_id' => 'required|exists:ask_questions,id',
            'message' => 'required|string',
        ]);

        AskQuestionReply::create([
            'ask_question_id' => $request->ask_question_id,
            'replied_by' => Auth::id(),
            'replied_by_name' => Auth::user()->name, // Assuming you want to store the user name
            'message' => $request->message,
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'is_viewed' => '0',
            'status' => '1',
        ]);

        return response()->json(['message' => 'Reply sent successfully']);
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subject' => 'required|string|max:255',
            'question' => 'required|string',
        ]);

        \Log::info($request->all());

        // Save the question to the database
        AskQuestion::create([
            'user_id' => Auth::id(),  // Assuming user is logged in
            'subject' => $request->input('subject'),
            'initial_message' => $request->input('question'),
            'date' => now()->toDateString(),   // Get current date
            'time' => now()->toTimeString(),   // Get current time
            'is_viewed' => '0',                  // Default value: not yet viewed
            'status' => '1',             // You can change this based on your business logic
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your question has been submitted successfully.');
    }
}