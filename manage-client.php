<?php require_once 'templates/header.php';?>
<link rel="stylesheet" href="css/jquery-ui-custom.css"/>
<link rel="stylesheet" href="css/ui.jqgrid.css"/>
<style>
	.ui-widget{font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif; color:#fff;}
	.ui-jqgrid .ui-jqgrid-hdiv {height:25px;}
	.ui-jqgrid .ui-jqgrid-pager {height:40px;}
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
	  background: #fff !important;font-weight: bold;color:#000;font-size:16px;}
	.ui-widget-content{border: 1px solid #ddd !important;}
	.ui-jqgrid tr.jqgrow td{height: 33px !important;}
	.ui-jqgrid .ui-jqgrid-htable th div, .ui-jqgrid .ui-jqgrid-htable th,.ui-jqgrid-hdiv{height: 33px !important;}
	.ui-jqgrid .ui-jqgrid-resize-ltr{margin: 0px !important;}
	#pager2{height: 36px !important;}
	input.ui-pg-input {
	    font-size: 1em;
	    height: 33.5px !important;
	    margin: 0;
	    min-width:50px;
	    width:80px !important;
	}
	.ui-th-column{padding-top:10px !important; }
	.ui-jqgrid .ui-jqgrid-view{ font-size: 1em !important;}
</style>

<div class="container-fluid">
	<?php require_once 'templates/nav.php'; ?>
	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
	
		<h1 class="page-header">Manage Clients... <a href="add-client.php" class="btn btn-success pull-right"> <i class="fa fa-edit"> </i>Add New Client</a></h1>
		<?php require_once 'templates/message.php';?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="text-center">
					<table id="list2"></table> 
					<div id="pager2" ></div>
				</div>
			</div>
		</div>	
	
	</div>
</div>
<script src="js/jquery-ui-custom.min.js"></script>
<script src='js/grid.locale-en.js'></script>
<script src='js/jquery.jqGrid.min.js'></script>
<script>
   jQuery("#list2").jqGrid({ 
   url:'ajax-client.php', 
   datatype: "json",
   colNames:['ID','Customer Name', 'Phone Number', 'Country', 'Action'], 
   colModel:[ 
      	   {name:'id',index:'id', align:"center"}, 
		   {name:'customerName',index:'customerName', align:"center"}, 
		   {name:'phone',index:'phone', align:"center"},
	       {name:'country',index:'country', align:"center"},
	       {name:'result',index:'result', align:"center"}		   
   ],
   rowNum:10, 
   rowList:[10,20,30], 
   pager: '#pager2', 
   sortname: 'id', 
   recordpos: 'left', 
   viewrecords: true, 
   sortorder: "asc", 
   height: '100%'
   });
</script>	
<?php require_once 'templates/footer.php';?>