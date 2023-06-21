<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Grafik</title>
    <style>
        .card,.card-header,.card-body {
            border-radius: 5px!important;
            border: none;
        }
        .card{
            box-shadow: 0px 0px 8px #dedede!important;
        }
        </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <div class="card-title">Pilih Kabupaten / Kota</div>
            </div>
            <div class="card-body">
                <form action="">
                    <label for="" class="form-label">Pilih Kabupaten / Kota</label>
                    <select name="" id="select_kota" class="form-control">
                        <option value="">Pilih</option>
                        @foreach ($kab_kota as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kab_kota }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <p class="alert alert-info mt-3">Silahkan pilih Kabupaten / Kota</p>

        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-warning text-white">Berdasarkan Jenis Kelamin</div>
                        <div class="card-body">
                            <div id="byJk"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">Berdasarkan Umur</div>
                        <div class="card-body">
                            <div id="byUmur"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ assets('dist/js/PageStatistik.js') }}"></script>
    <script>
        const input = document.getElementById('select_kota');

        const drawByUmur = async function(data) {
            const response = await fetch(data.url);
            const jsonData = await response.json();
            console.log(jsonData)
            donutCharts({
                element: 'byUmur',
                data: jsonData.data ?? [],
                title: 'Total Kasus Berdasarkan UMUR',
            })
        }


        const DrawChartJk = async function(data) {
            const response = await fetch(data.url);
            const jsonData = await response.json();
            barChart({
                element: 'byJk',
                data: jsonData.data,
                title: "Statistik Kasus  ".jsonData?.kabupatenKota ?? null,
            });
        }

        input.onchange = function(e) {
            DrawChartJk({url: '{{ route('ajax.statistik.byJenisKelamin') }}?kab_kota_id=' + e.target.value});
            drawByUmur({url: '{{ route('ajax.statistik.byUmur') }}?kab_kota_id=' + e.target.value});
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>

</body>

</html>
