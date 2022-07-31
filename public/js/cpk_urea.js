const objeto = responseServiceTask3;

var cpk = [];
var urea = [];
var cantidad = objeto.length;
 
for (var i = 0; i < cantidad; i++) {
    cpk.push(objeto[i][0]['conf_value']);
}

for (var i = 0; i < cantidad; i++) {
    urea.push(objeto[i][2]['conf_value']);
}

const dataCpkUrea = {
    labels: urea,
    datasets: [{
        label: 'Graficar CPK-Urea Dispersión',
        backgroundColor: 'rgb(255, 12, 50)',
        borderColor: 'rgb(255, 12, 50)',
        data: cpk,
    }]
};

const configCpkUrea = {
    type: 'scatter',
    data: dataCpkUrea,
    options: {
        scales: {
            x: {
                type: 'linear',
                position: 'bottom'
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

const myChartCpkUrea = new Chart(
    document.getElementById('cpk_urea'),
    configCpkUrea
);