/* global Chart, coreui */

/**
 * --------------------------------------------------------------------------
 * CoreUI Boostrap Admin Template main.js
 * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
 * --------------------------------------------------------------------------
 */

// Disable the on-canvas tooltip
Chart.defaults.pointHitDetectionRadius = 1;
Chart.defaults.plugins.tooltip.enabled = false;
Chart.defaults.plugins.tooltip.mode = "index";
Chart.defaults.plugins.tooltip.position = "nearest";
Chart.defaults.plugins.tooltip.external = coreui.ChartJS.customTooltips;
Chart.defaults.defaultFontColor = coreui.Utils.getStyle("--cui-body-color");
document.documentElement.addEventListener("ColorSchemeChange", () => {
  cardChart1.data.datasets[0].pointBackgroundColor =
    coreui.Utils.getStyle("--cui-primary");
  cardChart2.data.datasets[0].pointBackgroundColor =
    coreui.Utils.getStyle("--cui-info");
  mainChart.options.scales.x.grid.color = coreui.Utils.getStyle(
    "--cui-border-color-translucent"
  );
  mainChart.options.scales.x.ticks.color =
    coreui.Utils.getStyle("--cui-body-color");
  mainChart.options.scales.y.border.color = coreui.Utils.getStyle(
    "--cui-border-color-translucent"
  );
  mainChart.options.scales.y.grid.color = coreui.Utils.getStyle(
    "--cui-border-color-translucent"
  );
  mainChart.options.scales.y.ticks.color =
    coreui.Utils.getStyle("--cui-body-color");
  cardChart1.update();
  cardChart2.update();
  mainChart.update();
});

const mainChart = new Chart(document.getElementById("main-chart"), {
  type: "line",
  options: {
    maintainAspectRatio: false,
    plugins: {
      annotation: {
        annotations: {
          line1: {
            type: "line",
            yMin: 95,
            yMax: 95,
            borderColor: coreui.Utils.getStyle("--cui-danger"),
            borderWidth: 1,
            borderDash: [8, 5],
          },
        },
      },
      legend: {
        display: false,
      },
    },
    scales: {
      x: {
        grid: {
          color: coreui.Utils.getStyle("--cui-border-color-translucent"),
          drawOnChartArea: false,
        },
        ticks: {
          color: coreui.Utils.getStyle("--cui-body-color"),
        },
      },
      y: {
        border: {
          color: coreui.Utils.getStyle("--cui-border-color-translucent"),
        },
        grid: {
          color: coreui.Utils.getStyle("--cui-border-color-translucent"),
        },
        ticks: {
          beginAtZero: true,
          color: coreui.Utils.getStyle("--cui-body-color"),
          max: 250,
          maxTicksLimit: 5,
          stepSize: Math.ceil(250 / 5),
        },
      },
    },
    elements: {
      line: {
        tension: 0.4,
      },
      point: {
        radius: 0,
        hitRadius: 10,
        hoverRadius: 4,
        hoverBorderWidth: 3,
      },
    },
  },
});

$.ajax({
  url: '../process/chart.php',
  type: 'post',
  dataType: 'json',
  data: {getTransaksiBulanIni: true},
  success: response => {
    mainChart.data = {
      datasets: [
        {
          label: "Bulan ini",
          backgroundColor: `rgba(${coreui.Utils.getStyle("--cui-info-rgb")}, .1)`,
          borderColor: coreui.Utils.getStyle("--cui-info"),
          pointHoverBackgroundColor: "#fff",
          borderWidth: 1,
          data: response.bulanini,
          fill: true,
        },
        {
          label: "Bulan lalu",
          borderColor: coreui.Utils.getStyle("--cui-success"),
          pointHoverBackgroundColor: "#fff",
          borderWidth: 1,
          data: response.bulanlalu,
        },
      ],
    }
    mainChart.update();
  },
  error: response => {
    console.log(response);
  }
})


//# sourceMappingURL=main.js.map
