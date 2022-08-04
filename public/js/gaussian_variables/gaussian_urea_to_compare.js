import { NormalDistribution } from './normal_distribution.js'
const objetoUrea = responseServiceTask3;
const objetoUreaCompare = responseServiceTask3Compare;

var urea = [];
for (var i = 0; i < objetoUrea.length; i++) {
  urea.push(objetoUrea[i][2]['conf_value']);
}

var ureaCompare = [];
for (var i = 0; i < objetoUreaCompare.length; i++) {
  ureaCompare.push(objetoUreaCompare[i][2]['conf_value']);  
}

var normalDistribution = new NormalDistribution(urea)
var normalDistributionCompare = new NormalDistribution(ureaCompare)

var maxValue = normalDistribution.calculateMaxValue()
var maxValueCompare = normalDistributionCompare.calculateMaxValue()

var listOfValuesOfX = []
if(maxValue > maxValueCompare){
  listOfValuesOfX = normalDistribution.generateValuesOfX() 
}else{
  listOfValuesOfX = normalDistributionCompare.generateValuesOfX()
}

const dataGaussBell = {
  labels: listOfValuesOfX,
  datasets: [{
    label: 'Rango de urea',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: normalDistribution.calculateNormalDistribution(),
  },
  {
    label: 'Rango de urea a comparar',
    backgroundColor: 'rgb(89, 12, 245)',
    borderColor: 'rgb(89, 12, 245)',
    data: normalDistributionCompare.calculateNormalDistribution(),
  }
]
};

const configGaussBell = {
  type: 'line',
  data: dataGaussBell,
  options: {}
};

const myChartGaussBell = new Chart(
  document.getElementById('gaussian_urea_to_compare'),
  configGaussBell
);
