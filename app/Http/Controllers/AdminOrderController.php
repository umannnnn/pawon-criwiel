<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use App\Mail\MailOrderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //paginate
        $orders = Order::orderByRaw('FIELD(status, "Menunggu konfirmasi", "Dikonfirmasi", "Sedang diproses", "Selesai")')->paginate(7);
        
        return view('dashboard.orders.index', [
            'title' => 'Data Pesanan',
            'orders' => $orders
        ]);
    }

    public function confirm($id)
    {
        $order = Order::findOrFail($id);

        // Ubah status pesanan menjadi 'Dikonfirmasi'
        $order->status = Order::STATUS_CONFIRMED;
        $order->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect('/dashboard/orders')->with('success', 'Pesanan tersebut berhasil dikonfirmasi.');
    }

    public function process($id)
    {
        $order = Order::findOrFail($id);

        // Ubah status pesanan menjadi 'Sedang diproses'
        $order->status = Order::STATUS_PROCESSING;
        $order->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect('/dashboard/orders')->with('success', 'Pesanan tersebut sedang diproses.');
    }

    public function complete($id)
    {
        $order = Order::findOrFail($id);

        // Ubah status pesanan menjadi 'Selesai'
        $order->status = Order::STATUS_COMPLETED;
        $order->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect('/dashboard/orders')->with('success', 'Pesanan tersebut telah selesai.');
    }

    //ubah price pada pesanan
    public function price(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validasi request
        $request->validate([
            'price' => 'required|numeric'
        ]);

        // Ubah harga pesanan
        $order->price = $request->price;
        $order->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect('/dashboard/orders')->with('success', 'Harga pesanan berhasil diubah.');
    }

    //kirim detail pesanan id tersebut ke email pengguna
    public function sendEmail($id)
    {
        $order = Order::findOrFail($id);

        Mail::to($order->customer)->send(new MailOrderUser($order));

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect('/dashboard/orders')->with('success', 'Email berhasil dikirim.');
    }


    public function print()
    {
        $orders = Order::all(); // Ambil semua data pesanan

        if ($orders->isEmpty()) {
            return redirect('/dashboard/orders')->with('error', 'Tidak ada data pesanan.');
        }

        $pdf = app(PDF::class);
        $pdf->loadView('dashboard.orders.print', ['orders' => $orders])
            ->setPaper('a4', 'landscape'); // Mengatur orientasi kertas menjadi landscape

        return $pdf->download('laporan-pesanan.pdf');
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
