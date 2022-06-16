const histogramLabels = [
    'Januaraays',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];
  
  const histogramData = {
    labels: histogramLabels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };
  
  const histogramConfig = {
    type: 'line',
    data: histogramData,
    options: {}
  };
  
  const histogramChart = new Chart(
    document.getElementById('histograma'),
    histogramConfig
  );

function dataHistogram(){
 
}
