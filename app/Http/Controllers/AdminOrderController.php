<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderByRaw("status = 0 DESC, payment_proof IS NOT NULL, payment_proof IS NULL")->paginate(7);
        
        return view('dashboard.orders.index', [
            'title' => 'Data Pesanan',
            'orders' => $orders
        ]);
    }

    public function confirm($id)
    {
        $order = Order::findOrFail($id);

        // Ubah status pesanan dari 0 menjadi 1
        $order->status = 1;
        $order->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect('/dashboard/orders')->with('success', 'Pesanan tersebut berhasil dikonfirmasi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/dashboard/orders')->with('success', 'Pesanan berhasil dihapus.');
    }
}
