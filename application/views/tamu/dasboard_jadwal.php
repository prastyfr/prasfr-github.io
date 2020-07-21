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

<div class="container-fluid" >
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card my-5">
          <div class="card-header" style="background-color: #0b56a7;">
                <form action="<?= base_url('CariTiket') ?>" method="POST">
  <div class="form-row" >


    <div class="col" style="margin-left: 20px; ">
      <label style="color: white; font-size: 20px; font-weight: bold; font-family: Source Sans Pro ;">Stasiun Asal</label>
      <select name="asal" id="inputState" class="form-control" style="width: 495px;">
         <option selected="selected" value="" >Stasiun Asal</option>
         <?php foreach ($stasiun as $st): ?>
                  <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                                      
                                                      <?php endforeach ?>
      </select>

    </div>
    <div class="col" style="margin-left: 7px; ">
      <label style="color: white; font-size: 20px; font-weight: bold; font-family: Source Sans Pro ;">Stasiun Tujuan</label>
      <select name="tujuan" id="inputState" class="form-control" style="width: 495px;">
         <option selected="selected" value="" >Stasiun Tujuan</option>
         <?php foreach ($stasiun as $st): ?>
                  <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                                      
                                                      <?php endforeach ?>
      </select>
    </div>
  </div>

   <div class="form-row" style="margin-top: 10px;">
    <div class="col" style="margin-left: 20px; ">
      <label style="color: white; font-size: 20px; font-weight: bold; font-family: Source Sans Pro ;">Tanggal</label>
      <input type="date" style="width: 315px;" name="tanggal" class="form-control" min="<?= date('Y-m-d') ?>" value='<?= date('Y-m-d') ?>'>
    </div>
    <div class="col" style="margin-right: 15px; ">
      <label style="color: white; font-size: 20px; font-weight: bold; font-family: Source Sans Pro ;">Dewasa</label>
      <select name="jumlah" id="inputState" class="form-control" style="width: : 315px;">
                  <option selected="selected" value="" >Dewasa</option>
                    <optgroup label="Dewasa (>3 Tahun)">
                                            
                                         <?php for ($i=1; $i <=4 ; $i++): ?>
                  <option value="<?= $i ?>"><?= $i ?> Dewasa</option>
                  <?php endfor; ?>
                   </optgroup>
                  </select>
                </div>

  </div>



    <button class="btn text-white btn-block" type="submit" name="submit" style="width: 200px; margin-left: 20px; margin-top: 20px; background-color: #f08519; font-weight: bold; margin-bottom: 10px; ">Tambah</button>
        </form>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
    <hr>
          <?php if (!isset($tiket)): ?>
      
    <?php else: ?>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="text-white text-center" style="background: #0b56a7;">
          <tr>
            <th>No</th>
            <th>Nama Kereta</th>
            <th>Tanggal Berangkat</th>
            <th>Tanggal Sampai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">

          <?php $no = 1; ?>
          <?php foreach ($tiket as $tk): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $tk->nama_kereta ?></td>
            <td><?php $date = date_create($tk->tanggal_berangkat); echo date_format($date, "d-m-Y h:i:s");  ?></td>
            <td><?php $date = date_create($tk->tanggal_tiba); echo date_format($date, "d-m-Y h:i:s"); ?></td>
            <td>
              <a class="btn btn-primary" href="<?= base_url('pesan/'.$tk->id.'?p='.$penumpang) ?>">Pesan</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
<?php endif; ?>
  </div>










<script src="<?= base_url('bootstrap/js/bootstrap.min.js')?>"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>