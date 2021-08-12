<!DOCTYPE html>
<html lang="en">
<head>
    <title>Template PDF</title>
    <style>
        *{
            font-family: 'Times New Roman';
            color: black;
            font-size: 10pt;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            /* line-height: 1.25; */
            /* border: 1px solid red; */
        }
        table{
            margin-top: 8.55%;
            margin-bottom: 8.55%;
            margin-left: 3cm;
            margin-right: 3cm;
        }

        .space{
            color: white;
        }

        td ol{
            margin-left: 13px;
        }

        .image{
            background-color: wheat;
            width: 3cm;
            height: 4cm;
            position: absolute;
            top: 196mm;
            right: 2cm;
        }

        .image div{
            width:3cm;
            height:4cm;
            background-color: rgb(190, 190, 190);
        }

        .text-center {
            text-align: center;
            vertical-align: middle;
            line-height: 4cm;
        }

        .image img{width: 3cm}
    </style>
</head>
<body>
    <table border="0">
        <tr valign="top">
            <th colspan="3">BIODATA</th>
        </tr>
        <tr valign="top">
            <td>NIA</td>
            <td>:</td>
            <td>{{ $anggota->nia }}</td>
        </tr>
        <tr valign="top">
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $anggota->nama_lengkap }}</td>
        </tr>
        <tr valign="top">
            <td>Nama Panggilan</td>
            <td>:</td>
            <td>
                @if ( $anggota->nama_panggilan == NULL )
                    -
                @else
                    {{ $anggota->nama_panggilan }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Tempat & Tanggal Lahir</td>
            <td>:</td>
            <td>
                @if ($anggota->tempat_lahir == NULL AND $anggota->tanggal_lahir == NULL)
                    -
                @else
                    {{ $anggota->tempat_lahir }}, {{ date('d-m-Y', strtotime($anggota->tanggal_lahir)) }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Agama</td>
            <td>:</td>
            <td>
                @if ($anggota->agama == NULL)
                    -
                @else
                    {{ $anggota->agama }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Golongan Darah</td>
            <td>:</td>
            <td>
                @if ($anggota->goldar == NULL)
                    -
                @else
                    {{ $anggota->goldar }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Fakultas</td>
            <td>:</td>
            <td>{{ $anggota->fakultas }}</td>
        </tr>
        <tr valign="top">
            <td>Jurusan</td>
            <td>:</td>
            <td>
                @if ($anggota->jurusan == NULL)
                    -
                @else
                    {{ $anggota->jurusan }}
                @endif    
            </td>
        </tr>
        <tr valign="top">
            <td>NIM</td>
            <td>:</td>
            <td>
                @if ($anggota->nim == NULL)
                    -
                @else
                    {{ $anggota->nim }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $anggota->alamat }}</td>
        </tr>
        <tr valign="top">
            <th colspan="3"><span class="space">-</span></th>
        </tr>


        <tr valign="top">
            <th colspan="3">About Me</th>
        </tr>
        <tr valign="top">
            <td>Riwayat Pendidikan</td>
        </tr>
        <tr valign="top">
            <td>SD</td>
            <td>:</td>
            <td>
                @if ($anggota->sd==NULL)
                    -
                @else
                    {{ $anggota->sd }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>SMP</td>
            <td>:</td>
            <td>
                @if ($anggota->smp==NULL)
                    -
                @else
                    {{ $anggota->smp }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>SMA</td>
            <td>:</td>
            <td>
                @if ($anggota->sma==NULL)
                    -
                @else
                    {{ $anggota->sma }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Hobi</td>
            <td>:</td>
            <td>
                @if ($anggota->hobi==NULL)
                    -
                @else
                    {{ $anggota->hobi }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Prestasi yang Pernah Diraih<span class="space">--------------------</span></td>
            <td>
                :<span class="space">-</span>
            </td>
            <td>
                @if ( $anggota->prestasi==NULL or $anggota->prestasi=="[null]")
                    -
                @else
                <ol>
                    @foreach ($prestasi as $pre)
                        <li>{{ $pre }} </li>
                    @endforeach
                </ol>
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Status Kepengurusan</td>
            <td>
                :<span class="space">-</span>
            </td>
            <td>
                @if ( $anggota->status_pengurus =="[null]" or $anggota->status_pengurus==NULL)
                    -
                @else
                    <ol>
                        @foreach ($status as $sp)
                            <li>{{ $sp }} </li>
                        @endforeach
                    </ol>
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Pelatihan yang Pernah Diikuti</td>
        </tr>
        <tr valign="top">
            <td>Pelatihan PMI</td>
            <td>:</td>
            <td>
                @if ($anggota->pelatihan_pmi==NULL)
                    -
                @else
                    {{ $anggota->pelatihan_pmi }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Pelatihan di luar PMI</td>
            <td>:</td>
            <td>
                @if ($anggota->pelatihan_luar==NULL)
                    -
                @else
                    {{ $anggota->pelatihan_luar }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Spesialisasi yang Pernah Dimiliki</td>
        </tr>
        <tr valign="top">
            <td>Spesialisasi PMI</td>
            <td>:</td>
            <td>
                @if ($anggota->spesialisasi_pmi==NULL)
                    -
                @else
                    {{ $anggota->spesialisasi_pmi }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Spesialisasi di luar PMI</td>
            <td>:</td>
            <td>
                @if ($anggota->spesialisasi_luar==NULL)
                    -
                @else
                    {{ $anggota->spesialisasi_luar }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Pengalaman Kerja</td>
            <td>:</td>
            <td>
                @if ($anggota->pengalaman_kerja==NULL)
                    -
                @else
                    {{ $anggota->pengalaman_kerja }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Kemampuan Bahasa Asing</td>
            <td>:</td>
            <td>
                @if ($anggota->bahasa==NULL)
                    -
                @else
                    {{ $anggota->bahasa }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Bakat</td>
            <td>:</td>
            <td>
                @if ($anggota->bakat==NULL)
                    -
                @else
                    {{ $anggota->bakat }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Cita - Cita</td>
            <td>:</td>
            <td>
                @if ($anggota->cita_cita==NULL)
                    -
                @else
                    {{ $anggota->cita_cita }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Motto Hidup</td>
            <td>:</td>
            <td>
                @if ($anggota->motto==NULL)
                    -
                @else
                    {{ $anggota->motto }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <th colspan="3"><span class="space">-</span></th>
        </tr>
        <tr valign="top">
            <th colspan="3">Contact Me</th>
        </tr>
        <tr valign="top">
            <td>Nomor HP</td>
            <td>:</td>
            <td>
                @if ($anggota->nomor_hp == NULL)
                    -
                @else
                    {{ $anggota->nomor_hp }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>WhatsApp</td>
            <td>:</td>
            <td>
                @if ($anggota->whatsapp == NULL)
                    -
                @else
                    {{ $anggota->whatsapp }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Telegram</td>
            <td>:</td>
            <td>
                @if ($anggota->telegram == NULL)
                    -
                @else
                    {{ $anggota->telegram }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Facebook</td>
            <td>:</td>
            <td>
                @if ($anggota->facebook == NULL)
                    -
                @else
                    {{ $anggota->facebook }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Instagram</td>
            <td>:</td>
            <td>
                @if ($anggota->instagram == NULL)
                    -
                @else
                    {{ $anggota->instagram }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Twitter</td>
            <td>:</td>
            <td>
                @if ($anggota->twitter == NULL)
                    -
                @else
                    {{ $anggota->twitter }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>ID Line</td>
            <td>:</td>
            <td>
                @if ($anggota->id_line == NULL)
                    -
                @else
                    {{ $anggota->id_line }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>E-Mail</td>
            <td>:</td>
            <td>
                @if ($user->email==NULL)
                    -
                @else
                    {{ $user->email }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <th colspan="3"><span class="space">-</span></th>
        </tr>
        <tr valign="top">
            <td>Kesan buat KSR UNTAN</td>
            <td>:</td>
            <td>
                @if ($anggota->kesan == NULL)
                    -
                @else
                    {{ $anggota->kesan }}
                @endif
            </td>
        </tr>
        <tr valign="top">
            <td>Pesan</td>
            <td>:</td>
            <td>
                @if ($anggota->pesan == NULL)
                    -
                @else
                    {{ $anggota->pesan }}
                @endif
            </td>
        </tr>
    </table>
    <div class="image">
        @if ($anggota->foto==NULL)
            <div>
                <div class="text-center">Foto 3x4</div>
            </div>
        @else
            <img src="{{ asset('img/anggota/') . '/' . $anggota->foto }}" alt="Foto Profil" class="img card-img">
        @endif
    </div>
</body>
</html>