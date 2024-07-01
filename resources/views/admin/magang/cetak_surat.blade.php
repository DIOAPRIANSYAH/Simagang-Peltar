<!DOCTYPE html>
<html>

<head>
    <title>Cetak Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
        }

        pre {
            font-family: Arial, sans-serif;
            margin: 10px 0;
            padding: 0;
        }

        ul,
        p {
            margin-left: 9%;
            margin-right: 5%;
        }

        .container {
            margin: 10px;
        }

        .header,
        .footer {
            text-align: right;
        }

        .logo {
            text-align: right;
            margin-right: 5%;
        }

        .contact {
            text-align: left;
            margin-top: 100px;
        }

        .content {
            margin-top: 20px;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/images/logo ptba.png') }}" width="200" height="40" alt="Logo PTBA">
        </div>
        <div class="header">
            <p>Bandar Lampung, {{ strftime('%d %B %Y') }}</p>
        </div>

        @php
            function formatDate($date)
            {
                return strftime('%d %B %Y', strtotime($date));
            }
        @endphp
        <div class="content">
            <p>
                Nomor : B/ /25501/HM.03/VI/2024 <br>
                Sifat : Biasa <br>
                Lampiran : - Berkas <br>
                Perihal : Surat Jawaban Permohonan PKL – {{ $magang->user->name }}
            </p>
            <p>Yang terhormat,<br>
                <strong>Ketua Jurusan {{ $magang->user->jurusan }}</strong><br>
                <strong>{{ $magang->user->nama_sekolah }}</strong><br>
                {{ $magang->alamat_kampus }} <br>
                {{ $magang->user->provinsi }}
            </p>

            <p>Menunjuk surat Ketua Jurusan {{ $magang->user->jurusan }} – {{ $magang->user->nama_sekolah }} nomor:
                {{ $magang->nomor_surat_rekomendasi }} tanggal {{ formatDate($magang->created_at) }} perihal Permohonan
                Praktik Kerja
                Lapangan (PKL) maka dengan ini kami sampaikan tanggapan sebagai berikut:</p>

            <p>Perusahaan dapat menerima PKL Mahasiswa {{ $magang->user->nama_sekolah }} Jurusan
                {{ $magang->user->jurusan }}
                Yaitu:
                {{ $magang->user->name }}/NPM: {{ $magang->user->nomor_induk }},
                @foreach ($anggota as $a)
                    {{ $a->nama }}/NPM: {{ $a->nomor_induk }},
                @endforeach
            </p>

            <ul>
                <li>PKL akan dilaksanakan dari tanggal {{ formatDate($magang->tanggal_mulai) }} s/d
                    {{ formatDate($magang->tanggal_berakhir) }}
                    di <strong>Satuan Kerja
                        {{ $magang->satuan_kerja }}</strong> dengan pembimbing Sdr/Sdri.
                    <strong>{{ $magang->dosen_pembimbing_lapangan }}</strong>;
                </li>
                <li>Peserta PKL harus mematuhi peraturan dan tata tertib kerja Perusahaan serta ikut memelihara
                    kebersihan di lingkungan lokasi;</li>
                <li>Peserta PKL diwajibkan menyediakan sendiri perlengkapan keselamatan kerja seperti Helm, sepatu,
                    pakaian kerja, rompi;</li>
                <li>Perusahaan tidak menyediakan/memberikan biaya transportasi dan akomodasi;</li>
                <li>Perusahaan tidak memberikan Asuransi kecelakaan & biaya pengobatan;</li>
                <li>Peserta PKL dianjurkan menggunakan pakaian seragam Almamater atau Bebas tetapi sopan;</li>
                <li>Peserta PKL diwajibkan membawa pas <strong>photo berwarna terbaru ukuran 3X4</strong> sebanyak dua
                    lembar dan
                    diserahkan pada hari pertama PKL;</li>
                <li>Perusahaan tidak memungut biaya apapun yang berkaitan dengan pelaksanaan PKL ini;</li>
                <li>Peserta PKL wajib membawa <strong>Kartu Tanda Pelajar/Kartu Tanda Mahasiswa;</strong></li>
                <li>Peserta PKL wajib memberikan hasil laporan kerja praktek maksimal 3 (tiga) bulan dan
                    mempresentasikannya sebelum diterbitkan Surat Keterangan Kerja Praktek/Laporan Hasil Akhir PKL;</li>
                <li>Peserta PKL wajib melapor ke Satker SDM Umum Hukum & Humas pada hari pertama & hari terakhir
                    pelaksanaan PKL/Magang/Penelitian;</li>
            </ul>

            <p>Demikian kami sampaikan dan atas perhatiannya diucapkan terima kasih.</p>
        </div>

        <div class="signature">
            <strong>
                <p>Pgs. AVP SDM Umum Keuangan & CSR<br>
                    Unit Pelabuhan Tarahan</p>
                <br><br><br><br>
                <p>Muslimin</p>
            </strong>
        </div>
        <br><br>
        <div class="contact">
            <img src="{{ asset('assets/images/footer_surat.png') }}" height="70" width="800" alt="Logo PTBA">
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.search.includes('print=true')) {
                window.print();
            }
        });
    </script>
</body>

</html>
