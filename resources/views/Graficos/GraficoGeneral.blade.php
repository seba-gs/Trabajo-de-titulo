@extends('welcome')
@section('contenido-principal')

        <div class="row div-grafico">
            <h3>Ventas mensuales</h3>
            <canvas id="barChart"></canvas>
        </div>
        <div class="row grafico">
            <div class="row">
                <h3>Estadisticas</h3>
                <table class="table table-striped" style="margin: 1px">
                    <thead>
                        <tr>
                            <th>Ventas anuales</th>
                            <th>Total en pesos</th>
                            <th>Producto menos vendido</th>
                            <th>Producto mas vendido</th>
                        </tr>
                        <tr>
                            <td>{{$cantidad}}</td>
                            <td>${{number_format($total, 0, ",", ".")}}</td>
                            <td>{{$menosVendido -> nombre}}</td>
                            <td>{{$masVendido -> nombre}}</td>
                        </tr>
                    </thead>
            </div>
        </div>
    
    <script>
        $(function(){
            var datas = @php echo json_encode($datas) @endphp;
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [
                        {
                            label: 'Cantidad de ventas',
                            data: datas,
                            backgroundColor:[
                                'rgba(100, 30, 22, 0.1)', 
                                'rgba(74, 35, 90, 0.1)',
                                'rgba(133, 193, 233, 0.1)',
                                'rgba(52, 73, 94, 0.1)',
                                'rgba(211, 84, 0, 0.1)',
                                'rgba(39, 174, 96, 0.1)', 
                                'rgba(244, 208, 63, 0.1)', 
                                'rgba(149, 165, 166, 0.1)', 
                                'rgba(29, 131, 72, 0.1)', 
                                'rgba(245, 176, 65, 0.1)', 
                                'rgba(19, 141, 117, 0.1)', 
                                'rgba(231, 76, 60, 0.1)'
                            ],
                            borderColor:[
                                'rgb(100, 30, 22)', 
                                'rgb(74, 35, 90 )',
                                'rgb(133, 193, 233)',
                                'rgb(52, 73, 94)',
                                'rgb(211, 84, 0)',
                                'rgb(39, 174, 96)', 
                                'rgb(244, 208, 63)', 
                                'rgb(149, 165, 166)', 
                                'rgb(29, 131, 72)', 
                                'rgb(245, 176, 65)', 
                                'rgb(19, 141, 117)', 
                                'rgb(231, 76, 60)'
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales:{
                        yAxes: [{
                            ticks: {
                                beginAtzero: true
                            }
                        }]
                    }
                }
            })
        });
    </script>
@endsection