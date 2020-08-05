<?php
   
    //1. Get all kindergern books sold in january
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Jan'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_jan);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in Feb
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Feb'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_feb);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in March
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Mar'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_mar);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in April
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Apr'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_apr);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in May
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'May'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_may);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in JUn
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Jun'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_jun);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in July
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Jul'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_jul);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in Aug
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Aug'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_aug);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in Aug
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Sep'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_sep);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in Oct
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Oct'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_oct);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in Nov
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Nov'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_nov);
    $stmt->fetch();
    $stmt->close();

    //1. Get all kindergern books sold in Dec
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Kindergarten Books' AND s_month = 'Dec'  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Kindergarten_dec);
    $stmt->fetch();
    $stmt->close();


    

    //2. Get all Primary school books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Primary School Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Primary_School);
    $stmt->fetch();
    $stmt->close();

    //3.  Get all secondary school books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Secondary School Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Secondary_School);
    $stmt->fetch();
    $stmt->close();

    //4.  Get all tertiary books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Tertiary Books' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Tertiary);
    $stmt->fetch();
    $stmt->close();

    //5.  Get all Novels books
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Novels' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Novels);
    $stmt->fetch();
    $stmt->close();

    //6.  Get all Magazines
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Magazines' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Magazines);
    $stmt->fetch();
    $stmt->close();

    //7.  Get all Others
    $query ="SELECT SUM(s_copies) FROM `iBookStore_Sales` WHERE b_cat = 'Others' ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($Others);
    $stmt->fetch();
    $stmt->close();
?>
<script>
    var options1 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#1b55e2', '#e7515a', '#1be21e', '#e21bb4', '#e2d51b' ],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Book Sales Numbers',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: '1000',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Kindergarten',
      data: [<?php echo $Kindergarten_jan;?>, <?php echo $Kindergarten_feb;?>,  <?php echo $Kindergarten_mar;?>, <?php echo $Kindergarten_apr;?>, <?php echo $Kindergarten_apr;?>, <?php echo $Kindergarten_may;?>, <?php echo $Kindergarten_jun;?>, <?php echo $Kindergarten_jul;?>, <?php echo $Kindergarten_aug;?>, <?php echo $Kindergarten_sep;?>, <?php echo $Kindergarten_oct;?>, <?php echo $Kindergarten_nov;?>, <?php echo $Kindergarten_dec;?>]
  }, {
      name: 'Primary School',
      data: [16500, 17500, 16200, 17300, 16000, 19500, 16000, 1700, 16000, 19000, 18000, 19000]
  },
  {
      name: 'Secondary School',
      data: [16500, 17500, 1620, 17300, 16000, 1950, 16000, 1700, 16000, 19000, 18000, 19000]
  },
  {
      name: 'Tertiary',
      data: [16500, 17500, 1600, 17300, 16000, 19500, 16000, 170, 16000, 19000, 1800, 19000]
  },
  {
      name: 'Novels',
      data: [16500, 1700, 16200, 17300, 1600, 19500, 16000, 1700, 16000, 19000, 18000, 19000]
  },
  {
      name: 'Magazines',
      data: [165, 170, 1620, 1700, 1600, 100, 1600, 100, 1060, 1000, 1800, 190]
  },
],

  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return (value / 1000) + 'K'
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}

var chart1 = new ApexCharts(
    document.querySelector("#salesPerMonth"),
    options1
);

chart1.render();
</script>