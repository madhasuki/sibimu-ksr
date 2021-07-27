<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Anggota</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>NIA</th>
                <th>Nama Lengkap</th>
                <th>Nama Panggilan</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Golongan Darah</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>NIM</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $agt)
                <tr>
                    <td>{{ $agt->nomor_induk_anggota }}</td>
                    <td>{{ $agt->nama_lengkap }}</td>
                    <td>{{ $agt->nama_panggilan }}</td>
                    <td>{{ $agt->tempat_lahir }}</td>
                    <td>{{ $agt->tanggal_lahir }}</td>
                    <td>{{ $agt->agama }}</td>
                    <td>{{ $agt->golongan_darah }}</td>
                    <td>{{ $agt->fakultas }}</td>
                    <td>{{ $agt->jurusan }}</td>
                    <td>{{ $agt->nim }}</td>
                    <td>{{ $agt->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>