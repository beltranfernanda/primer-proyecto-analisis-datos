import { NormalDistribution } from './normal_distribution.js'
const objetoUrea = responseServiceTask3;

var urea = [];
for (var i = 0; i < cantidad; i++) {
  urea.push(objetoUrea[i][2]['conf_value']);
}

var normalDistribution = new NormalDistribution(urea)

const dataGaussBell = {
  labels: normalDistribution.generateValuesOfX(),
  datasets: [{
    label: 'Rango de urea',
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
  document.getElementById('gaussian_urea'),
  configGaussBell
);

document.getElementById('average_urea').innerHTML = normalDistribution.calculateAverage()
document.getElementById('variance_urea').innerHTML = normalDistribution.calculateVariance()
document.getElementById('std_deviation_urea').innerHTML = normalDistribution.calculateStandardDeviation()