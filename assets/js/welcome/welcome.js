chartCategorias = Highcharts.chart('container', {
  data: {
    table: 'datatable'
  },
  chart: {
    type: 'column'
  },
  title: {
    text: 'Valorizacion Categorias'
  },
  yAxis: {
    allowDecimals: false,
    title: {
      text: 'Valorizacion	'
    }
  },
  tooltip: {
    formatter: function () {
      return '<b>' + this.series.name + '</b><br/>' +
        this.point.y + ' ' + this.point.name.toLowerCase();
    }
  }
});

chartBancos = Highcharts.chart('containerSecond', {
  data: {
    table: 'datatableSecond'
  },
  chart: {
    type: 'column'
  },
  title: {
    text: 'Valorizacion de Bancos'
  },
  yAxis: {
    allowDecimals: false,
    title: {
      text: 'Valorizacion	'
    }
  },
  tooltip: {
    formatter: function () {
      return '<b>' + this.series.name + '</b><br/>' +
        this.point.y + ' ' + this.point.name.toLowerCase();
    }
  }
});
