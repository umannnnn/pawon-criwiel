<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class AdminMailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::paginate(7);

        return view('dashboard.mails.index', [
            'title' => 'Data Pesan Masuk', 
            'messages' => $messages
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect('/dashboard/mails')->with('success', 'Pesan berhasil dihapus.');
    }
}