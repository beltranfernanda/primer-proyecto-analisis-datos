
var cpk1 = [];
var fechacpk = [];
var cpkCompare = [];

for (var i = 0; i < responseServiceTask3.length; i++) { 
    cpk1.push(responseServiceTask3[i][0]['conf_value']);
}

for (var i = 0; i < responseServiceTask3Compare.length; i++) {
  cpkCompare.push(responseServiceTask3Compare[i][0]['conf_value']);
}

for (var i = 0; i < responseServiceTask3.length; i++) {
    fechacpk.push(responseServiceTask3[i][0]['conf_date'].substr(0,10));
}

const dataCpkCompare = {
    labels: fechacpk,
    datasets: [{
        label: 'Graficar Tiempo vs CPK (units/L) Jugador 1',
        backgroundColor: 'rgb(255, 12, 50)',
        borderColor: 'rgb(255, 12, 50)',
        data: cpk1,
    },
    {
        label: 'Graficar Tiempo vs CPK (units/L) Jugador 2',
        backgroundColor: 'rgb(89, 12, 245)',
        borderColor: 'rgb(89, 12, 245)',
        data: cpkCompare,
    }]
};

const configCpkCompare = {
    type: 'line',
    data: dataCpkCompare,
    options: {
        tension: 1,
        scales: {
             y: {
                beginAtZero: true
             }
        },
        plugins:{
            zoom: {
                zoom:{
                    drag:{
                        enabled: true
                    }
                }
            }
        }
    }
};

const myChartCpkCompare = new Chart(
    document.getElementById('cpk_compare'),
    configCpkCompare
);