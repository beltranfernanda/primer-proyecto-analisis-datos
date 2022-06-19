import { xAxis, regex } from '../global.constants.js'
import { rangeAgeModel } from '../../models/rangeAges.js'

const listAges = await getAge(responseService)
const objectRangeAge = await getAmountAgesRange(listAges)
console.log(objectRangeAge.map((amountAge) => amountAge.rangeAge))

async function getAge(response) {
  let listAges = []
  for (let i = 0; i < response.length; i++){
    if(response[i].valores.length !== 0){
      listAges[i] = response[i].valores[2].value.match(regex)[3]
    }
  }
  return listAges
}

async function getAmountAgesRange(listAges){
  let objectRangeAgeModel = [...Array(8)].map(x => new rangeAgeModel())
  objectRangeAgeModel = await setRangesObject(objectRangeAgeModel)
  listAges.sort()
  for (let i = 0; i < listAges.length; i++){
    let currentAge = parseInt(listAges[i])
    switch (true) {
      case currentAge > 14 && currentAge < 19: 
        objectRangeAgeModel[0].amount = objectRangeAgeModel[0].amount +1
        break
      case currentAge > 18 && currentAge < 23: 
        objectRangeAgeModel[1].amount = objectRangeAgeModel[1].amount +1
        break
      case currentAge > 22 && currentAge < 27:
        objectRangeAgeModel[2].amount += 1
        break
      case currentAge > 26 && currentAge < 31: 
        objectRangeAgeModel[3].amount += 1
        break
      case currentAge > 30 && currentAge < 35:
        objectRangeAgeModel[4].amount = objectRangeAgeModel[4].amount +1
        break
      case currentAge > 34 && currentAge < 39: 
        objectRangeAgeModel[5].amount = objectRangeAgeModel[5].amount +1
        break
      case currentAge > 38 && currentAge < 43: 
        objectRangeAgeModel[6].amount = objectRangeAgeModel[6].amount +1
        break
      case currentAge > 42 && currentAge < 46: 
        objectRangeAgeModel[7].amount = objectRangeAgeModel[7].amount +1
        break
    }
  }
  return objectRangeAgeModel
}

async function setRangesObject(objectRangeAge){
  for(let i = 0; i < objectRangeAge.length; i++){
    objectRangeAge[i].rangeAge = xAxis[i]
    objectRangeAge[i].amount = 0
  }
  return objectRangeAge
}

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
  type: 'line',
  data: dataHistogram,
  options: {}
};

const myChartHistogram = new Chart(
  document.getElementById('histogram'),
  configHistogram
);

