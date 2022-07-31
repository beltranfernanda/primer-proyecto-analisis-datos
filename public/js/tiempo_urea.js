const objetoUrea = responseServiceTask3;

var urea = [];
var fecha = [];
var cantidad = objetoUrea.length;

for (var i = 0; i < cantidad; i++) {
    urea.push(objetoUrea[i][2]['conf_value']);
}

for (var i = 0; i < cantidad; i++) {
    fecha.push(objetoUrea[i][2]['conf_date'].substr(0, 10));
}

const dataUrea = {
    labels: fecha,
    datasets: [{
        label: 'Graficar Tiempo vs UREA (mmol/L)',
        backgroundColor: 'rgb(43, 214, 66)',
        borderColor: 'rgb(43, 214, 66)',
        data: urea,
    }]
};

const configUrea = {
    type: 'line',
    data: dataUrea,
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

const myChartUrea = new Chart(
    document.getElementById('urea'),
    configUrea
);
