<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">


    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-light" style="background: #1b69b3;">
    <a class="navbar-brand" href="#">
      <img src="img/kai logo.png" style="height: 50px; width: 50px;  margin-top: -10px;  margin-bottom: -10px;" ></a>
      <a href=""  style="margin-left: -50px; font-size: 15px; font-family: Source Sans Pro ; text-align: left; color: white; text-decoration: none;">Home</a>
      <a href="<?= base_url('konfirmasi')?>"  style="margin-right: 700px; font-size: 15px; font-family: Source Sans Pro; color: white; text-decoration: none;">Konfirmasi Pembayaran</a>

  <button type="button" class="btn btn-outline-secondary" style="text-align: right;">Login</button>
  </nav>
<?php if($this->session->flashdata('nomor') === null): ?>

<div class='container-fluid'>
    <div class='row justify-content-center my-3'>
        <div class='col-md-5 '>
        <div class='alert alert-danger'>
            <h4>Anda Telah MeRefresh Halaman !!</h4>
            <p>Silahkan Lakukan Pemesanan Kembali Jika Belum mendapat Kode Pembayaran</p>
        </div>
    </div>
</div>

<?php else: ?>

<div class='container-fluid'>
    <div class='row justify-content-center my-3'>
        <div class='col-md-5 '>
        <div class='alert alert-danger'>
            <h4>PERINGATAN !! <br> JANGAN REFRESH HALAMAN INI!</h4>
            <p>Untuk Menghindari Kegagalan Sistem.</p>
        </div>
            <div class='card'> 
                <div class='card-body'>
                    <h1 class='text-success'>Selamat!</h1>
                    <h3>Anda Berhasil Melakukan Pemesanan Tiket!</h3>
                    <hr>
                    <h5 class='text-danger text-center '>Silahkan Lakukan Pembayaran Sesuai Detail Berikut</h5>
                    <br>
                    <h3 class='text-center'>A0234567897658</h3>
                    <p class='text-center font-weight-bold mb-0'>a/n PT.KeretaIndonesai</p>
                    <p class='text-center'>BNI Syariah Kode Bank : 002</p>

                    <hr>

                    <h5 class='text-center'>Total Yang Harus Dibayar</h5>
                    <h2 class='text-center'>Rp.<?= $this->session->flashdata('total') ?></h2>
                    <br>
                    <h5 class='text-center'>Kode Pembayaran Anda</h5>
                    <h2 class='text-center'><?= $this->session->flashdata('nomor') ?></h2>
                    <br><br>
                    <p class='text-danger'>*Jika Sudah Transfer Lakukan Konfirmasi Pembayarn pada link 
                        <a target="blank" href="<?= base_url('konfirmasi') ?>">Konfirmasi Pembayaran </a> 
                    </p>
                    <h4 class='text-center'>TERIMA KASIH</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<script src="<?= base_url('bootstrap/js/bootstrap.min.js')?>"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>