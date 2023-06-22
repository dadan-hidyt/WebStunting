<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Grafik</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');

.card {
       border-radius: 40px; 
       overflow: hidden;
       border: 0;
       box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06),
                   0 2px 4px rgba(0, 0, 0, 0.07);
       transition: all 0.15s ease;
}

.card:hover {
             box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1),
                         0 10px 8px rgba(0, 0, 0, 0.015);
}

.card-body .card-title {
                  font-family: 'Lato', sans-serif;
                  font-weight: 700;
                  letter-spacing: 0.3px;
                  font-size: 24px;
                  color: #121212;
}

.card-text {
             font-family: 'Lato', sans-serif;
             font-weight: 400;
             font-size: 15px;
             letter-spacing: 0.3px;
             color: #4E4E4E;
  
}

.card .container {
           width: 88%;
          background: #F0EEF8;
           border-radius: 30px;
           height: 140px;
         display: flex;
        align-items: center;
         justify-content: center;
}

.container:hover > img {
                       transform: scale(1.2);
}

.container img {
                padding: 75px;  
               margin-top: -40px;
               margin-bottom: -40px;
              transition: 0.4s ease;
              cursor: pointer;
}

.btn {
      background: #EEECF7;
      border: 0;
      color: #5535F0;
      width: 98%;
      font-weight: bold;
      border-radius: 20px;
      height: 40px;
      transition: all 0.2s ease;
}

.btn:hover {
            background: #441CFF;
}

.btn:focus {
            background: #441CFF;
            outline: 0;  
}
 

 
        </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2">
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
                        <div class="card-header bg-warning text-white">Total Kasus Berdasarkan Jenis Kelamin</div>
                        <div class="card-body">
                            <div id="byJk"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">Total Kasus Berdasarkan Umur</div>
                        <div class="card-body">
                            <div id="byUmur"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card" style="height: 100%">
                        <div class="card-header bg-info text-white">Prevalensi</div>
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="prevalensi text-center" style="display: none;" >
                                <div class="fw-bold h5">Prevalensi: <span id="prevalensi" >0</span>%</div>
                                <div >Total Anak: <span id="total_anak"></span></div>
                                <div>Total Stunting: <span id="total_stunting"></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 mb-3 mt-3">
            <div class="card">
                <div class="card-header bg-purple ">
                   <div class="card-title"> Total Kasus Berdasarkan Kecamatan</div>
                </div>
                <div class="card-body">
                    <div id="byKecamatan"></div>
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

        const PrevalensiChart = async function (data) {
            const response = await fetch(data.url);
            const jsonData = await response.json();
            document.querySelector('.prevalensi').style.display = 'block';
            document.getElementById('prevalensi').innerHTML = jsonData.prev ?? 0;
            document.getElementById('total_anak').innerHTML = jsonData.total_anak ?? 0;
            document.getElementById('total_stunting').innerHTML = jsonData.total_stunting ?? 0;
            console.log(jsonData)
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
        async function TotalKeseluruhanPerKecamatan(data){
            const response = await fetch(data.url);
            const jsonData = await response.json();
            barChart({
                element: 'byKecamatan',
                width : '100%',
                data: jsonData.data,
            });
        }

        input.onchange = function(e) {
            DrawChartJk({url: '{{ route('ajax.statistik.byJenisKelamin') }}?kab_kota_id=' + e.target.value});
            drawByUmur({url: '{{ route('ajax.statistik.byUmur') }}?kab_kota_id=' + e.target.value});
            PrevalensiChart({url: '{{ route('ajax.statistik.prevalensi') }}?kab_kota_id=' + e.target.value});
            TotalKeseluruhanPerKecamatan({url: '{{ route('ajax.statistik.byKecamatan') }}?kab_kota_id=' + e.target.value});

        }
        DrawChartJk({url: '{{ route('ajax.statistik.byJenisKelamin') }}?kab_kota_id=1'});
        drawByUmur({url: '{{ route('ajax.statistik.byUmur') }}?kab_kota_id=1'});
        PrevalensiChart({url: '{{ route('ajax.statistik.prevalensi') }}?kab_kota_id=1'});
        TotalKeseluruhanPerKecamatan({url: '{{ route('ajax.statistik.byKecamatan') }}?kab_kota_id=1'});
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>

</body>

</html>
