<html>
<head>
<title>Reporting</title>
</head>
<body>
<h2>* Report Pulsa</h2>
                <table border="">
                <thead>
                    <tr style="background-color: #4271ff; color:white; font-style:bold;">
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Telepon</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($pelanggan as $p): ?>
                    <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td class="text-center">{{ $p->nama }}</td>
                    <td class="text-center">{{ $p->alamat }}</td>
                    <td class="text-center"><b>{{ $p->telepon }}</b></td>
                    <td class="text-center"><b>Rp. {{ $p->jumlah }}</b></td>
                   
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
                <h1>
                <b> Total : Rp. {{ number_format(DB::table('pelanggan')->sum('jumlah')) }}</b>
                </h1>
    <script>
        window.print();
    </script>
</body>
</html>
                
