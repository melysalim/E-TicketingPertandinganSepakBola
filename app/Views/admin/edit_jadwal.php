<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Jadwal Pertandingan</h2>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->get('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="/admin/update-jadwal/<?= $jadwal['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tim_a" class="form-label">Tim A</label>
                <input type="text" class="form-control" id="tim_a" name="tim_a" value="<?= $jadwal['tim_a'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tim_b" class="form-label">Tim B</label>
                <input type="text" class="form-control" id="tim_b" name="tim_b" value="<?= $jadwal['tim_b'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $jadwal['tanggal'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $jadwal['waktu'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $jadwal['lokasi'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga_tiket" class="form-label">Harga Tiket</label>
                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" value="<?= $jadwal['harga_tiket'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="logo_tim_a" class="form-label">Logo Tim A</label>
                <input type="file" class="form-control" id="logo_tim_a" name="logo_tim_a">
                <img src="<?= base_url('uploads/logos/' . $jadwal['logo_tim_a']) ?>" width="100" alt="Logo Tim A">
            </div>
            <div class="mb-3">
                <label for="logo_tim_b" class="form-label">Logo Tim B</label>
                <input type="file" class="form-control" id="logo_tim_b" name="logo_tim_b">
                <img src="<?= base_url('uploads/logos/' . $jadwal['logo_tim_b']) ?>" width="100" alt="Logo Tim B">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>
