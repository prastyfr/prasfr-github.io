<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Admin</title>
	<link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">
</head>
<body>

	<div class="container-fluid my-4">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header text-center bg-dark text-white">Edit Jadwal</div>
					<div class="card-body">
						<form action="<?= base_url('editJadwal') ?>" method="POST">
							<input type="hidden" name="id" value="<?= $data_edit->id  ?>">
							<div class="form-group">
								<label>Nama Kereta</label>
								<input type="text" name="nama_kereta" class="form-control" required value="<?= $data_edit->nama_kereta ?>">
							</div>

							<div class="form-group">
								<label>Stasiun Asal</label>
								<select name="asal" class="form-control" required>
									<optgroup label="TERPILIH">
										<option selected value="<?= $data_edit->asal ?>"><?= $data_edit->ASAL ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($stasiun as $st): ?>
											<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
										<?php endforeach ?>	
									</optgroup>
								</select>
							</div>

							<div class="form-group">
								<label>Stasiun Tujuan</label>
								<select name="tujuan" class="form-control" required>
									<optgroup label="TERPILIH">
										<option selected value="<?= $data_edit->tujuan ?>"><?= $data_edit->TUJUAN ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($stasiun as $st): ?>
											<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
										<?php endforeach ?>	
									</optgroup>
								</select>
							</div>

							<div class="form-group">
								<label>Tanggal Berangkat</label>
								<?php $date = date_create($data_edit->tanggal_berangkat); ?>
								<input type="datetime-local" name="tgl_berangkat" class="form-control" min="<?= date_format($date, 'Y-m-d\TH:i'); ?>" value='<?= date_format($date, 'Y-m-d\TH:i'); ?>' required>  
							</div>

							<div class="form-group">
								<label>Tanggal Sampai</label>
								<?php $date = date_create($data_edit->tanggal_tiba); ?>
								<input type="datetime-local" name="tgl_sampai" min="<?= date_format($date, 'Y-m-d\TH:i'); ?>" class="form-control" value='<?= date_format($date, 'Y-m-d\TH:i'); ?>' required> 
							</div>

							<div class="form-group">
								<label>Kelas</label>
								<select name="kelas" class="form-control" required>
									<optgroup label="TERPILIH">
										<option selected value="<?= $data_edit->kelas ?>"><?= $data_edit->kelas ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<option value="EKONOMI">EKONOMI</option>
										<option value="EKSEKUTIF">EKSEKUTIF</option>
										<option value="BISNIS">BISNIS</option>
									</optgroup>
								</select>
							</div>

							<div class="form-group">
								<label>Harga Kereta</label>
								<input type="text" name="harga" class="form-control" required value="<?= $data_edit->harga ?>">
							</div>

							<button class="btn btn-block btn-success">Edit Jadwal</button>
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