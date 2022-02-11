<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DialogResource;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $result = Message::select('company_id')->where('user_id', Auth::id())->distinct()->get();
        return DialogResource::collection($result);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|numeric|exists:companies,id',
            'text' => 'required|string|max:4096',
        ]);

        Message::create([
            'company_id' => $request->company_id,
            'user_id' => Auth::id(),
            'from_user' => true,
            'text' => $request->text
        ]);
    }

    public function show($id)
    {
        $messages = Message::where([
            'company_id' => $id,
            'user_id' => Auth::id(),
        ])->get();

        return MessageResource::collection($messages);
    }
}
