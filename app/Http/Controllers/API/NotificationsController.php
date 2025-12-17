<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        return Notification::with('user')->get();
    }

    public function show($id)
    {
        return Notification::with('user')->findOrFail($id);
    }

    public function markAsRead($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->is_read = true;
        $notif->save();
        return response()->json($notif);
    }
}
