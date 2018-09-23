"use strict";var KChartJSDemo={init:function(){var a;a=$("#k_chartjs_1"),new Chart(a,{type:"bar",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Dataset 1",backgroundColor:"#6e4ff5",borderColor:"#6e4ff5",borderWidth:1,data:[54,47,62,84,79,61,24]},{label:"Dataset 2",backgroundColor:"#f6aa33",borderColor:"#f6aa33",borderWidth:1,data:[42,52,84,67,32,69,58]}]},options:{responsive:!0,legend:{position:"top"},title:{display:!0,text:"Vertical Bar Chart"}}}),function(){var a=$("#k_chartjs_2");new Chart(a,{type:"horizontalBar",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Dataset 1",backgroundColor:"#6e4ff5",borderColor:"#6e4ff5",borderWidth:1,data:[54,47,62,84,79,61,24]},{label:"Dataset 2",backgroundColor:"#f6aa33",borderColor:"#f6aa33",borderWidth:1,data:[42,52,84,67,32,69,58]}]},options:{responsive:!0,legend:{position:"top"},title:{display:!0,text:"Horizontal Bar Chart"}}})}(),function(){var a=$("#k_chartjs_3");new Chart(a,{type:"bar",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Dataset 1",backgroundColor:"#6e4ff5",borderColor:"#6e4ff5",borderWidth:1,data:[54,-47,62,-84,-79,61,24]},{label:"Dataset 2",backgroundColor:"#f6aa33",borderColor:"#f6aa33",borderWidth:1,data:[42,52,84,-67,32,69,-58]},{label:"Dataset 3",backgroundColor:"#fe3995",borderColor:"#fe3995",borderWidth:1,data:[-21,43,74,35,-65,42,34]}]},options:{title:{display:!0,text:"Bar Chart - Stacked"},tooltips:{mode:"index",intersect:!1},responsive:!0,scales:{xAxes:[{stacked:!0}],yAxes:[{stacked:!0}]}}})}(),function(){var a=$("#k_chartjs_4");new Chart(a,{type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Dataset 1",backgroundColor:"#6e4ff5",borderColor:"#6e4ff5",borderWidth:3,fill:!1,data:[54,47,62,84,79,61,24]},{label:"Dataset 2",backgroundColor:"#f6aa33",borderColor:"#f6aa33",borderWidth:3,fill:!1,data:[42,52,84,67,32,69,58]}]},options:{responsive:!0,title:{display:!0,text:"Line Chart"},tooltips:{mode:"index",intersect:!1},hover:{mode:"nearest",intersect:!0},scales:{xAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Month"}}],yAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Value"}}]}}})}(),function(){var a=$("#k_chartjs_5");new Chart(a,{type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Dataset 1",backgroundColor:"#6e4ff5",borderColor:"#6e4ff5",borderWidth:3,fill:!1,data:[54,-47,62,-84,-79,61,24]},{label:"Dataset 2",backgroundColor:"#f6aa33",borderColor:"#f6aa33",borderWidth:3,borderDash:[5,5],fill:!1,data:[42,52,84,-67,32,69,-58]},{label:"Dataset 3",backgroundColor:"#fe3995",borderColor:"#fe3995",borderWidth:3,fill:!0,data:[-21,43,74,35,-65,42,34]}]},options:{responsive:!0,title:{display:!0,text:"Multi Line Chart"},tooltips:{mode:"index",intersect:!1},hover:{mode:"nearest",intersect:!0},scales:{xAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Month"}}],yAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Value"}}]}}})}(),function(){var a=function(){return Math.round(100*Math.random())},e={datasets:[{data:[a(),a(),a(),a(),a()],backgroundColor:["#fe3995","#f6aa33","#6e4ff5","#2abe81","#c7d2e7"],label:"Dataset 1"}],labels:["Data 1","Data 2","Data 3","Data 4","Data 5"]},t=$("#k_chartjs_6");new Chart(t,{type:"doughnut",data:e,options:{responsive:!0,legend:{position:"top"},title:{display:!0,text:"Donut Chart"},animation:{animateScale:!0,animateRotate:!0}}})}(),function(){var a=function(){return Math.round(100*Math.random())},e={datasets:[{data:[a(),a(),a(),a(),a()],backgroundColor:["#fe3995","#f6aa33","#6e4ff5","#2abe81","#c7d2e7"],label:"Dataset 1"}],labels:["Data 1","Data 2","Data 3","Data 4","Data 5"]},t=$("#k_chartjs_7");new Chart(t,{type:"pie",data:e,options:{responsive:!0,legend:{position:"top"},title:{display:!0,text:"Pie Chart"},animation:{animateScale:!0,animateRotate:!0}}})}()}};jQuery(document).ready(function(){KChartJSDemo.init()});