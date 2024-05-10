<x-mail::message>
# Hallo, anda mendapatkan pesanan baru

Detail Pelanggan:

Nama: {{ $data['name'] }}<br>
Email: {{ $data['customer'] }}<br>
Nomor HP: {{ $data['phone'] }}<br>
Alamat: {{ $data['address'] }}<br>

Detail Pesanan:

Produk: {{ $data['product'] }}<br>
Jumlah: {{ $data['quantity'] }}<br>
Deskripsi: {{ $data['desc'] }}<br>

Apabila pesanan tersebut memungkinkan, Segera konfirmasi pesanan melalui dashboard admin pada website.

Thanks,<br>
Pawon Criwiel
</x-mail::message>
