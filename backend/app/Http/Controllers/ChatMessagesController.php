<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatMessagesController extends Controller
{
    public function getChatMessages(Request $request, $chatId)
    {
        $user = $request->user;
        $items = ChatMessage::with('sender')
            ->where('chat_messages.chat_id', $chatId)
            ->whereHas('chat.users', function ($users) use ($user) {
                if (!$user->getIsAdminAttribute()) {
                    $users->where('users.id', $user->id);
                }
            })
            ->orderBy('created_at', 'asc');
        $items = $items->get();
        return $items;
    }

    public function postMessageInChat(Request $request, $chatId)
    {
        $senderUser = $request->user;
        $receiverUserId = $request->json('receiver_id');
        $chat = Chat::where('chats.id', $chatId)
            ->whereHas('users', function ($users) use ($senderUser, $receiverUserId) {
                if (!$senderUser->getIsAdminAttribute()) {
                    $users->where('users.id', $senderUser->id)
                        ->orWhere('users.id', $receiverUserId);
                }
            })
            ->first();
        if (!$chat) {
            abort(403, 'You are not allowed to post in this chat');
        }

        $message = ChatMessage::create([
            'body' => $request->json('body'),
            'sender_id' => $senderUser->id,
            'chat_id' => $chat->id,
        ]);
        $message->load('sender');

        // TODO SEND MESSAGE TO FRONTEND USING REDIS

        $data = [
            'event' => 'MESSAGE_RECEIVED',
            'data' => [
                'chat_id' => $chat->id,
                'receiver_id' => $receiverUserId,
                'sender_id' => $senderUser->id,
                'message' => $message
            ]
        ];
        Redis::publish('message', json_encode($data));

        return $message;
    }

    public function markBulkMessagesAsSeen(Request $request, $chatId)
    {
        $messageIds = $request->json('message_ids');

        ChatMessage::where('chat_id', $chatId)
            ->whereIn('id', $messageIds)
            ->update(['seen' => 1]);

        return ['OK'];
    }
}
