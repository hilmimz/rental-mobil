<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;

use Illuminate\Database\Seeder;
use DateTime;
use DateInterval;

use App\Models\User;
use App\Models\Armada;
use App\Models\Merk;
use App\Models\Pelanggan;
use App\Models\Booking;
use App\Models\BookingArmada;
use App\Models\Pembayaran;
use App\Models\Pengembalian;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // private $faker = Faker\Factory::create();


    function createUser($name, $email, $is_superadmin)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('12345678'),
            'is_superadmin' => $is_superadmin
        ]);
    }
    function generateUser()
    {
        $this->createUser('Muhammad Alwiza Ansyar', 'alwiza21@gmail.com', true);
        $this->createUser('Hilmi Muzhaffar', 'hilmimuzhaffar15@gmail.com', false);
        $this->createUser('Khusnia Qurrataain', 'khusniaqurrata@gmail.com', false);
        $this->createUser('Fawwaz Ivandra', 'ivandrafawwaz@gmail.com', true);
        $this->createUser('Maulana Daffa', 'maulanadaffa@student.uns.ac.id', false);
    }


    public function run()
    {
        // JANGAN DIGANTI, STATIC SEEDING
        // $armadaCount = 15;
        $pelangganCount = 10; 


        $this->generateUser();


        // MUST BE IN ORDER
        $this->generateMerk();

        // Armada::factory($armadaCount)->create();
        $this->generateArmada();

        Pelanggan::factory($pelangganCount)->create();

        $this->generateBooking();

        $this->generateBookingArmada();

        $this->generatePengembalian();
        Booking::synchronizePengembalian();


        //sync
        Booking::synchronizeHarga();
        Armada::synchronizeTersedia();
        
        
        $this->generatePembayaran();
        Booking::synchronizePembayaran();

        Booking::synchronizeStatus();
    }






    function generateMerk(){
        Merk::create(['nama'=>'Datsun', 'produsen'=>'Jepang']);
        Merk::create(['nama'=>'Suzuki', 'produsen'=>'Jepang']);
        Merk::create(['nama'=>'Toyota', 'produsen'=>'Jepang']);
        Merk::create(['nama'=>'Nissan', 'produsen'=>'Jepang']);
        // Merk::create(['nama'=>'Mercedes-benz', 'produsen'=>'Jerman']);
    }


    function createArmada($merk_id, $jenis, $plat_nomor, $transmisi, $tgl_pajak, $thn_beli, $harga_tiga_jam, $bahan_bakar)
    {
        Armada::create([
            'merk_id' => $merk_id,
            'jenis' => $jenis,
            'plat_nomor' => $plat_nomor,
            'transmisi' => $transmisi,
            'tgl_pajak' => $tgl_pajak,
            'thn_beli' => $thn_beli,
            'harga_tiga_jam' => $harga_tiga_jam,
            'tersedia' => true,
            'bahan_bakar' => $bahan_bakar,
        ]);
    }
    function generateArmada()
    {
        // $this->createArmada(, '', '', '', '202', '201', , 'Bensin');
        
        $this->createArmada(1, 'Karimun', 'AD 7321 XY', 'Matic', '2024-03-25', '2015', 70000, 'Bensin');
        $this->createArmada(1, 'Karimun', 'AD 5231 DH', 'Manual', '2025-02-19', '2012', 50000, 'Bensin');
        
        $this->createArmada(2, 'Ertiga', 'R 3021 FG', 'Manual', '2025-09-05', '2016', 100000, 'Bensin');
        $this->createArmada(2, 'Ertiga', 'AD 4125 L', 'Matic', '2026-12-01', '2013', 80000, 'Bensin');
        $this->createArmada(2, 'APV', 'B 1235 KY', 'Manual', '2024-01-20', '2017', 120000, 'Bensin');
        
        $this->createArmada(3, 'Kijang Innova', 'A 5643 YT', 'Manual', '2023-06-09', '2013', 85000, 'Bensin');
        $this->createArmada(3, 'Kijang Innova', 'R 5734 AA', 'Matic', '2025-06-05', '2014', 95000, 'Bensin');
        $this->createArmada(3, 'Kijang Innova', 'R 2351 AG', 'Matic', '2024-02-13', '2018', 105000, 'Bensin');
        $this->createArmada(3, 'Alphard', 'AD 7985 TY', 'Manual', '2024-11-27', '2015', 135000, 'Bensin');
        $this->createArmada(3, 'Fortuner', 'AB 8911 TT', 'Manual', '2023-09-12', '2016', 150000, 'Bensin');
        
        $this->createArmada(4, 'Juke', 'AA 4321 TS', 'Matic', '2022-02-01', '2015', 75000, 'Bensin'); //armada pajak mati
        $this->createArmada(4, 'Livina', 'AA 1034 B', 'Manual', '2027-01-02', '2016', 95000, 'Bensin');
    }

    
    function createBooking($pelanggan_id, $tgl_transaksi, $no_invoice, $keterangan){
        Booking::create([
            'pelanggan_id' => $pelanggan_id,
            'tgl_transaksi' => $tgl_transaksi,
            'rental_total' => 11, 
            'denda_total' => 11,
            'harga_total' => 11, 
            'sisa_pembayaran' => 11, 
            'status_pembayaran' => 'a',
            'status_pengembalian' => 'Belum dikembalikan',
            'status' => 'Belum selesai',
            'no_invoice' => $no_invoice,
            'keterangan' => $keterangan
        ]);
      
        // Booking::create([
        //     'pelanggan_id' => 1,
        //     'tgl_transaksi' => '2022-02-02',
        //     'rental_total' => 11, 
        //     'denda_total' => 11,
        //     'harga_total' => 11, 
        //     'status' => 'Selesai',
        //     'no_invoice' => 'xxxx',
        //     'keterangan' => ''
        // ]);
    }
    function generateBooking()
    {
        // PAST
       
        $this->createBooking(1, '2022-05-01', '0804/CK/61', '');
        $this->createBooking(2, '2022-04-03', '0961/KZ/91', '');
        $this->createBooking(3, '2022-04-24', '1199/KD/57', '');
        $this->createBooking(4, '2022-02-20', '1251/QA/73', '');
        $this->createBooking(5, '2022-02-14', '1680/GM/27', '');


        // REPEAT ORDER
        $this->createBooking(6, '2022-03-17', '1896/DY/23', '');
        $this->createBooking(6, date('Y-m-d'), '2358/BR/33', '');
        $this->createBooking(7, '2022-04-17', '2413/XM/76', '');
        $this->createBooking(7, date('Y-m-d'), '2757/HN/20', '');


        // NEW
        $this->createBooking(8, date('Y-m-d'), '2868/YT/89', '');
        $this->createBooking(9, date('Y-m-d'), '2923/YK/91', '');


        // TELAT
        $this->createBooking(10, '2022-05-14', '3043/SA/09', '');


    }

    function createBookingArmada($booking_id, $armada_id, $durasi_jam, $status)
    {
        // jam default diset di jam 6
        $jeda_hari = rand(0,14);
        $jeda_jam = rand(0, 14);

        $waktu_mulai = new DateTime(Booking::find($booking_id)->tgl_transaksi);
        $waktu_mulai->add(new DateInterval("P" . $jeda_hari . "D"))->add(new DateInterval("PT" . $jeda_jam . "H"));

        $waktu_selesai = new DateTime($waktu_mulai->format('Y-m-d H:i:s'));
        $waktu_selesai->add(new DateInterval("PT" . $durasi_jam . "H" ));

        BookingArmada::create([
            'booking_id' => $booking_id,
            'armada_id' => $armada_id,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'durasi_jam' => $durasi_jam,
            'harga' => ($durasi_jam/3) * Armada::find($armada_id)->harga_tiga_jam,
            'status' => $status,
        ]);
    }
    function generateBookingArmada()
    {
        // $dt = new DateTime(Booking::find(1)->tgl_transaksi);
        // $this->createBookingArmada(1,3, $dt->add(new DateInterval("P" . rand(0,7) . "D"))->add(new DateInterval("PT" . rand(5,20) . "H")), 
        //     6, 'Selesai');

        // PAST
        $this->createBookingArmada(1, 3, 6, 'Selesai');
        $this->createBookingArmada(2, 5, 24, 'Selesai');
        $this->createBookingArmada(3, 9, 108, 'Selesai');
        $this->createBookingArmada(3, 11, 18, 'Selesai');
        $this->createBookingArmada(4, 1, 72, 'Selesai');
        $this->createBookingArmada(5, 8, 51, 'Selesai');
        $this->createBookingArmada(5, 3, 51, 'Selesai');
        
        // REPEAT
        $this->createBookingArmada(6, 1, 48, 'Selesai');
        $this->createBookingArmada(7, 2, 48, 'Aktif');
        
        $this->createBookingArmada(8, 12, 12, 'Selesai');
        $this->createBookingArmada(9, 4, 24, 'Aktif');
        
        // NEW
        $this->createBookingArmada(10, 6, 24, 'Aktif');
        $this->createBookingArmada(11, 8, 9, 'Aktif');

        // TELAT
        $this->createBookingArmada(12, 7, 12, 'Telat');

    }


    function createPengembalian($booking_armada_id, $jeda_jam_pengembalian, $kondisi, $denda, $keterangan)
    {
        $waktu_selesai = new DateTime( BookingArmada::find($booking_armada_id)->waktu_selesai );
        

        $waktu_pengembalian = new DateTime( $waktu_selesai->format('Y-m-d H:i:s') );
        $waktu_pengembalian->add( new DateInterval('PT' . $jeda_jam_pengembalian . 'H'));
        
        $interval = $waktu_selesai->diff($waktu_pengembalian);
        $durasi_telat = ($interval->m * 720) + ($interval->d * 24) + $interval->h;

        Pengembalian::create([
            'booking_armada_id' => $booking_armada_id,
            'waktu_pengembalian' => $waktu_pengembalian,
            'kondisi' => $kondisi,
            'durasi_telat' => $durasi_telat,
            'denda' => $denda,
            'keterangan' => $keterangan,
        ]);
    }
    function generatePengembalian()
    {
        // PAST
        $this->createPengembalian(1, 9, 'Bagus', 0, '');
        $this->createPengembalian(2, 2, 'Bagus', 0, '');
        
        $this->createPengembalian(3, 12, 'Kurang Bagus', 50000, 'Ada bekas muntah');
        $this->createPengembalian(4, 30, 'Bagus', 50000, 'Telat');
        
        $this->createPengembalian(5, 48, 'Kurang Bagus', 200000, 'Telat, ban bocor');
        
        $this->createPengembalian(6, 0, 'Bagus', 0, '');
        $this->createPengembalian(7, 0, 'Bagus', 0, '');
        
        
        // REPEAT
        $this->createPengembalian(8, 12, 'Bagus', 0, '');
        
        $this->createPengembalian(10, 3, 'Kurang Bagus', 100000, 'Sedikit lecet');
        
    }


    function createPembayaran($booking_id, $tgl_pembayaran, $jumlah_bayar, $cara_pembayaran, $tipe_pembayaran)
    {
        Pembayaran::create([
            'booking_id' => $booking_id,
            'tgl_pembayaran' => $tgl_pembayaran,
            'jumlah_bayar' => $jumlah_bayar,
            'cara_pembayaran' => $cara_pembayaran,
            'tipe_pembayaran' => $tipe_pembayaran,
        ]);
    }
    function generatePembayaran()
    {
        // $this->createPembayaran(, '2022-', , '', '')
        
        $this->createPembayaran(1, '2022-05-01', 200000, 'Cash', 'Pelunasan');
        
        $this->createPembayaran(2, '2022-04-03', 300000, 'Transfer', 'DP');
        $this->createPembayaran(2, '2022-04-20', 660000, 'Transfer', 'Pelunasan');
        
        $this->createPembayaran(3, '2022-04-24', 2000000, 'Transfer', 'DP');
        $this->createPembayaran(3, '2022-04-28', 3310000, 'Transfer', 'Pelunasan');
        $this->createPembayaran(3, '2022-05-02', 100000, 'Transfer', 'Denda');
        
        $this->createPembayaran(4, '2022-02-20', 1000000, 'Cash', 'DP');
        $this->createPembayaran(4, '2022-02-25', 880000, 'Transfer', 'Pelunasan dan Denda');
        
        $this->createPembayaran(5, '2022-02-14', 3485000, 'Transfer', 'Pelunasan');
        
        
        $this->createPembayaran(6, '2022-03-17', 500000, 'Cash', 'DP');
        $this->createPembayaran(6, '2022-03-23', 620000, 'Cash', 'Pelunasan');
        
        $this->createPembayaran(7, now(), 800000, 'Transfer', 'Pelunasan');
        
        $this->createPembayaran(8, '2022-04-17', 380000, 'Cash', 'Pelunasan');
        $this->createPembayaran(8, '2022-04-27', 100000, 'Transfer', 'Denda');
        
        $this->createPembayaran(9, now(), 200000, 'Transfer', 'DP');
        
        $this->createPembayaran(10, now(), 200000, 'Transfer', 'DP');
        $this->createPembayaran(11, now(), 200000, 'Transfer', 'DP');
        $this->createPembayaran(12, now(), 200000, 'Transfer', 'DP');
    }
    
}
