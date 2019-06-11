<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatsController extends Controller
{
    public function getOrCreateChat(Request $request)
    {
        $userIds = [$request->user->id, (int)$request->input('receiver_id')];

        return self::getOrCreateChatStatic($userIds);
    }

    /**
     * @param $userIds
     * @return mixed
     */
    public static function getOrCreateChatStatic($userIds)
    {
        $chats = ChatUser::whereIn('user_id', $userIds)->get();

        $groupedChats = $chats->groupBy('chat_id');

        $chatId = null;
        foreach ($groupedChats as $key => $value) {
            $users = array_pluck($value, 'user_id');
            if (Helper::array_equal($users, $userIds)) {
                $chatId = $key;
                break;
            }
        }

        $item = Chat::find($chatId);


        if (!isset($item) || !$item) {
            $item = Chat::create([
                'reference' => str_random(128)
            ]);
            $item->users()->sync($userIds);
        }

        $item->load('messages');

        return $item;
    }


}
