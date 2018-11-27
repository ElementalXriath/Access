<?php require_once 'templates/header.php';?>
<link rel="stylesheet" href="css/jquery-ui-custom.css"/>
<link rel="stylesheet" href="css/ui.jqgrid.css"/>
<link href="css/datepicker.css" rel="stylesheet">

<script src="js/jquery-ui-custom.min.js"></script>
<script src='js/grid.locale-en.js'></script>
<script src='js/jquery.jqGrid.min.js'></script>



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
	.ui-jqgrid .ui-jqgrid-view .ui-jqgrid-bdiv{ overflow: visible }
	.ui-jqgrid tr.jqgrow td { overflow: visible; white-space: inherit; padding-top:10px ;padding-bottom:10px ;}
	.btn-group.open-upward.open ul.dropdown-menu {
	    top: 0px !important;
	    
	}
</style>



<div class="container-fluid">
	<?php require_once 'templates/nav.php'; ?>
	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
		<h1 class="page-header">Here are your Invoices.. <a href="invoice.php" class="btn btn-success pull-right"> <i class="fa fa-edit"> </i>Create New Invoice</a></h1>

		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				  Filter
				</a>
				<div class="clearfix"></div><br/>
				<div class="collapse" id="collapseExample">
					<div class="well" style="width:68.5%;">
				   		<form class="form-inline" id="searchForm">
  							<input id="invoiceNoSearch" type="text" class="form-control searchTxt" placeholder="Invoice No">
  							<input id="invoiceClientSearch" type="text" class="form-control searchTxt" placeholder="Client Name">
  							<input id="invoiceStartDateSearch" type="text" class="form-control searchTxt" placeholder="Start Date">
  							<input id="invoiceEndDateSearch" type="text" class="form-control searchTxt" placeholder="End Date">
  							<button id="invoiceSearchBtn" class="form-control searchTxt"> Search </button>
						</form>
				  	</div>
				</div>  -->
				
				<div class="clearfix"></div>
				
				<table id="list2"></table> 
				<div id="pager2" ></div>
			</div>
		</div>
		
		
	</div>
</div>


<script>
   jQuery("#list2").jqGrid({ 
   url:'server.php', 
   datatype: "json",
   colNames:['Invoice No','Customer Name', 'Crated Date', 'Invoice Total', 'Result'], 
   colModel:[ 
      	   {name:'id',index:'id', align:"center"}, 
		   {name:'client_name',index:'client_name', align:"center"}, 
		   {name:'created',index:'created', align:"center"},
		   {name:'invoice_total',index:'invoice_total', align:"center"},
	       {name:'result',index:'result', align:"center", width:200}		   
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
   
   $(document).ready(function () {
	    console.log("ready");
	    $('.dropdown-toggle').dropdown();


	  //datepicker
	    $(function () {
	    	//$.fn.datepicker.defaults.format = "dd-mm-yyyy";
	        $('#invoiceStartDateSearch').datepicker({
	            startDate: '-3d',
	            autoclose: true,
	            clearBtn: true,
	            todayHighlight: true
	        });
	    });

	    
	});

	
	$(document).on('click','.print_class', function(){
		uuid = $(this).data('uuid');
		$.ajax({
			url: "print.php",
			data:{uuid:uuid}, 
			method:'post',
			success: function(result){
	        	$("#print_content").html(result);
	        	$('#myModal').modal('show');
	    	}
	    });
	});
</script>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:900px;height:auto" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Smart Invoice Print</h4>
      </div>
      <div class="modal-body" id="print_content">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="printBtn" onclick="printInvoice('print_content')"  class="btn btn-primary" data-loading-text="Printing...">Print</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="emailModalLabel">Send Invoice Email</h4>
      		</div>
      		<div class="modal-body" id="emailModalBody">
        		<form id="emailForm" method="post" >
					<div class="form-group">
						<label for="exampleInputEmail1">Email Address: </label>
					    <input type="email" class="form-control" name="invoiceEmail" id="invoiceEmail" placeholder="Enter email">
						<span class="help-block"></span>
					</div> 
					<input type="hidden" class="form-control" name="invoiceUuid" id="invoiceUuid">
					<button data-loading-text="Email Sending..." id='email_btn' type="button" class="btn btn-success" autocomplete="off">Send Email!</button>
				</form>
      		</div>
		 	<div class="modal-footer">
		   		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
    	</div>
  	</div>
</div>


<div class="modal fade" id="successEmail" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="emailModalLabel">Send Invoice Email</h4>
      		</div>
      		<div class="modal-body" id="emailModalBody">
        		<h2 class="text-center">Email is Sent Successful.</h2>
				<p class="text-center success-icon"><i class="fa fa-thumbs-up"></i></p>
      		</div>
		 	<div class="modal-footer">
		   		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
    	</div>
  	</div>
</div>


<div style="display: none" id="emailFormContent">
	<form id="emailForm" method="post" >
		
		<div class="form-group">
			<label for="exampleInputEmail1">Email Address: </label>
		    <input type="email" class="form-control" name="invoiceEmail" id="invoiceEmail" placeholder="Enter email">
			<span class="help-block"></span>
		</div> 
		<input type="hidden" class="form-control" name="invoiceUuid" id="invoiceUuid">
		<button id='email_btn' type="button" class="btn btn-success">Send Email!</button>
	</form>
</div>

<script src="js/jquery.validate.min.js"></script>
<script src="js/manageInvoice.js"></script>
<script>

</script>
<div id="printerDiv" style="display: none"></div>
<iframe id="PrintIframe" style="display: none"></iframe>
<?php require_once 'templates/footer.php';?>



