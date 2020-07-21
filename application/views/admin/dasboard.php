<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">



    <title>Dasboard</title>
  </head>
  <body>

  <nav class="navbar navbar-light" style="background: #1b69b3;">
    <a class="navbar-brand" href="#">
      <a href="" style="margin-right: 900px; font-size: 15px; font-family: Source Sans Pro ; color: white; text-decoration: none;">KAI PRASS</a>
      <a href=""  style="margin-left: -850px; font-size: 15px; font-family: Source Sans Pro ;  color: white; text-decoration: none;">Home</a>
      <a href="<?= base_url('admin/dashboard/kelola-jadwal')?>"  style="margin-left: -850px; font-size: 15px; font-family: Source Sans Pro ;  color: white; text-decoration: none;">Kelola Jadwal</a>


  <a href="<?= base_url('logout')?>"><button type="button" class="btn btn-outline-secondary" style="text-align: right;">Logout</button></a>
  </nav>

    <div class="container-fluid my-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-white text-center" style="background: #1b69b3;">Daftar Stasiun</div>
          <div class="card-body">
            <div class="alert">
             <br><br>

            <table class="table table-striped table-bordered datatables ">
              <thead class=" thead-dark" style="font-size: 15px; font-family: Source Sans Pro ; color: white;">
                <tr>
                  <th>No</th>
                  <th>Nama Stasiun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php  $no = 1; ?>
                <?php foreach ($stasiun as $st): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $st->nama_stasiun ?></td>


                  <td>
                      <a href="<?= base_url('hapusStasiun/'.$st->id) ?>"><button type="button" class="btn btn-primary">Hapus</button></a>
                      <a href="<?= base_url('admin/dashboard/edit/'.$st->id) ?>"><button type="button" class="btn" style="background: #007bff; color: white; ">Edit</button></a>  
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

          <div class="col-md-4">
        <div class="card">
          <div class="card-header text-center text-white" style="background: #1b69b3;">Form Tambah Stasiun</div>
          <div class="card-body">
            <form action="<?= base_url('tambahStasiun') ?>" method="POST">
              <div class="form-group">
                <label>Nama Stasiun</label>
                <input type="text" class="form-control" name="stasiun" placeholder="Nama Stasiun">
              </div>

              <button class="btn btn-block btn-success">Tambah Staisun</button>
            </form> 
          </div>
        </div>
      </div>

    </div>
  </div>

  
          
      





  <script src="<?= base_url('bootstrap/js/bootstrap.min.js')?>"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

