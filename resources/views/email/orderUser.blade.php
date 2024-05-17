<x-mail::message>
# Hallo, pesanan anda telah kami konfirmasi

Detail Pelanggan:

Nama: {{ $data['name'] }}<br>
Email: {{ $data['customer'] }}<br>
Nomor HP: {{ $data['phone'] }}<br>
Alamat: {{ $data['address'] }}<br>

Detail Pesanan:

Produk: {{ $data['product'] }}<br>
Jumlah: {{ $data['quantity'] }}<br>
Deskripsi: {{ $data['desc'] }}<br>
Total Harga: Rp. {{ $data['price'] }}<br>

Pesanan anda telah kami konfirmasi, segera lakukan pembayaran agar pesanan anda dapat segera kami proses.

Thanks,<br>
Pawon Criwiel

</x-mail::message>

