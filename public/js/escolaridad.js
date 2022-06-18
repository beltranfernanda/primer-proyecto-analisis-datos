const objetoEscolaridad = responseService.map(item => item.valores[5])
const escolaridades = Object.values(objetoEscolaridad)

var lista = [];
var lista2 = [];
var cantidades = [];
var contador = 1;

for (let i = 0; i <= escolaridades.length; i++) {
    if (escolaridades[i] !== undefined) {
        let pos = escolaridades[i]['value'];
        if (lista.includes(pos) === false) {
            lista.push(pos)
        }
        pos = '';
    }
}

for (let i = 0; i <= escolaridades.length; i++) {
    if (escolaridades[i] !== undefined) {
        let pos = escolaridades[i]['value'];
        pos.toUpperCase()
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

const dataEscolaridad = {
    labels: lista,
    datasets: [{
        label: 'Graficar Escolaridad',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: cantidades,
    }]
};

const configEscolaridad = {
    type: 'line',
    data: dataEscolaridad,
    options: {}
};

const myChartEscolaridad = new Chart(
    document.getElementById('escolaridad'),
    configEscolaridad
);

console.log("Desde Escolaridad: ", responseService)