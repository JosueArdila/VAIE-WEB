google.charts.load('current', {'packages':['corechart'], 'language': 'es'});

function drawChart4(matriz) {

  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Departamento');
  data.addColumn('number', 'Cantidad de grupos');
  var JOBJ = JSON.parse(matriz);
  for (var i = 0; i < Object.keys(JOBJ).length; i++) {
  	var fila = JOBJ[i+""];
  	//console.log(fila["0"]+" "+fila["1"]);
  	data.addRow([fila["0"],Number(fila["1"])]);
  } 
  // Set chart options
  var options = {'title':'Numero de grupos registrados por Departamento.',
                 'width':'100%',
                 'height':800,
                 'sliceVisibilityThreshold':0,

                  vAxis : { 
                    textStyle : {
                      fontSize: 7 
                    }
                  },

                  hAxis : { 
                    textStyle : {
                      fontSize: 12 
                    }
                  },

                  chartArea: {
                    width: '60%',
                    height: '80%',
                  }
             	};


  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.BarChart(document.getElementById('graficas'));
  chart.draw(data, options);
  resize(data,options);
}

function resize(data,options){  
  $(window).resize(function(){
      var chart = new google.visualization.BarChart(document.getElementById('graficas'));
      chart.draw(data,options);
  });
}

$('#gra1').click(function(){
        moduloGrafica.darCantidad().
        then((response)=>{
        google.charts.setOnLoadCallback(drawChart4(response));        
        }).catch((error)=>{
          console.log("no hay");
        });
});