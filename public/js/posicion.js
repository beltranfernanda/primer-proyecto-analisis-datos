const objetoPosicion = responseService.map(item => item.valores[4])
const posiciones = Object.values(objetoPosicion)

var lista = [];
var lista2 = [];
var cantidades = [];
var contador = 1;

for (let i = 0; i <= posiciones.length; i++) {
    if (posiciones[i] !== undefined) {
        let pos = posiciones[i]['value'];
        pos = pos.toUpperCase();
        if (lista.includes(pos) === false) {
            lista.push(pos)
        }
        pos = '';
    }
}

for (let i = 0; i <= posiciones.length; i++) {
    if (posiciones[i] !== undefined) {
        let pos = posiciones[i]['value'];
        pos = pos.toUpperCase()
        lista2.push(pos)
        pos = '';
    }
}

lista.sort()
lista2.sort()
for(let i = 0; i <= lista2.length; i++){
    if(lista2[i + 1] === lista2[i]){
        contador++;
    } else {
        cantidades.push(contador);
        contador = 1;
    }
}

const dataPosicion = {
    labels: lista,
    datasets: [{
        label: 'Graficar Psosición',
        backgroundColor: 'rgb(0, 102, 255)',
        borderColor: 'rgb(0, 102, 255)',
        data: cantidades,
    }]
};

const configPosicion = {
    type: 'line',
    data: dataPosicion,
    options: {}
};

const myChartPosicion = new Chart(
    document.getElementById('posicion'),
    configPosicion
);