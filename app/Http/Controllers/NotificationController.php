<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Fetch new notifications
    public function fetch()
    {
        $notifications = auth()->user()->unreadNotifications;
        return response()->json($notifications);
    }

    // Mark notifications as read
    public function read()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    }
}