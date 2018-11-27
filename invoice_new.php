<?php include 'templatesVEO/header.php'; ?>

<body>


<?php 
	$user_obj = new Cl_User();
 	if(!empty($_POST)){
    	try {
    		$user_obj->saveInvoice($_POST);
    		$_SESSION['success'] = 'Invoice Saved Successfully!';
    		header('Location: invoices.php');exit;
    	} catch (Exception $e) {
    		$error = $e->getMessage();
    	}
    }elseif (isset($_GET['uuid']) && !empty($_GET['uuid'])){
    	try {
    		$results = $user_obj->getInvoice( $_GET['uuid'] );
    	} catch (Exception $e) {
    		$_SESSION['error'] = $e->getMessage();
    	}
	}elseif (isset($_GET['delete']) && !empty($_GET['delete'])){
    	try {
    		if( $user_obj->deleteInvoice( $_GET['delete'] )){
    			$_SESSION['success'] = 'Invoice Deleted Successfully!';
    			header('Location: invoices.php');exit;
    		}else{
    			$_SESSION['success'] = 'Invoice Not Deleted, Try Again!';
				header('Location: invoices.php');exit;
    		}
    		
    	} catch (Exception $e) {
    		$_SESSION['error'] = $e->getMessage();
    	}
	}

	$settings = $user_obj->getSettings();
	//echo "<pre>";print_r( $settings ); echo "</pre>";
    $invoice = array();
    if(!empty( $results )){
    	$invoice = json_decode( $results['invoice'], true);
    }
?>
    
    <div id="wrapper">

        <?php include 'templatesVEO/navtemp.php'; ?> <!--NAV SIDE-->

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

        <?php include 'templatesVEO/static-nav.php'; ?> <!--NAV STACTIC-->

        </div>


    	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="invoice-form" method="post"  class="invoice-form" role="form" novalidate> 
            <input type="hidden" value="<?php echo isset($results['id']) ? $results['id']: ''; ?>" name="data[id]"> 
            <input id="currency" type="hidden" value="<?php echo isset($settings['currency'])?$settings['currency']:CURRENCY;?>">

          <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                
                    <ol class="breadcrumb">
                    <form>            
                                        <div class="col-lg-12">
                                            <div class="widget style1">
                                                <div class="row">
                                                
                                                    <div class="col-lg-12">
                                                        <span>Seacrh Assignments by ID</span>
                                                        <div class="input-group m-b"><span class="input-group-prepend">
                                                        <i class="fa fa-search fa-2x"></i>  <div class="col-lg-12">  <input placeholder="Assignment ID" type="text "name="users" oninput="showUser(this.value)" class="form-control">
                                                                </div> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                    <h3>
                    <div class="form-group">
								<label>Subtotal: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">$</div>
									<input value="<?php echo isset($invoice['data']['subTotal']) ? $invoice['data']['subTotal']: ''; ?>" type="number" class="form-control" name="data[subTotal]" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								</div>
							</div>
                        <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                        <a href="#" class="btn btn-white"><i class="fa fa-check " data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice"></i> Save </a>
                        <a href="invoice_print.html" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        
						   <!--Hidden Values-->
						   <input value="<?php echo isset($invoice['data']['assignment_id']) ? $invoice['data']['assignment_id']: '';?>"  type="hidden" class="form-control" name="data[assignment_id]" id="assignment_id" placeholder="Your File Number">
						   <input value="<?php echo isset($invoice['data']['company_file_number']) ? $invoice['data']['company_file_number']: '';?>"  type="hidden" class="form-control" name="data[company_file_number]" id="company_file_number" placeholder="Your File Number">
						   <input value="<?php echo isset($invoice['data']['attention']) ? $invoice['data']['attention']: '';?>"  type="hidden" class="form-control" name="data[attention]" id="attention" placeholder="Attention...">						   
						   <input value="<?php echo isset($invoice['data']['dateofloss']) ? $invoice['data']['dateofloss']: '';?>"  type="hidden" class="form-control" name="data[dateofloss]" id="dateofloss" placeholder="Date of Loss">
						   <input value="<?php echo isset($invoice['data']['cvi']) ? $invoice['data']['cvi']: '';?>"  type="hidden" class="form-control" name="data[cvi]" id="cvi" placeholder="CVI">
<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
<div id="txtHint"></div>
</div>
                            <div class="row">
                                <div class="col-sm-6">
                                    	
		      			<?php if(!empty($settings)){?>
		      				<img style="height: 65px;" src="<?php echo isset($settings['companyLogo'])? 'img/'.$settings['companyLogo']:LOGO; ?>">
		      				<br/>
		      				<?php echo isset($settings['companyName'])?$settings['companyName']:COMPANY_NAME; ?><br/>
		      				<?php echo isset($settings['address'])?$settings['address']:COMPANY_ADDRESS; ?><br/>
		      				<?php echo isset($settings['phone'])?$settings['phone']:PHONE; ?><br/>
		      				<?php echo isset($settings['contactEmail'])?$settings['contactEmail']:EMAIL; ?><br/>

		      			<?php }else{?>
		      			<div class="form-group">
							<input value="<?php echo isset($invoice['data']['companyName']) ? $invoice['data']['companyName']: ''; ?>" type="text" class="form-control" name="data[companyName]" id="companyName" placeholder="Company Name">
						</div>
						<div class="form-group">
							<textarea  class="form-control txt" rows='3' name="data[companyAddress]" id="companyAddress" placeholder="Your Address"><?php echo isset($invoice['data']['companyAddress']) ?  str_replace("<br />","\n", $invoice['data']['companyAddress']) : ''; ?></textarea>
						</div>
						<?php } ?>
						
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">INV-000567F7-00</h4>
                                    <span>To:</span>
                                    <div class="form-group">
							<input min="3" value="<?php echo isset($invoice['data']['clientCompanyName']) ? $invoice['data']['clientCompanyName']: ''; ?>"  type="text" class="form-control" name="data[clientCompanyName]" id="clientCompanyName" placeholder="Company Name">
						</div>
						<div class="form-group">
							<textarea class="form-control txt" rows='3' name="data[clientAddress]" id="clientAddress" placeholder="Client Address"><?php echo isset($invoice['data']['clientAddress']) ? str_replace("<br />","\n", $invoice['data']['clientAddress']): ''; ?></textarea>
						</div>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                               
							<thead>
								<tr>
									<th width="2%"><span style="float-left;padding-right:10px;color:white"><i class="fa fa-trash-o"></i></span><input id="check_all" class="formcontrol" type="checkbox"/></th>
									<th width="15%">Service Date</th>
									<th width="38%">Service Description</th>
									<th width="15%">Rate</th>
									<th width="15%">Hourly</th>
									<th width="15%">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($invoice['data']['Invoice'])&&!empty($invoice['data']['Invoice'])){?>
									<?php foreach ( $invoice['data']['Invoice']['itemNo'] as $key=>$item){?>
										<tr>
											<td> <input class="case" type="checkbox"/> </td>
											<td><input value="<?php echo isset($invoice['data']['Invoice']['itemNo'][$key]) ? $invoice['data']['Invoice']['itemNo'][$key]: ''; ?>" type="text" data-type="productCode" name="data[Invoice][itemNo][]" id="itemNo_<?php echo $key+1?>" class="form-control autocomplete_txt" autocomplete="off"></td>
											<td><input value="<?php echo isset($invoice['data']['Invoice']['itemName'][$key]) ? $invoice['data']['Invoice']['itemName'][$key]: 'Hello'; ?>" type="text" data-type="productName" name="data[Invoice][itemName][]" id="itemName_<?php echo $key+1?>" class="form-control autocomplete_txt" autocomplete="off"></td>
											<td><input value="<?php echo isset($invoice['data']['Invoice']['price'][$key]) ? $invoice['data']['Invoice']['price'][$key]: ''; ?>" type="number" name="data[Invoice][price][]" id="price_<?php echo $key+1?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
											<td><input value="<?php echo isset($invoice['data']['Invoice']['quantity'][$key]) ? $invoice['data']['Invoice']['quantity'][$key]: ''; ?>" type="number" name="data[Invoice][quantity][]" id="quantity_<?php echo $key+1?>" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
											<td><input value="<?php echo isset($invoice['data']['Invoice']['total'][$key]) ? $invoice['data']['Invoice']['total'][$key]: ''; ?>" type="number" name="data[Invoice][total][]" id="total_<?php echo $key+1?>" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										</tr>
									<?php } ?>
								<?php }else{?>
									<tr>
										<td><input class="case" type="checkbox"/></td>
										<td><input type="text" data-type="productCode" name="data[Invoice][itemNo][]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="text" data-type="productName" name="data[Invoice][itemName][]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="number" name="data[Invoice][price][]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										<td><input type="number" name="data[Invoice][quantity][]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										<td><input type="number" name="data[Invoice][total][]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
		      	</div><!-- /table-responsive -->
                            <div class='row'>
		      		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
		      			<button class="btn btn-danger btn-lg delete " type="button"><span><i class="fa fa-trash-o"></i></span></button>
		      			<button class="btn btn-success btn-lg addmore" type="button"><span><i class="fa fa-plus-square-o"></i></span></button>
		      		</div>
		      	</div>
                  <div class='row'>	
		      		<div class='col-xs-12 col-sm-8 col-md-8 col-lg-8'>
		      			<h3>Notes: </h3>
		      			<div class="form-group">
							<textarea class="form-control txt" rows='5' name="data[notes]" id="notes" placeholder="Your Notes"><?php echo isset($invoice['data']['notes']) ? str_replace("<br />","\n", $invoice['data']['notes']): ''; ?></textarea>
						</div>
						
                        <div class='form-group text-center'>
			      			<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm" style="background-image: linear-gradient(green, white);"/>
			      		</div>
						
		      		</div>
		      		<div class='col-xs-12'>
						<span>
							<div class="form-group">
								<label>Subtotal: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">$</div>
									<input value="<?php echo isset($invoice['data']['subTotal']) ? $invoice['data']['subTotal']: ''; ?>" type="number" class="form-control" name="data[subTotal]" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group">
								<label>Tax: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">$</div>
									<input value="<?php echo isset($invoice['data']['tax']) ? $invoice['data']['tax']: ''; ?>" type="number" class="form-control" name="data[tax]" id="tax" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group">
								<label>Tax Amount: &nbsp;</label>
								<div class="input-group">
									<input value="<?php echo isset($invoice['data']['taxAmount']) ? $invoice['data']['taxAmount']: ''; ?>" type="number" class="form-control" name="data[taxAmount]" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
									<div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="form-group">
								<label>Total: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">$</div>
									<input value="<?php echo isset($invoice['data']['totalAftertax']) ? $invoice['data']['totalAftertax']: ''; ?>" type="number" class="form-control" name="data[totalAftertax]" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group">
								<label>Amount Paid: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">$</div>
									<input value="<?php echo isset($invoice['data']['amountPaid']) ? $invoice['data']['amountPaid']: ''; ?>" type="number" class="form-control" name="data[amountPaid]" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								</div>
							</div>
							<div class="form-group">
								<label>Amount Due: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">$</div>
									<input value="<?php echo isset($invoice['data']['amountDue']) ? $invoice['data']['amountDue']: ''; ?>" type="number" class="form-control amountDue" name="data[amountDue]"  id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								</div>
							</div>
						</span>
					</div>
		      	</div>
                           
                            
                        </div>
                </div>
            </div>
        </div>
                          </form>
 <script>
    	$('.submit_btn').on('click', function(){
    		$(this).button('loading');
        });

        $(document).ready(function(){
			$('.currency').html( $('#currency').val() );
       	});
        
		$('#clientCompanyName').autocomplete({
    		source: function( request, response ) {
    			$.ajax({
    				url : 'ajax.php',
    				dataType: "json",
    				method: 'post',
    				data: {
    					name_startsWith: request.term,
    					type: 'customerName'
    				},
    				success: function( data ) {
    					response( $.map( data, function( item ) {
    						var code = item.split("|");
    							return {
    								label: code[1],
    								value: code[1],
    								data : item
    							}
    						}));
    					}
    				});
    		},
    		autoFocus: true,	      	
    		minLength: 1,
    		select: function( event, ui ) {
    			var names = ui.item.data.split("|");
    			$(this).val(names[1]);
    			getClientAddress(names[0]);
    		}		      	
    	});
    	function getClientAddress(id){
    		
    		 $.ajax({
        		 url: "ajax.php",
        		 method: 'post', 
        		 data:{id:id, type:'clientAddress'},
        		 success: function(result){
    		        $("#clientAddress").html(result);
    		    }
 		    });
       	}

            $( "#new-projects" ).load( "/resources/load.html #projects li" );

       	
    	       
    </script>
    <script src="js/jquery-ui.min.js"></script>
   <script src="js/auto.js"></script>
            <?php include 'templatesVEO/footer.php'; ?>