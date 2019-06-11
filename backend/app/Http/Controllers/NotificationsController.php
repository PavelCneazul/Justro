<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationsController extends Controller
{

    public function index(Request $request)
    {

        $userId = $request->input('user_id');
        $items = Notification::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit(300)
            ->get();
        if (!$items)
            abort(404);
        return $items;
    }


    /**
     * Mark a single notification as seen
     *
     * @param $id
     */
    public function seen($id)
    {
        $notification = Notification::find($id);
        if (!$notification)
            abort(404, "No notification found!");
        $notification->seen = 1;
        $notification->save();
    }

}
