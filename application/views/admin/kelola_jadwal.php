<!DOCTYPE html>
<html>
<head>
	<title>Kelola Jadwal - Admin</title>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables.css') ?>">
	<link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables-b4.css') ?>">
</head>
<body>

	<div class="container-fluid my-4">
		
		<?php if($this->session->flashdata('pesan') !== null): ?>

			<div class="alert alert-success">
				<?= $this->session->flashdata('pesan') ?>
			</div>

		<?php endif; ?>

		<div class="card">
			<div class="card-header bg-primary text-white text-center">Daftar Jadwal </div>
			<div class="card-body">
				<div class="alert alert-primary">
					<strong>Perhatian !</strong> Tombol " <strong> Hapus Semua Data </strong>" akan menghapus Semua Data di Jadwal dan <strong>Data tidak dapat kembali lagi</strong>
				</div>
				
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">Tambah Jadwal</button>

				<a onclick="return confirm('Yakin ingin menghapus semua data Jadwal ?')"  href="<?= base_url('hapus/semua/jadwal') ?>" class="btn btn-primary" >Hapus Semua Data</a>
				<br><br>

				<table class="table table-striped table-bordered datatables">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kereta</th>
							<th>Asal</th>
							<th>Tujuan</th>
							<th>Tanggal Berangkat</th>
							<th>Tanggal Sampai</th>
							<th>Kelas</th>
							<th>Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($jadwal as $jd): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $jd->nama_kereta ?></td>
							<td><?= $jd->ASAL ?></td>
							<td><?= $jd->TUJUAN ?></td>
							<td><?= $jd->tanggal_berangkat ?></td>
							<td><?= $jd->tanggal_tiba ?></td>
							<td><?= $jd->kelas ?></td>
							<td><?= "Rp. " . number_format($jd->harga,0,',','.'); ?></td>
							<td>
								<div class='btn-group btn-group-sm'>
									<a class="btn btn-danger" href="<?= base_url('hapusJadwal/'.$jd->id) ?>">Hapus</a>
									<a class="btn btn-primary" href="<?= base_url('admin/dashboard/edit-jadwal/'.$jd->id) ?>">Edit</a>
									<?php if($jd->status === "0"): ?>
										<a class="btn btn-success" href="<?= base_url('admin/dashboard/berangkat-jadwal/'.$jd->id) ?>">Berangkat</a>
									<?php else: ?>
										<button class="btn btn-success" disabled>Sudah Berangkat</button>
									<?php endif;
									?>
								</div>	
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Tambah-->
	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header bg-warning text-white">
			<h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="<?= base_url('tambahJadwal') ?>" method="POST">
		<div class="modal-body">
			<div class="form-group">
				<label>Nama Kereta</label>
				<input type="text" name="nama_kereta" placeholder="Nama Kereta" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Stasiun Asal</label>
				<select name="asal" class="form-control" required>
					<?php foreach ($stasiun as $st): ?>
						<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label>Stasiun Tujuan</label>
				<select name="tujuan" class="form-control" required>
					<?php foreach ($stasiun as $st): ?>
						<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label>Tanggal Berangkat</label>
				<input type="datetime-local" name="tanggal_berangkat" class="form-control" min="<?= date('Y-m-d\TH:i') ?>" value='<?= date('Y-m-d\TH:i') ?>' required>  
			</div>

			<div class="form-group">
				<label>Tanggal Sampai</label>
				<input type="datetime-local" name="tanggal_tiba" min="<?= date('Y-m-d\TH:i') ?>" class="form-control" value='<?= date('Y-m-d\TH:i') ?>' required> 
			</div>

			<div class="form-group">
				<label>Kelas</label>
				<select name="kelas" class="form-control" required>
					<option value="EKONOMI">EKONOMI</option>
					<option value="EKSEKUTIF">EKSEKUTIF</option>
					<option value="BISNIS">BISNIS</option>
				</select>
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="number" name='harga' placeholder='Harga' class='form-control' required>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-success">Tambah Jadwal</button>
		</div>
		</form>	
		</div>
	</div>
	</div>



	<script src="<?= base_url('bootstrap/js/bootstrap.min.js')?>"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>