<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengisian Data Alumni</title>
    <style>
        :root {
            --primary: #1a1abf;
            --accent: #ffea00;
            --bg: #f4f4f4;
            --shadow: rgba(0, 0, 0, 0.1);
        }

        * {
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg);
            color: #333;
        }

        header {
            background-color: var(--primary);
            color: white;
            text-align: left;
            padding: 20px 60px;
        }

        header h1 {
            font-size: 24px;
            letter-spacing: 1px;
        }

        header span {
            color: var(--accent);
            font-weight: 600;
        }

        .container {
            max-width: 900px;
            background: #fff;
            margin: 40px auto;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .text-danger {
            color: #f00000
        }

        .container h2 {
            margin-bottom: 25px;
            font-size: 22px;
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 40px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
            margin-top: 10px
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-shadow: inset 0 2px 4px var(--shadow);
        }

        input[type="file"] {
            padding: 4px;
        }

        .radio-group {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 4px;
        }

        .note {
            font-size: 12px;
            color: #888;
        }

        /* 🔹 Tempat & Tanggal lahir jadi satu baris */
        .lahir-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .btn-wrapper {
            margin-top: 25px;
            display: flex;
            justify-content: flex-end;
            /* <-- tombol di ujung kanan */
        }

        .btn-submit {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: .16s;
            box-shadow: 0 6px 18px rgba(26, 26, 191, 0.14);
        }

        .btn-submit:hover {
            filter: brightness(.94)
        }

        footer {
            text-align: center;
            background: var(--primary);
            color: white;
            padding: 10px;
            font-size: 13px;
            margin-top: 30px;
        }

        @media (max-width: 700px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .lahir-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="fixed-top">
        <h1>SISTEM<span> ALUMNI</span></h1>
    </header>

    <div class="container">
        <h2>Pengisian Data</h2>

        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="form-grid">
                <!-- Kiri -->
                <div>
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" autocomplete="off">
                    @error('nama')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" autocomplete="off">
                    @error('email')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jk" value="Laki-laki"> Laki-laki</label>
                        <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
                    </div>
                    @error('jk')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                    <label>Tempat Tanggal Lahir</label>
                    <div class="lahir-row">
                        <input type="text" name="tempat" placeholder="Tempat" value="{{ old('tempat') }}"
                            autocomplete="off">
                        @error('tempat')
                            <label class="form-label text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                        @enderror
                        <input type="date" name="tanggal_lahir">
                        @error('tanggal_lahir')
                            <label class="form-label text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                        @enderror
                    </div>
                </div>

                <!-- Kanan -->
                <div>
                    <label>NPM</label>
                    <input type="text" name="npm" value="{{ old('npm') }}">
                    @error('npm')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                    <label>Angkatan</label>
                    <select name="angkatan">
                        <option value="" selected>-- Pilih Angkatan --</option>
                        @forelse ($angkatan as $data)
                            <option value="{{ $data->id }}">{{ $data->angkatan }}</option>
                        @empty
                            <option value="" disabled>-- Data Kosong --</option>
                        @endforelse
                    </select>
                    @error('angkatan')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" value="{{ old('no_telp') }}">
                    @error('no_telp')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                    <label>Tahun Lulus</label>
                    <input type="number" name="tahun_lulus" placeholder="Contoh: 2023"
                        value="{{ old('tahun_lulus') }}">
                    @error('tahun_lulus')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror

                </div>
            </div>
            <div class="btn-wrapper">
                <button type="submit" class="btn-submit">Simpan Data</button>
            </div>
        </form>
    </div>

    <footer>
        Managed by D-III Manajemen Informatika
    </footer>

</body>

</html>
