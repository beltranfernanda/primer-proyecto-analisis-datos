import { NormalDistribution } from './normal_distribution.js'
const objetoUrea = responseServiceTask3;

var cpk = [];
for (var i = 0; i < cantidad; i++) {
  cpk.push(objeto[i][0]['conf_value']);
}

var normalDistribution = new NormalDistribution(cpk)

const dataGaussBell = {
  labels: normalDistribution.generateValuesOfX(),
  datasets: [{
    label: 'Rango de cpk',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: normalDistribution.calculateNormalDistribution(),
  }]
};

const configGaussBell = {
  type: 'line',
  data: dataGaussBell,
  options: {}
};

const myChartGaussBell = new Chart(
  document.getElementById('gaussian_cpk'),
  configGaussBell
);
