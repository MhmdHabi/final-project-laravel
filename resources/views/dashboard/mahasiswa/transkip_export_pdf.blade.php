<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkip Matakuliah Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        .header {
            text-align: center;
            margin: 0px;
        }

        .header img {
            width: 150px;
        }

        .header p {
            font-size: 27px;
            font-weight: bold;
        }

        .title {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .student-info {
            margin-bottom: 10px;
        }

        .student-info p {
            margin: 2px 0;
            font-size: 13px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 4px;
            text-align: left;
        }

        .table th {
            background-color: #13947D;
            color: white;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .signature p {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('asset/logo_siakadnobg.jpg') }}" alt="Logo Siakad" class="logo-img" width="140">
        <p style="margin: 0">Universitas Academy</p>
        <hr>
    </div>

    <div class="title">
        Transkip Matakuliah Mahasiswa
    </div>

    <div class="student-info">
        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        <p><strong>Nama:</strong> {{ $mahasiswa->name }}</p>
        <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
        <p><strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>SKS</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transkip as $krs)
                <tr>
                    <td colspan="6" style="background-color: rgb(240, 240, 69); font-weight: bold;">Semester
                        {{ $loop->iteration }}</td>
                </tr>
                @foreach ($krs->matkulKrs as $index => $khsan)
                    <tr>
                        <td style="text-align: center">{{ $index + 1 }}</td>
                        <td>{{ $khsan->matkul->kode_mk }}</td>
                        <td>{{ $khsan->matkul->nama_mk }}</td>
                        <td>{{ $krs->semester->semester }}</td>
                        <td>{{ $khsan->matkul->sks }}</td>
                        <td>{{ getGrade($khsan->nilai) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p><strong>Indeks Prestasi Kumulatif:</strong> {{ number_format($nilai, 2) }}</p>
        <p><strong>Total SKS:</strong> {{ $totalSKS }}</p>
    </div>

    <div class="signature">
        <p>Indonesia, {{ now()->format('d F Y') }}</p>
        <br><br><br>
        <p style="margin: 0">____________________</p>
        <p><strong style="margin: 0"> {{ $dosen_pa->dosen->name }}</strong></p>
        <p>NIDN: {{ $dosen_pa->dosen->nidn }}</p>
    </div>

</body>

</html>

@php
    function getGrade($nilai)
    {
        if ($nilai !== null) {
            if ($nilai >= 3.75 && $nilai <= 4.0) {
                return 'A';
            } elseif ($nilai >= 3.5 && $nilai < 3.75) {
                return 'A-';
            } elseif ($nilai >= 3.0 && $nilai < 3.5) {
                return 'B+';
            } elseif ($nilai >= 2.75 && $nilai < 3.0) {
                return 'B';
            } elseif ($nilai >= 2.5 && $nilai < 2.75) {
                return 'B-';
            } elseif ($nilai >= 2.0 && $nilai < 2.5) {
                return 'C';
            } elseif ($nilai >= 1.5 && $nilai < 2.0) {
                return 'D';
            } else {
                return 'E';
            }
        } else {
            return 'Tidak Ada Nilai';
        }
    }
@endphp
