 //*** over revenue start  ***//
 var options = {
  series: [{
    name: 'Income',
    type: 'column',
    data: [60, 35, 20, 40, 65, 50, 40,30,55,40,30,20],
  }, {
    name: 'Profit',
    type: 'line',
    data: [50, 30, 40, 55, 40, 25,55,20,30,60,30,40]
  }],
  chart: {
    height: 452,
    type: 'line',
    toolbar:{
      show: false
    },
  zoom: {
    enabled: false
  }
},
legend:{
  show:false
},
dataLabels: {
  enabled: false
},
stroke: {
  width: [1],
  curve: 'smooth',   
}, 
plotOptions: {
  bar: {       
      columnWidth:"20%",
      startingShape:"rounded",
      endingShape: "rounded",
  }
},
colors: [CodexRohi.themewarning,CodexRohi.themeprimary],  
states: {
   normal: {
          filter: {
              type: 'darken',
              value: 1,
          }
      },
      hover: {
          filter: {
              type: 'darken',
              value: 1,
          }
      },
      active: {
          allowMultipleDataPointsSelection: false,
          filter: {
              type: 'darken',
              value: 1,
          }
      },
  },
grid:{
   strokeDashArray: 2,
},   

 yaxis:{     
    tickAmount: 10 ,
    min: 10.00 ,
    max: 80.00 ,

    labels:{
      formatter: function (y) {
          return  "$" + y.toFixed(0);
        },
      style: {
        colors: '#8392a5',
        fontSize: '14px',              
        fontWeight: 500, 
        fontFamily: 'Roboto, sans-serif'   
      }              
    },
},
xaxis: {
  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Dece'],      
  axisTicks: {
    show:false
  },
  axisBorder:{
    show:false
  },
  labels:{
        style: {
            colors: '#8392a5',
            fontSize: '14px',              
            fontWeight: 500, 
            fontFamily: 'Roboto, sans-serif'                 
        },
    },
},
responsive:[
  {
    breakpoint: 1441,
      options:{
          chart:{
            height: 445
          }
      },
    },
    {
    breakpoint: 1366,
      options:{
          chart:{
            height: 320
          }
      },
    },
  ] 
};
var chart = new ApexCharts(document.querySelector("#over-revenue"), options);
chart.render();
//*** over revenue end  ***//
      

//*** Earning Revenue start  ***//
var options = {
series:[{
  name: 'Selling growth',
  data: [35,50,55,40,50,60,50,35,60,30,65,35],
}  
],
chart:{
  type: 'area',
  height: 395,
  stacked:true,
  toolbar:{
    show: false,
  },
},
  colors: [CodexRohi.themeprimary,CodexRohi.themesecondary],
  plotOptions: {
    bar:{        
      borderRadius: 5,
      horizontal: false,
      columnWidth: '35%',       
    },
  },
  dataLabels:{
    enabled:false
  },       
  legend:{
    show: false,
  },  
  stroke:{
    curve: 'smooth',
    width: [1],
  },     
  grid:{
    strokeDashArray: 1,
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Dec'], 
    axisTicks: {
      show:false
    },
    axisBorder:{
      show:false
    },
    labels:{
        style: {
            colors: '#8392a5',
            fontSize: '14px',              
            fontWeight: 500, 
            fontFamily: 'Roboto, sans-serif'                 
        },
    },
  },
  yaxis:{
    axisTicks: {
      show:false
    },
    axisBorder:{
      show:false
    },  
    labels:{
      formatter: function (y) {
          return y.toFixed(0) + "k";
        },
        style: {
            colors: '#8392a5',
            fontSize: '14px',              
            fontWeight: 500, 
            fontFamily: 'Roboto, sans-serif'                 
        },
    },   
  },
  responsive:[
    {
      breakpoint:1366,
      options:{
        chart:{
          height: 320
        }
      },
    },
    {
      breakpoint:481,
      options:{
        chart:{
          height:290
        }
      },
    }      
  ]         
};
var chart = new ApexCharts(document.querySelector("#earning-revenue"), options);
chart.render();  
//*** Earning Revenue end  ***//


//*** sale by category start  ***//
var options = {
    labels: ['Panding','Delevered', 'Canceled', 'Returned'],
    series: [40, 35, 20, 50],
    chart: {
      type: 'donut',
      height: 345 ,
    },     
    states: {
          normal: {
              filter: {
                  type: 'darken',
                  value: 1,
              }
          },
          hover: {
              filter: {
                  type: 'darken',
                  value: 1,                   
              }
          },
          active: {
              allowMultipleDataPointsSelection: true,
              filter: {
                  type: 'darken',
                  value: 1,
              }
          },
      },
    plotOptions: {
      pie: {
        startAngle: -90,
        endAngle: 270
      },
    },
    stroke: {
      width: 0,
    },
    legend:{
      position:'bottom',       
      horizontalAlign: 'left', 
      offsetX: 0,
      offsetY: 0,
      colors: '#8392a5',
      fontSize: '14px',              
      fontWeight: 500, 
      fontFamily: 'Roboto, sans-serif',
      onItemClick: {
        toggleDataSeries: true
      },
      onItemHover: {
        highlightDataSeries: false
      },    
      labels: {
        colors: '#8392a5',    
      },   
    },
    dataLabels: {
      enabled: false,
    },
  colors: [CodexRohi.themeprimary,CodexRohi.themesecondary,CodexRohi.themeinfo,CodexRohi.themewarning],
  responsive:[  
    {
      breakpoint:992,
      options:{
        chart:{
          height:350
        }
      },
    }

  ]
};
var chart = new ApexCharts(document.querySelector("#sale-category"), options);
chart.render();
//*** sale by category end ***//