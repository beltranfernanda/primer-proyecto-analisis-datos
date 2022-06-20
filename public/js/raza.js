const ob = responseService.map(item => item.valores[6])
const razaList = Object.values(ob)
console.log(ob)

var razaLabels = [];
var razaData = [];
var razaAux = [];
var contador = 1;

for(let i = 0; i < razaList.length; i++ ){
    if(razaList[i] && !razaLabels.includes(razaList[i].value)){
        razaLabels.push(razaList[i].value);
    }
}

for (let i = 0; i <= razaList.length; i++) {
    if (razaList[i]) {
        let pos = razaList[i].value;
        pos.toUpperCase()
        razaAux.push(pos)
        pos = '';
    }
}

razaLabels.sort()
razaAux.sort()
for(let i = 0; i <= razaAux.length; i++){
    if(razaAux[i + 1] === razaAux[i]){
        contador++;
    } else {
        razaData.push(contador);
        contador = 1;
    }
}

const dataRaza = {
    labels: razaLabels,
    datasets: [{
        label: 'Grafica Raza',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: razaData,
    }]
};

const configRaza = {
    type: 'line',
    data: dataRaza,
    options: {}
};

const myChartRaza = new Chart(
    document.getElementById('raza'),
    configRaza
);