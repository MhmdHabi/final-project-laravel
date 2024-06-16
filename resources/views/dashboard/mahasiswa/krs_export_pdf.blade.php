<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            /* Padding untuk seluruh sel dalam tabel */
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
            /* Arahkan teks di kolom kedua ke kiri */
        }

        .invoice-box table tr.top table td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            padding: 8px;
            /* Sesuaikan padding di heading */
        }

        .invoice-box table tr.details td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
            padding: 8px;
            /* Sesuaikan padding di total */
        }

        .invoice-box .signature {
            float: right;
            /* Tempatkan tanda tangan di pojok kanan */
            margin-top: 40px;
            text-align: center;
            clear: both;
        }

        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .table-bordered {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table-bordered tr th {
            font-size: 13px;
            background-color: #13947D;
            color: white;
            padding: 8px;
            /* Sesuaikan padding di heading */
        }

        .table-bordered tr td {
            font-size: 13px;
            text-align: left;
            border: 1px solid #bdbdbd;
            padding: 8px;
            /* Sesuaikan padding di seluruh sel */
        }

        .table-responsive td,
        th {
            border: 1px solid #bdbdbd;
            text-align: left;
            padding: 5px;
        }

        hr {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table style="text-align: center; margin-top: 20px; margin-bottom: 10px;">
                        <tr>
                            <td class="title" style="padding-bottom: 10px;">
                                <img src="{{ public_path('asset/logo_siakadnobg.jpg') }}" alt="Logo Siakad"
                                    class="logo-img" width="170">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 0px;">
                                <h1 style="margin: 0;">Universitas Academy</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr style=" width: 100%;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 style="margin: 0;">Kartu Rancangan Studi</h3>
                            </td>
                        </tr>
                    </table>


                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table style="margin: 0px">
                        <tr>
                            <td style="text-align: left">
                                Nama Mahasiswa : {{ $name }}<br />
                                Nim : {{ $nim }}<br />
                                Jurusan : {{ $jurusan }} <br>
                                Jenjang Studi : Strata 1
                            </td>

                            <td style="text-align: left">
                                Pembimbing Akademik : {{ $dosen_pa->dosen->name }}<br />
                                NIDN : {{ $dosen_pa->dosen->nidn }}<br />
                                No. HP : {{ $dosen_pa->dosen->no_hp }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="heading">
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Kelas</th>
                        <th>Ruangan</th>
                        <th>Jadwal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1; @endphp
                    @foreach ($krs as $krsan)
                        <tr class="item">
                            <td>{{ $index++ }}</td>
                            <td>{{ $krsan->matkul->kode_mk }}</td>
                            <td>{{ $krsan->matkul->nama_mk }}</td>
                            <td>{{ $krsan->matkul->sks }}</td>
                            <td>{{ $krsan->matkul->kelas }}</td>
                            <td>{{ $krsan->matkul->ruangan }}</td>
                            <td>{{ date('l, H:i', strtotime($krsan->matkul->jadwal)) }}</td>
                        </tr>
                    @endforeach
                    <tr class="total">
                        <td colspan="3">Total SKS diambil</td>
                        <td colspan="4">{{ $totalSKS }}/24</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="signature">
            Indonesia, Mengetahui
            <br>
            <br>
            <br>
            <p style="margin: 0">____________________</p>
            <p style="margin: 0px"> {{ $dosen_pa->dosen->name }}</p>
            <p style="margin: 0">( {{ $dosen_pa->dosen->nidn }} )</p>
        </div>
    </div>
</body>

</html>
