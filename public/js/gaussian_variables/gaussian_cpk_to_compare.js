import { NormalDistribution } from './normal_distribution.js'
const objetoCpk = responseServiceTask3;
const objetoCpkCompare = responseServiceTask3Compare;

var cpk = [];
for (var i = 0; i < objetoCpk.length; i++) {
  cpk.push(objetoCpk[i][0]['conf_value']);
}

var cpkCompare = [];
for (var i = 0; i < objetoCpkCompare.length; i++) {
  cpkCompare.push(objetoCpkCompare[i][0]['conf_value']);
}

var normalDistribution = new NormalDistribution(cpk)
var normalDistributionCompare = new NormalDistribution(cpkCompare)

var maxValue = normalDistribution.calculateMaxValue()
var maxValueCompare = normalDistributionCompare.calculateMaxValue()

var listOfValuesOfX = []
if(maxValue > maxValueCompare){
  listOfValuesOfX = normalDistribution.generateValuesOfX() 
}else{
  listOfValuesOfX = normalDistributionCompare.generateValuesOfX()
}

var dataGaussBell = {
  labels: listOfValuesOfX,
  datasets: [{
    label: 'Rango de cpk',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: normalDistribution.calculateNormalDistribution(),
  },
  {
    label: 'Rango de cpk a comparar',
    backgroundColor: 'rgb(89, 12, 245)',
    borderColor: 'rgb(89, 12, 245)',
    data: normalDistributionCompare.calculateNormalDistribution(),
  }
]
};

var configGaussBell = {
  type: 'line',
  data: dataGaussBell,
  options: {}
};

var myChartGaussBell = new Chart(
  document.getElementById('gaussian_cpk_to_compare'),
  configGaussBell
);
