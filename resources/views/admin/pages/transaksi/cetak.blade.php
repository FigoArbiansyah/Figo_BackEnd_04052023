<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
</head>

<body>
    <a href="/cetak_transaksi" style="display: none">Kembali</a>
    <table class="table" border="1" cellpadding=10 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>Transaction Date</th>
                <th>Description</th>
                <th>Credit</th>
                <th>Debit</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($transaksi->get() as $data)
                <tr>
                    <td>{{ $data->transaction_date }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->debit_credit_status == 'C' ? $data->amount : '-' }}</td>
                    <td>{{ $data->debit_credit_status == 'D' ? $data->amount : '-' }}</td>
                    <td>{{ $data->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print()
        setInterval(() => {
            document.querySelector("table").style.display = "none"
            document.querySelector("a").style.display = "block"
        }, 1);
    </script>
</body>

</html>
