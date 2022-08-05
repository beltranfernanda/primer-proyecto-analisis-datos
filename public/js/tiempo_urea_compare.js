var urea1 = [];
var urea2 = [];
var fechaUrea = [];

for (var i = 0; i < responseServiceTask3.length; i++) {
    urea1.push(responseServiceTask3[i][2]['conf_value']);
}

for (var i = 0; i < responseServiceTask3Compare.length; i++) {
    urea2.push(responseServiceTask3Compare[i][2]['conf_value']);
}

for (var i = 0; i < responseServiceTask3.length; i++) {
    fechaUrea.push(responseServiceTask3[i][2]['conf_date'].substr(0, 10));
}

const dataUreaCompare = {
    labels: fechaUrea,
    datasets: [{
        label: 'Graficar Tiempo vs UREA (mmol/L) Jugador 1',
        backgroundColor: 'rgb(43, 214, 66)',
        borderColor: 'rgb(43, 214, 66)',
        data: urea1,
    },
    {
        label: 'Graficar Tiempo vs UREA (mmol/L) Jugador 2',
        backgroundColor: 'rgb(89, 12, 245)',
        borderColor: 'rgb(89, 12, 245)',
        data: urea2,
    }]
};

const configUreaCompare = {
    type: 'line',
    data: dataUreaCompare,
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

const myChartUreaCompare = new Chart(
    document.getElementById('urea_compare'),
    configUreaCompare
);
