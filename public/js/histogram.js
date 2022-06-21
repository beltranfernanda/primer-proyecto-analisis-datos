import { xAxis } from '../global.constants.js'
import { getAge } from '../../models/rangeAges.js'
import { getAmountAgesRange } from '../../models/rangeAges.js'

const listAges = await getAge(responseService)
const objectRangeAge = await getAmountAgesRange(listAges)

const dataHistogram = {
  labels: xAxis,
  datasets: [{
    label: 'Rango de edades',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: objectRangeAge.map((amountAge) => amountAge.amount),
  }]
};

const configHistogram = {
  type: 'bar',
  data: dataHistogram,
  options: {}
};

const myChartHistogram = new Chart(
  document.getElementById('histogram'),
  configHistogram
);

