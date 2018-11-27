<?php 
ob_start();
session_start();
error_reporting(0);
require_once 'config.php'; 
$url=strtok($_SERVER["REQUEST_URI"],'?');
$url_arr = explode("/", $url);

if(!isset($_SESSION['logged_in']) && !in_array("quiz-result", $url_arr)){
	$_SESSION['error'] = "Please login to access this page";
	header('Location: index.php');exit;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Virtual EX. Office </title>


    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css2/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css2/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css2/animate.css" rel="stylesheet">
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/plugins/slick/slick.css" rel="stylesheet">
    <link href="css2/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="css2/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css2/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css2/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="css2/plugins/textSpinners/spinners.css" rel="stylesheet">
    <link href="css2/plugins/select2/select2.min.css" rel="stylesheet">
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />

    <link rel="stylesheet" href="css/jquery-ui-custom.css"/>
    <link rel="stylesheet" href="css/ui.jqgrid.css"/>
    <link href="css2/datepicker.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="test/jquery-1.6.2.min.js"></script>
    <script src="jquery.peity.js"></script>
<script>
$(function() {
  // Just the defaults.
  $("span.pie").peity("pie")
  $('.donut').peity('donut')
  $(".line").peity("line")
  $(".bar").peity("bar")
  $(".bar-colours-1").peity("bar", {
    fill: ["red", "green", "blue"]
  })
  $(".bar-colours-2").peity("bar", {
    fill: function(value) {
      return value > 0 ? "green" : "red"
    }
  })
  $(".bar-colours-3").peity("bar", {
    fill: function(_, i, all) {
      var g = parseInt((i / all.length) * 255)
      return "rgb(255, " + g + ", 0)"
    }
  })
  $(".pie-colours-1").peity("pie", {
    fill: ["cyan", "magenta", "yellow", "black"]
  })
  $(".pie-colours-2").peity("pie", {
    fill: function(_, i, all) {
      var g = parseInt((i / all.length) * 255)
      return "rgb(255, " + g + ", 0)"
    }
  })
  // Using data attributes
  $(".data-attributes span").peity("donut")
  // Evented example.
  $("select").change(function() {
    var text = $(this).val() + "/" + 5
    $(this)
      .siblings("span.graph")
      .text(text)
      .change()
    $("#notice").text("Chart updated: " + text)
  }).change()
  $("span.graph").peity("pie")
  // Updating charts.
  var updatingChart = $(".updating-chart").peity("line", { width: 64 })
  setInterval(function() {
    var random = Math.round(Math.random() * 10)
    var values = updatingChart.text().split(",")
    values.shift()
    values.push(random)
    updatingChart
      .text(values.join(","))
      .change()
  }, 1000)
})
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-117680-14']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script>
        $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  $(function() {

// page is now ready, initialize the calendar...

$('#calendar').fullCalendar({
  // put your options and callbacks here
})

});
</script>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getusernew.php?q="+str,true);
  xmlhttp.send();
}
</script>
<style>
  .icondb-changer {
    animation: icondb-slider 10s linear infinite;
    transition: color 300ms ease-in 200ms; }
    .icondb-changer {
  animation: icondb-slider 10s linear infinite;
  /*transition: background 300ms ease-in 200ms;*/
  transition-timing-function: ease-in-out;
  transition-duration: 1s;
}
@keyframes icondb-slider {
  0%, 100% {
   color:red;
  }
  20% {
   color: green;
  }
  40% {
   color: blue;
  }
  60% {
   color: grey;
  }
  80% {
   color: purple;
  }
  90% {
   color: aqua ;
  }
}
</style>
</head>