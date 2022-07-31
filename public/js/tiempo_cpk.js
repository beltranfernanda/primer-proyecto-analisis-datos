const objetoCpk = responseServiceTask3;

var cpk = [];
var fecha = [];
var cantidad = objetoCpk.length;

for (var i = 0; i < cantidad; i++) { 
    cpk.push(objetoCpk[i][0]['conf_value']);
}

for (var i = 0; i < cantidad; i++) {
    fecha.push(objetoCpk[i][0]['conf_date'].substr(0,10));
}

const dataCpk = {
    labels: fecha,
    datasets: [{
        label: 'Graficar Tiempo vs CPK (units/L)',
        backgroundColor: 'rgb(255, 12, 50)',
        borderColor: 'rgb(255, 12, 50)',
        data: cpk,
    }]
};

const configCpk = {
    type: 'line',
    data: dataCpk,
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

const myChartCpk = new Chart(
    document.getElementById('cpk'),
    configCpk
);