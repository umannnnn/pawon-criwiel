<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Jobs\OrderJob;
use App\Mail\MailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        // Get all orders by the authenticated user
        $orders = Order::where('customer', Auth::user()->email)->get();

        return view('cart', [
            'title' => 'Pesanan',
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'product' => 'required|min:3|max:255',
            'quantity' => 'required|numeric|min:1',
            'name' => 'required|min:3|max:255',
            'customer' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
            'phone' => 'required|numeric|min:10',
            'desc' => 'required|min:3|max:255'
        ]);

        // Create a new order
        $order = Order::create($validatedData);

        $order->status = Order::STATUS_WAITING_CONFIRMATION;

        // Generate invoice number
        $invoiceNumber = 'INV-' . date('ym') . sprintf($order->id);
        
        // Update the order with the generated invoice number
        $order->update(['invoice' => $invoiceNumber]);

        Mail::to('jokitiktok001@gmail.com')->send(new MailOrder($order));

        // Redirect to order page
        return redirect('/menu')->with('success', 'Pesanan berhasil dibuat, silahkan tunggu konfirmasi dari kami. Nomor invoice Anda: ' . $invoiceNumber);
    }

    public function destroy($id)
    {
        // Find the order by id
        $order = Order::findOrFail($id);

        // Delete the order
        $order->delete();

        // Redirect to order page with success message
        return redirect('/order')->with('success', 'Pesanan berhasil dibatalkan.');
    }

    public function confirm()
    {
        // Ambil ID pesanan dari formulir
        $orderId = request('order');

        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($orderId);

        // Periksa apakah ada file yang diunggah
        if (request()->hasFile('payment_proof')) {
            // Isi field payment_proof dengan file yang diunggah
            $order->update([
                'payment_proof' => request()->file('payment_proof')->store('proofs', 'public')
            ]);
        }

        // Redirect ke halaman pesanan dengan pesan sukses
        return redirect('/order')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
