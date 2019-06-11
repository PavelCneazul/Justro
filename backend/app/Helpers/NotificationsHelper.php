<?php

namespace App\Helpers;

use App\Models\Notification;
use Illuminate\Support\Facades\Redis;

/**
 * Created by PhpStorm.
 * User: Ionut
 * Date: 09.02.2018
 * Time: 12:09
 */
class NotificationsHelper
{
    /**
     *
     * Used to send new notifications to front end
     *
     * @param $receiverId
     * @param $extra
     *  used for entity IDs or something that can be used on opening notification
     * @param $description
     *  used for notification's body
     */
    public static function sendNotification($receiverId, $extra, $description)
    {
        $notification = Notification::create([
            'description' => $description,
            'user_id' => $receiverId,
            'extra' => $extra,
            'seen' => 0
        ]);
        if ($notification)
            Redis::publish('message', json_encode([
                'event' => 'NEW_NOTIFICATION',
                'data' => [
                    'receiver_id' => $notification->user_id,
                    'notificationBody' => $notification,
                    'extra' => $extra
                ]
            ]));
    }
}