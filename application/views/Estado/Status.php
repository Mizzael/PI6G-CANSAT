<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/image/LogoSatelite.png">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <title> <?php  echo $titulo ?> |  SAT-6G</title>
</head>
<body>     
  <div class="wrapper">
    <div class="sidebar">
      <h2><?php echo($this->session->userdata('user')['nombre']); ?></h2>
        <ul>
          <!-- <li><a><i class="fas fa-home"></i>Home</a></li> -->
          <li><a href="<?php echo base_url(); ?>Estado/Capturas"><i class="far fa-chart-bar"></i> Lecturas</a></li>
          <!-- <li><a class="BtnObtener"><i class="far fa-chart-bar"></i> Lecuta</a></li>
          <li><a class="BtnObtener"><i class="far fa-chart-bar"></i> Lecuta Mensual</a></li> -->
          
          <li><a href="<?php echo base_url(); ?>Estado/Reporte"><i class="far fa-file-excel"></i> Reporte</a></li>
          <li><a href="<?php echo base_url(); ?>Estado/Rastreo""><i class="fas fa-satellite-dish"></i></i>Localización</a></li>
          <li><a href="<?php echo base_url(); ?>Usuario/Logout"><i class="fas fa-sign-out-alt"></i>Volver al Menú</a></li>
        </ul> 
        <div class="social_media">
          <a href="https://www.youtube.com/watch?v=FBfkXEUcnus" target="_blank"><i class="fab fa-youtube"></i></a>
          <a href="https://twitter.com/dedreviil" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/zamora_lo/?hl=es-la" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://github.com/Mizzael" target="_blank"><i class="fab fa-github"></i></a>
        </div>
      </div>
      <div class="main_content">
        <div class="header text-center">Datos del Satélite</div>  
          <div class="info">  
            
          <!-- <div id="Grafica">
              <canvas id="myChart" width="400" height="100"></canvas>
          </div> -->


            <div id="canvas-container">
		          <canvas id="chart" width="400" height="100"></canvas>
            </div>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur dolorem voluptatem, iusto quos odio animi quae magnam fugiat accusantium quibusdam eos, ad alias iste. Commodi laudantium odit quia enim optio?</p>

        </div>
      </div>
  </div>
</body>


<!-- <script>

  function Grafica(){
    
    var Fecha=[];
    var TemR=[];
    var HumR=[];
    var HumT=[];
    var TemA=[];

    var BgColor=[];
    var BgBorder=[];

      
    $.post("<?php echo base_url(); ?>Estado/ObtenerLecturas",
    function(data){
      
      var obj=JSON.parse(data);

      Fecha=[];
      TemR=[];
      HumR=[];
      HumT=[];
      TemA=[];

      $.each(obj,function(i,item){
        Fecha.push(item.lec_fechahora);
        TemR.push(item.lec_TemR);
        HumR.push(item.lec_HumR);
        HumT.push(item.lec_HumT);
        TemA.push(item.lec_TemA);
      });

      $('#myChart').remove();
      $('#Grafica').append("<canvas id='myChart' width='400' height='100'></canvas>");
      
      var ctx = $('#myChart');
      var chart = new Chart(ctx, {
        type: 'bar',//Puede variar poniendo line.
        data: 
        {
          labels: Fecha,
          datasets:[
          {
            label: "Temperatura Tierra",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(255, 99, 132, 0.8)",
            borderColor: "rgba(255, 99, 132, 0.1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 10,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 5,
            pointRadius: 1,
            pointHitRadius: 10,
            data: TemR,
            spanGaps: false,
          },
          {
            label: "Humedad Ambiente",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(54, 162, 235, 0.8)",
            borderColor: "rgba(54, 162, 235, 1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 10,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 5,
            pointRadius: 1,
            pointHitRadius: 10,
            data: HumR,
            spanGaps: false,
          },
          {
            label: "Humedad Tierra",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(255, 206, 86, 0.9)",
            borderColor: "rgba(255, 206, 86, 1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 10,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 5,
            pointRadius: 1,
            pointHitRadius: 10,
            data: HumT,
            spanGaps: false,
          },
          {
            label: "Temperatura Ambiente",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(75, 192, 192, 0.9)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 10,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 5,
            pointRadius: 1,
            pointHitRadius: 10,
            data: TemA,
            spanGaps: false,
          }
          ]},
          options: {
            scales: {
                yAxes: [{
                    ticks: {
                      suggestedMin: 20,
                        suggestedMax: 100
                    }
                }]
            }
          }
      });
    });
  }
      setInterval(Grafica,3000);
</script> -->



<script>
  $(document).ready(function(){
		
		var datos = {
			labels : ["Quetzal 4"],
			datasets : [
			{
				label : "Voltios",
				backgroundColor : "rgba(151,187,205,0.5)",
				data : [8, 39, 17, 15, 6, 9]
			},
			{
				label : "Temperatura del Aire",
				backgroundColor : "rgba(151,100,205,0.5)",
				data : [15, 19, 47, 25, 8, 10]
			},
      {
				label : "Humedad",
				backgroundColor : "rgba(80,45,205,0.5)",
				data : [22, 26, 57, 35, 84, 13]
      },
      {
				label : "Presión Atmosferica",
				backgroundColor : "rgba(151,187,205,0.5)",
				data : [40, 78, 27, 45, 54, 11]
			},
      {
				label : "Altura",
				backgroundColor : "rgba(249,102,94,0.5)",
				data : [40, 78, 27, 45, 54, 11]
			},
			]
		};


		var canvas = document.getElementById('chart').getContext('2d');
		window.bar = new Chart(canvas, {
			type : "bar",
			data : datos,
			options : {
				elements : {
					rectangle : {
						borderWidth : 1,
						borderColor : "rgb(0,255,0)",
						borderSkipped : 'bottom'
					}
				},
				responsive : true,
				title : {
					display : true,
					text : "Sensores del CanSat"
				}
			}
		});

		setInterval(function(){
			var newData = [
				[getRandom()],
				[getRandom()],
        [getRandom()],
        [getRandom()],
        [getRandom()],			
			];

			$.each(datos.datasets, function(i, dataset){
				dataset.data = newData[i];
			});
			window.bar.update();
		}, 2000);

		function getRandom(){
			return Math.round(Math.random() * 100);
		}
	});
</script>

