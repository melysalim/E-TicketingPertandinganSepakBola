<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Jadwal Pertandingan</h1>

        <form action="/admin/save-jadwal" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tim_a" class="form-label">Tim A</label>
                <input type="text" class="form-control" name="tim_a" required>
            </div>
            <div class="mb-3">
                <label for="tim_b" class="form-label">Tim B</label>
                <input type="text" class="form-control" name="tim_b" required>
            </div>
            <div class="mb-3">
                <label for="logo_tim_a" class="form-label">Logo Tim A</label>
                <input type="file" class="form-control" name="logo_tim_a" required>
            </div>
            <div class="mb-3">
                <label for="logo_tim_b" class="form-label">Logo Tim B</label>
                <input type="file" class="form-control" name="logo_tim_b" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" class="form-control" name="waktu" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" name="lokasi" required>
            </div>
            <div class="mb-3">
                <label for="harga_tiket" class="form-label">Harga Tiket</label>
                <input type="number" class="form-control" name="harga_tiket" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
        </form>
    </div>
</body>

</html>