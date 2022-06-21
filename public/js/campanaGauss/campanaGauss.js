import { getAge } from '../../../models/rangeAges.js'
import { NormalDistribution } from './NormalDistribution.js'

const listAges = await getAge(responseService)
var normalDistribution = new NormalDistribution(listAges)

const dataGaussBell = {
  labels: normalDistribution.generateValuesOfX(),
  datasets: [{
    label: 'Rango de edades',
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
  document.getElementById('campanaGauss'),
  configGaussBell
);

document.getElementById('textOfCampanaGauss').innerHTML = "<br><b>Media de las edades:</b> " + normalDistribution.calculateAverage() 
+ "<br> <b>Desviación estandar:</b> " + normalDistribution.calculateStandardDeviation()
