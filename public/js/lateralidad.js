const labelsLateralidad = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];
  
  const dataLateralidad = {
    labels: labelsLateralidad,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };
  
  const configLateralidad = {
    type: 'line',
    data: dataLateralidad,
    options: {}
  };
  
  const myChart = new Chart(
    document.getElementById('lateralidad'),
    configLateralidad
  );

  console.log("Desde lateralidad: ", responseService)