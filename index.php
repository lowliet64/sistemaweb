<?php  include "connection.php"; ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="jquery-1.9.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>
		var i=0;
		var temps=[];	
		var presses=[];
		var umis=[];
		var vels=[];
		var dirs=[];	
	</script>
	
</head>
<body style=" background: #993399  ">




<?php

  $insert1="INSERT INTO coleta(press,temp,umi,vel,dir)
   VALUES('1024','25','26','10','43')";
  $query=mysql_query($insert1);
  

  $insert2="INSERT INTO coleta(press,temp,umi,vel,dir)
   VALUES('1024','26','27','12','36')";
  $query=mysql_query($insert2);


 $insert3="INSERT INTO coleta(press,temp,umi,vel,dir)
   VALUES('1040','27','27','19','19')";
  $query=mysql_query($insert3);

 $insert4="INSERT INTO coleta(press,temp,umi,vel,dir)
   VALUES('1028','28','26','14','26')";
  $query=mysql_query($insert4);

 $insert5="INSERT INTO coleta(press,temp,umi,vel,dir)
   VALUES('1024','29','26','15','20')";
  $query=mysql_query($insert5);

   



?>

<?php 
	$sql=mysql_query("SELECT * FROM coleta");
	
 	$row =mysql_num_rows($sql);
	
	if($row > 0 ){
	  while($linha = mysql_fetch_array($sql)){
		
		$press=$linha['press'];
		$temp=$linha['temp'];
		$umi=$linha['umi'];
	        $vel=$linha['vel'];
		$dir=$linha['dir'];
		
		echo"<script>  console.log(".$temp."); </script>";
		echo"<script> temps[i]=".$temp."; 
			 presses[i]=".$press.";
			 umis[i]=".$umi.";
			 vels[i]=".$vel.";
			 dirs[i]=".$dir.";
			 i++;
		 </script>";

		}
	}




?>

    <script src="code/highcharts.js"></script>
    <script src="code/modules/exporting.js"></script>
    <div style= "width: 1345px; height: 200px; margin: 0 auto;  background:#660066  " > 
        <img src="logo.png" style="position: relative; left: 70px">

    </div>
    


<div class="container " class="collapse in" style ="padding-top: 0.5cm; background: #660066  ">
	
	<div class="panel-group" id="principal" > 
	<div class="panel panel-default">
		<div class="panel-heading"> 
			<h2 class="panel-title" data-toggle="collapse" data-parent="#principal" data-target="#pressure1"> Pressão</h2>
		</div> 
		<div class="collapse in" id="pressure1">
			<div class="panel-bory"> <div id="pressure" style="min-width: 310px; height: 400px; margin: 0 auto" > </div></div>
		</div>	
	</div>

		
	<div class="panel panel-default" >
		<div class="panel-heading"> <h2 class="panel-title" data-toggle="collapse" data-parent="#principal" data-target="#temperature1">Temperatura</h2></div> 
		<div class="collapse in" id="temperature1" >
			<div class="panel-bory"> 
			<div id="temperature" style="min-width: 310px; height: 400px; margin: 0 auto" > </div>
		</div> 	
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h2 class="panel-title" data-toggle="collapse" data-parent="#principal" data-target="#rua1"> Umidade Relativa do Ar</h2></div>
		<div class="collapse in" id="rua1">
			<div class="panel-bory"> <div id="rua" style="min-width: 310px; height: 400px; margin: 0 auto" ></div></div>	
		</div>

	</div>


	<div class="panel panel-default">
		<div class="panel-heading"> 
			<h2 class="panel-title" data-toggle="collapse" data-parent="#principal" data-target="#anemometer1">Velocidade do Vento</h2>
		</div>
			<div class="collapse in" id="anemometer1">
				<div class="panel-bory"> <div id="anemometer" style="min-width: 310px; height: 400px; margin: 0 auto" ></div> </div>		
			</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h2 class="panel-title" data-toggle="collapse" data-parent="#principal" data-target="#windv1">Direção do Vento</h2></div>	
		<div class="collapse in" id="windv1">
			<div class="panel-bory"> <div id="windv" style="min-width: 310px; height: 400px; margin: 0 auto" ></div> </div>	
		</div>

	</div>	
	
</div>
</div>
<!--- <footer style=" position: absolute; 
    bottom: 0px; 
    width: 110%; 
    height: 80px; 
    background-color: #33CC00 
 "> </footer>--> 
<script type="text/javascript" >


Highcharts.chart('pressure', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Média da Pressão Atmosférica a cada 10 minutos'
    },
    
    yAxis: {
        title: {
            text: 'Pressure (hPa)'
        }
    },
    xAxis: {
        labels: {
            format: '{value} min'
        },
        categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'],
        title: {
            text: 'Tempo'
        }
    },
	plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
	
    series: [{
        name: 'Pressão',
        data: [presses[0],presses[1],presses[2],presses[3],presses[4]]
    }]
});
        </script>	

<script type="text/javascript">

		Highcharts.chart('temperature', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Média da Temperatura a cada 10 minutos'
    },
    
    yAxis: {
        title: {
            text: 'Temperature (°C)'
        }
    },
    xAxis: {
        labels: {
            format: '{value} min'
        },
        categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'],
        title: {
            text: 'Time'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    
    series: [{
        name: 'Temperatura',
        data: [temps[0],temps[1],temps[2],temps[3],temps[4]]
    }]
});
		
	</script>
	<script type="text/javascript">

Highcharts.chart('rua', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Média da Umidade Relativa do Ar a cada 10 minutos'
    },
    
    yAxis: {
        title: {
            text: 'Relative Humidity (%rel)'
        }
    },
    xAxis: {
        labels: {
            format: '{value} min'
        },
        categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'],
        title: {
            text: 'Time'
        }
    },
	plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
	
    series: [{
        name: 'Umidade Relativa do Ar',
        data: [umis[0],umis[1],umis[2],umis[3]]
    }]
});
		</script>
		<script type="text/javascript">

Highcharts.chart('anemometer', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Média do Anemômetro a cada 10 minutos'
    },
    
    yAxis: {
        title: {
            text: 'Anemometer (m/s)'
        }
    },
    xAxis: {
        labels: {
            format: '{value} min'
        },
        categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'],
        title: {
            text: 'Time'
        }
    },
	plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
	
    series: [{
        name: 'Anemômetro',
        data: [vels[0],vels[1],vels[2],vels[3],vels[4]]
    }]
});
</script>
<script type="text/javascript">

Highcharts.chart('windv', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Média da Direção do Vento a cada 10 minutos'
    },
    
    yAxis: {
        title: {
            text: 'Wind-Vane (°)'
        }
    },
    xAxis: {
        labels: {
            format: '{value} min'
        },
        categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120'],
        title: {
            text: 'Time'
        }
    },
	plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
	
    series: [{
        name: 'Direção do Vento',
        data: [dirs[0],dirs[1],dirs[2],dirs[3],dirs[4]]
    }]
});
		</script>

</body>
</html>
