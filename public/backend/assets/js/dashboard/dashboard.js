 //*** earning chart start ***//
  var options = {
    series:[{
      name: 'Impression',
      data: [30, 25, 28, 25, 30, 32, 28,20,25,30,35]
    }],
    chart: {
      height: 355,
      type: 'area',
      parentHeightOffset: 0,
      parentWidthOffset: 0,  
      toolbar:{
        show: false
      }
    },
    dataLabels:{
      enabled: false
    },
    markers: {
        size:[5,5],       
        strokeColors: '#fff',
        strokeWidth:2,
        strokeOpacity: 0.9,       
        fillOpacity: 1,
        hover: {         
          sizeOffset:1
        }
    },   
    stroke: {
      width: [2, 2],
      curve: 'smooth',
      dashArray: [2]
    },
    grid:{
      show: false,
       padding:{
        top: 0,
        bottom:0,
        left:0,
        right: 0
      }
    },
    colors: [CodexRohi.themeprimary],
    yaxis:{
      labels:{
        show: false
      },
      axisTicks: {
        show:false
        },
        axisBorder:{
          show:false
        },
    },
    xaxis:{
      labels:{
        show: false
      },
      axisTicks: {
        show:false
        },
        axisBorder:{
          show:false
        },
    },   
    responsive:[
    {
      breakpoint: 1441,
      options:{
          chart:{
            height: 310
          }
      },
    },
    {
      breakpoint: 1366,
      options:{
          chart:{
            height: 260
          }
      },
    },
    {
      breakpoint: 481,
      options:{
          chart:{
            height: 190
          }
      },
      }
    ] 
  };
  var chart = new ApexCharts(document.querySelector("#earning-chart"), options);
  chart.render();
  //*** earning chart end ***//

  
  //***  Visitors Performance start  ***/
   var options = {
      series: [{
      name: 'Complated Porject',
      data: [23, 35, 25, 32, 29, 20, 20]
    },{
      name: 'Closed Porject',
      data: [39, 29, 25,29, 18, 22, 39]
    }],
      chart: {
      height: 225,
      type: 'area',
      toolbar:{
        show: false
      }
    },
    dataLabels: {
      enabled: false,
    },
    grid:{
       strokeDashArray: 1,
    },   
    stroke: {
      width: [2, 2],
      curve: 'smooth',
      dashArray: [2]
    },
    legend:{
      show:false,
    },
    colors: [CodexRohi.themeprimary,CodexRohi.themesecondary],
    yaxis:{      
      labels: {
        formatter: function (y) {
          return y.toFixed(0) + "k";
        }
      },
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
    xaxis: {      
      categories: ["Iran", "Spain", "Canada", "China", "Japan", "Usa", "India"],
      labels:{
          style: {
              colors: '#8392a5',
              fontSize: '14px',              
              fontWeight: 500, 
              fontFamily: 'Roboto, sans-serif'                 
          },
      },    
       axisTicks: {
          show:false
        },
        axisBorder:{
          show:false
        }
    },  
    responsive:[
      {
        breakpoint:768,
        options:{
            chart:{
              height: 320
            }
        },
      },
      {
      breakpoint:420,
      options:{
          legend:{
            position: 'bottom',
          },
        },
      },   
    ]  
    };
    var chart = new ApexCharts(document.querySelector("#visitor-chart"), options);
    chart.render();
  //**** Visitors Performance end  ***//


  //*** Visitors start  ***//
  var options = {
    series: [{
      name: 'Net Profit',
      data: [65, 38, 50, 28, 65, 24, 80]
    }],
      chart: {
      type: 'bar',
      height: 443,
      toolbar:{
        show: false
      }
    },   
    plotOptions: {
      bar: {
        borderRadius: 5,
        horizontal: false,
        columnWidth: '40%',
        endingShape: 'rounded'
      },
    },
    legend:{
      show: false,
    },
    grid:{
       strokeDashArray: 2,
    },
    colors: [CodexRohi.themeprimary,CodexRohi.themesecondary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
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
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: 'darken',
                    value: 1,
                }
            },
        },  
    yaxis:{     
      tickAmount: 10,
      min: 10,
      max: 80,
      labels:{
          style: {
              colors: '#8392a5',
              fontSize: '14px',              
              fontWeight: 500, 
              fontFamily: 'Roboto, sans-serif'                 
          },
      },
    },
    xaxis: {
      categories:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
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
    fill: {
      opacity: 1
    },  
    responsive:[{
      breakpoint: 1441,
      options:{
          chart:{
            height: 410
          }
      },
    }]  
    };
    
    var chart = new ApexCharts(document.querySelector("#visitor-rank"), options);
    chart.render();
    //*** Visitors end ***//