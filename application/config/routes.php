<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['CariTiket'] = 'tamu/keHalamanJadwal';

$route['print'] = 'tamu/print';
$route['PilihGerbong'] = 'tamu/PilihGerbong';

$route['kirimKonfirmasi'] = 'tamu/kirimKonfirmasi';
$route['cekKonfirmasi'] = 'tamu/cekKonfirmasi';
$route['pembayaran'] = 'tamu/keHalamanPembayaran';

$route['pesanTiket'] = 'tamu/pesanTiket';
$route['pesan/(:any)'] = 'tamu/pesan/$1';

$route['admin/konfirmasi-pembayaran'] = 'admin/keHalamanKonfirPem';
$route['Verifikasi/(:num)'] = 'admin/verifikasiPembayaran/$1';

$route['editStasiun'] = 'admin/edit_stasiun';
$route['admin/dashboard/edit/(:any)'] = 'admin/keHalamanEditStasiun/$1';
$route['hapusStasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['tambahStasiun'] = 'admin/tambah_stasiun';
$route['admin/dasboard'] = 'admin/keHalamanDasboard';

$route['editJadwal'] = 'admin/edit_jadwal';

$route['admin/dashboard/berangkat-jadwal/(:any)'] = 'admin/prosesBerangkat/$1';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/keHalamanEditJadwal/$1';
$route['hapusJadwal/(:any)'] = 'admin/hapusJadwal/$1';
$route['tambahJadwal'] = 'admin/tambah_jadwal';
$route['admin/dashboard/kelola-jadwal'] = 'admin/keHalamanKelolaJadwal';
$route['admin/dashboard/kelola-gerbong'] = 'admin/keHalamanKelolaGerbong';

$route['logout'] = 'admin/logout';
$route['prosesLogin'] = 'admin/login';
$route['login'] = 'admin/keHalamanLogin';

$route['jadwal'] = 'tamu/keHalamanJadwal';
$route['konfirmasi'] = 'tamu/keHalamanKonfirmasi';
$route['default_controller'] = 'tamu/keHalamanDepan';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


