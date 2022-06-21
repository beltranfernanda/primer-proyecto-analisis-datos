const LATERALIDAD = "Lateralidad";
const NA = "N/A";
const RIGHT = "Derecho";
const LEFT = "Izquierdo";

function isEmpty(array){
  return array.length == 0;
}

function isUndefined(value){
  return value == undefined;
}

function unique(array){
  return [...new Set(array)];
}

function count(element, array){
  return array.filter(value => value == element).length;
}

function randomColor(){
  return "#" + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0').toUpperCase();
}

function filterData(data){
  return data.map(row => {
    const result = row.valores.filter(element => element.title == LATERALIDAD)
    if (isEmpty(result) || isUndefined(result[0].value)) return NA;
    return result[0].value.toLowerCase();
  })
}

function standarizeData(array){
  return array.map(value => {
    if(value.startsWith('der')) return RIGHT; 
    if(value.startsWith('izq')) return LEFT;
    return value; 
  })
}

function createChart(labels, values, colors){
  const dataLateralidad = {
    labels: labels,
    datasets: [{
      label: 'Lateralidad',
      data: values,
      backgroundColor: colors,
      hoverOffset: 4
    }]
  };
  
  const configLateralidad = {
    type: 'pie',
    data: dataLateralidad,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Lateralidad Pie Chart'
        }
      }
    },
  };
  
  return new Chart(
    document.getElementById('lateralidad'),
    configLateralidad
  );
}

const filteredValues = standarizeData(filterData(responseService))
const labels = unique(filteredValues);
const countedValues = labels.map(label => count(label, filteredValues))
const colors = labels.map(()=>randomColor())
const myChart = createChart(labels, countedValues, colors)
// console.log(responseService.length)
// console.log(filteredValues)
// console.log(labels)
// console.log(countedValues)
// console.log(colors)


