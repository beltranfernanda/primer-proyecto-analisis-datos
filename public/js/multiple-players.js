let playersSelected = [];

function normalizePlayers() {
  const responseMapped = playersResponse.map(player => {
    return {
      id: player.id,
      name: validateValue(player.valores.find(el => el.title === 'Nombre'), 'value'),
      lastname: validateValue(player.valores.find(el => el.title === 'Apellido'), 'value'),
    }
  })
  console.log(responseMapped);
  return responseMapped;
}

function validateValue(object, key) {
  if(object === undefined || object === null) return undefined;
  if(object.hasOwnProperty(key)) return object[key];
  return undefined;
}

function createPlayersListDom() {
  const allPlayers = normalizePlayers();
  const playersListDom = document.getElementById('players-list');
  let playerNodes = allPlayers.map(player => {
    const node = `<li class="list-group-item">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="${player.id}" id="list-item-${player.id}"
                        onclick="onPlayerCheck(event.target.value, event.target.checked)">
                      <label class="form-check-label" for="flexCheckDefault">
                        ${player.name} ${player.lastname}
                      </label>
                    </div>
                  </li>`;
    return node;
  });
  playersListDom.innerHTML = playerNodes.join(' ');
}

function onPlayerCheck(player, checked) {
  if(checked) playersSelected.push(player);
  if(!checked) playersSelected = playersSelected.filter(el => el !== player);
  console.log(playersSelected);
}

function getPlayerCpkUrea(idPlayer) {
  const url = '/primer-proyecto-analisis-datos/dataFromPlayer.php?player=288';
  const options = {
    mode: 'same-origin',
  }
  fetch(url, options)
    .then(response => response.json())
    .then(data => console.log(data));
}

createPlayersListDom();
getPlayerCpkUrea(1);



const labels = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
];

const data = {
  labels: labels,
  datasets: [
    {
      label: 'Player 288',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    },
    {
      label: 'Player 288',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 15, 25, 32, 50, 30, 45],
    },
  ]
};

const config = {
  type: 'line',
  data: data,
  options: {}
};

const myChart = new Chart(
  document.getElementById('multiple-players-cpk-chart'),
  config
);
