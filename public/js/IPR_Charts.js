$(function(){

  //get data from DOM
  const activeUserData = $('#ActiveUserData').text();
  var activeUser = activeUserData.split(',');
  activeUser.pop();

  const activeClientData = $('#ActiveClientData').text();
  var activeClient = activeClientData.split(',');
  activeClient.pop();

  const databaseSizeData = $('#DatabaseSize').text();
  var databaseSize = databaseSizeData.split(',');
  databaseSize.pop();

  const dateData = $('#Dates').text();
  const datesLong = dateData.split(',');
  var trimmedDates = [];
  datesLong.forEach(element=>{
    trimmedDates.push(element.substring(0,10));
  });
  trimmedDates.pop();
  debugger;


    //Currently stinky code as it does not match dates or ID's, just assumes the days match ( which they do ), could do a couple for each loops and match the dates that way. 
var options = {
  series: [{
    name: 'Active Users',
    data: activeUser
  }],
  title: {
    text: 'Active Users',
    align: 'Center'
    },
  chart: {
    id: 'fb',
    group: 'social',
    type: 'line',
    height: 250,
    foreColor: '#fff'
  },
  colors: ['#008FFB'],
  yaxis: {
    labels: {
      minWidth: 40
    }
  },
  xaxis: {
    labels: {
      format: 'YYYY/DD/MM',
    },
    categories: trimmedDates,
  }
};

var chart = new ApexCharts(document.querySelector("#chart-line"), options);
chart.render();

var optionsLine2 = {
  series: [{
    name: 'Active Clients',
    data: activeClient
  }],
  title: {
    text: 'Active Clients',
    align: 'Center'
    },
  chart: {
    id: 'zz',
    group: 'social',
    type: 'line',
    height: 250,
    foreColor: '#fff'
  },
  colors: ['#008FFB'],
  yaxis: {
    labels: {
      minWidth: 40
    }
  },
  xaxis: {
    categories: trimmedDates
    }
};

var chartLine2 = new ApexCharts(document.querySelector("#chart-line2"), optionsLine2);
chartLine2.render();

var optionsArea = {
  series: [{
    name: 'Database Size',
    data: databaseSize
  }],
  title: {
    text: 'Database Size (GB)',
    align: 'Center'
    },
  chart: {
    id: 'tw',
    group: 'social',
    type: 'line',
    height: 250,
    foreColor: '#fff'
  },
  colors: ['#008FFB'],
  yaxis: {
    labels: {
      minWidth: 40
    }
  },
  xaxis: {
    categories: trimmedDates
    }
};

var chartArea = new ApexCharts(document.querySelector("#chart-area"), optionsArea);
chartArea.render();

});

function PartyMode(){

  document.getElementById('app').classList.add('Party');
  setTimeout(()=>{
    document.getElementById('app').classList.remove('Party');
  },4000);

}