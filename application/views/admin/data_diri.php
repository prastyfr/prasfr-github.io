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

<div class="container my-4">
    <div class="card">
        <div class='card-header bg-primary text-white'>INFO PERJALANAN</div>

        <div class='card-body'>
            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Nama Kereta</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?=$info->nama_kereta ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Waktu Berangkat</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->tanggal_berangkat ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Waktu Tiba</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->tanggal_tiba ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Rute</label>
                </div>
                <div class='col-md-9'>
                    <span> Dari</span>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->ASAL ?>'>
                    <span> Ke </span>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->TUJUAN ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Jumlah Penumpang</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $_GET['p'] ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Harga Per Tiket</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" 
                    value='<?= 'Rp. '.number_format($info->harga, 0, ',',  '.') ?>'>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form action="<?= base_url('pesanTiket') ?>" method='POST'>
    <input type="hidden" name='penumpang' value='<?= $_GET['p'] ?>'>
    <input type="hidden" name='id_jadwal' value='<?= $id_jadwal ?>'>
    <input type="hidden" name='harga' value='<?= $info->harga ?>'>

    <div class='card'>
        <div class='card-header bg-primary text-white'>Detail Penumpang</div>
        <div class='card-body'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>>= 17 Tahun Nomor ID(KTP, SIM, PASPORT)*</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=1; $i<=$_GET['p'];$i++): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <input type="text" class='form-control' name='nama<?= $i ?>' required>
                        </td>
                        <td>
                            <input type="text" class='form-control' name='identitas<?= $i ?>' required>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class='card'>
        <div class='card-header bg-primary text-white'>Detail Pemesan</div>
        <div class='card-body'>
            <div class='row'>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label>Nama</label>
                        <input class='form-control' type="text" name='nama_pemesan' placeholder='Nama Pemesan' required>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label>Email</label>
                        <input class='form-control' type="email" name='email' placeholder='Email Pemesan' required>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label>No.Telp</label>
                        <input class='form-control' type="text" name='no_telp' placeholder='Nomor Telepon Pemesan' required>
                    </div>
                </div>
                <div class='clearfix'></div>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <label>Alamat</label>
                        <textarea name="alamat" class='form-control' rows="10" placeholder='Alamat Pemesan' required></textarea>
                    </div>
                </div>
            </div>

            <button class='btn btn-success float-right'>Simpan & Lanjutkan</button>
        </div>
    </div>
    </form>
</div>

<script src="<?= base_url('bootstrap/js/bootstrap.min.js')?>"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>