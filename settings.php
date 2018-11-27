<?php require_once 'templates/header.php';?>
<?php 
	$user_obj = new Cl_User();
	if( !empty( $_POST )){
		try {
			$data = $user_obj->saveSettings( $_POST );
			if($data){
				$_SESSION['success'] = SETTINGS_SAVED_SUCCESS;
				$results = $user_obj->getSettings();
			}
			//header('Location: manage-client.php');exit;
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}else{
		try {
			$results = $user_obj->getSettings();
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}
	
	
	
	$head_txt = 'Settings';
	$txt = 'Save Settings';
	
?>
<div class="container-fluid">
	<?php require_once 'templates/nav.php'; ?>
	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
		
		<h1 class="page-header"><?php echo $head_txt;?><i class="fa fa-gears"></i> </h1>
		<?php require_once 'templates/message.php';?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="settings-form" method="post" class="form-horizontal myaccount" role="form" enctype="multipart/form-data">
			<div class="load-animate">
				
				<div class="form-group">
					<span for="companyName" class="col-sm-4 control-span">Company Name</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['companyName']) ? $results['companyName']: ''; ?>" name="companyName" id="companyName" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				
				<div class="form-group">
					<span for="companyLogo" class="col-sm-4 control-span"> Company Logo </span>
					<div class="col-sm-8">
						<input  type="file" name="companyLogo" id="companyLogo">
						<?php if(isset($results['companyLogo'] ) && !empty($results['companyLogo'] )){ ?>
							<img src="img/<?php echo $results['companyLogo']; ?>" />
						<?php } ?>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="address" class="col-sm-4 control-span"> Address</span>
					<div class="col-sm-8">
						<textarea name="address" id="address" class="form-control" rows="3"> <?php echo isset($results['address']) ? $results['address']: ''; ?> </textarea>
						<span class="help-block"></span>
					</div>
				</div>
				
				<div class="form-group">
					<span for="phone" class="col-sm-4 control-span"> Phone</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['phone']) ? $results['phone']: ''; ?>" name="phone" id="phone" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="contactEmail" class="col-sm-4 control-span"> Contact Email </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['contactEmail']) ? $results['contactEmail']: ''; ?>" name="contactEmail" id="contactEmail" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<input value="<?php echo isset($results['currency']) ? $results['currency']: ''; ?>" id="currency_hidden" type="hidden" class="form-control">
				<div class="form-group">
					<span for="contactEmail" class="col-sm-4 control-span"> Currency </span>
					<div class="col-sm-8">
						<select name="currency" id="currency" class="form-control">
							<option value="?" label="">Choose Currency</option>
							<option value="د.إ" label="AED (د.إ)">AED (د.إ)</option>
							<option value="؋" label="AFN (؋)">AFN (؋)</option>
							<option value="Lek" label="ALL (Lek)">ALL (Lek)</option>
							<option value="ƒ" label="ANG (ƒ)">ANG (ƒ)</option>
							<option value="$" label="ARS ($)">ARS ($)</option>
							<option value="$" label="AUD ($)">AUD ($)</option>
							<option value="ƒ" label="AWG (ƒ)">AWG (ƒ)</option>
							<option value="ман" label="AZN (ман)">AZN (ман)</option>
							<option value="KM" label="BAM (KM)">BAM (KM)</option>
							<option value="$" label="BBD ($)">BBD ($)</option>
							<option value="лв" label="BGN (лв)">BGN (лв)</option>
							<option value="$" label="BMD ($)">BMD ($)</option>
							<option value="$" label="BND ($)">BND ($)</option>
							<option value="$b" label="BOB ($b)">BOB ($b)</option>
							<option value="R$" label="BRL (R$)">BRL (R$)</option>
							<option value="$" label="BSD ($)">BSD ($)</option>
							<option value="BTC" label="BTC (BTC)">BTC (BTC)</option>
							<option value="P" label="BWP (P)">BWP (P)</option>
							<option value="p." label="BYR (p.)">BYR (p.)</option>
							<option value="BZ$" label="BZD (BZ$)">BZD (BZ$)</option>
							<option value="$" label="CAD ($)">CAD ($)</option>
							<option value="CHF" label="CHF (CHF)">CHF (CHF)</option>
							<option value="$" label="CLP ($)">CLP ($)</option>
							<option value="¥" label="CNY (¥)">CNY (¥)</option>
							<option value="p." label="COP (p.)">COP (p.)</option>
							<option value="₡" label="CRC (₡)">CRC (₡)</option>
							<option value="₱" label="CUP (₱)">CUP (₱)</option>
							<option value="Kč" label="CZK (Kč)">CZK (Kč)</option>
							<option value="CHF" label="DJF (CHF)">DJF (CHF)</option>
							<option value="kr" label="DKK (kr)">DKK (kr)</option>
							<option value="RD$" label="DOP (RD$)">DOP (RD$)</option>
							<option value="£" label="EGP (£)">EGP (£)</option>
							<option value="€" label="EUR (€)">EUR (€)</option>
							<option value="$" label="FJD ($)">FJD ($)</option>
							<option value="£" label="FKP (£)">FKP (£)</option>
							<option value="£" label="GBP (£)">GBP (£)</option>
							<option value="£" label="GGP (£)">GGP (£)</option>
							<option value="£" label="GIP (£)">GIP (£)</option>
							<option value="Q" label="GTQ (Q)">GTQ (Q)</option>
							<option value="$" label="GYD ($)">GYD ($)</option>
							<option value="HK$" label="HKD (HK$)">HKD (HK$)</option>
							<option value="L" label="HNL (L)">HNL (L)</option>
							<option value="kn" label="HRK (kn)">HRK (kn)</option>
							<option value="Ft" label="HUF (Ft)">HUF (Ft)</option>
							<option value="Rp" label="IDR (Rp)">IDR (Rp)</option>
							<option value="₪" label="ILS (₪)">ILS (₪)</option>
							<option value="£" label="IMP (£)">IMP (£)</option>
							<option value="₹" label="INR (₹)">INR (₹)</option>
							<option value="﷼" label="IRR (﷼)">IRR (﷼)</option>
							<option value="kr" label="ISK (kr)">ISK (kr)</option>
							<option value="£" label="JEP (£)">JEP (£)</option>
							<option value="J$" label="JMD (J$)">JMD (J$)</option>
							<option value="¥" label="JPY (¥)">JPY (¥)</option>
							<option value="KSh" label="KES (KSh)">KES (KSh)</option>
							<option value="лв" label="KGS (лв)">KGS (лв)</option>
							<option value="៛" label="KHR (៛)">KHR (៛)</option>
							<option value="₩" label="KPW (₩)">KPW (₩)</option>
							<option value="₩" label="KRW (₩)">KRW (₩)</option>
							<option value="$" label="KYD ($)">KYD ($)</option>
							<option value="лв" label="KZT (лв)">KZT (лв)</option>
							<option value="₭" label="LAK (₭)">LAK (₭)</option>
							<option value="£" label="LBP (£)">LBP (£)</option>
							<option value="₨" label="LKR (₨)">LKR (₨)</option>
							<option value="$" label="LRD ($)">LRD ($)</option>
							<option value="Lt" label="LTL (Lt)">LTL (Lt)</option>
							<option value="Ls" label="LVL (Ls)">LVL (Ls)</option>
							<option value="LD" label="LYD (LD)">LYD (LD)</option>
							<option value="ден" label="MKD (ден)">MKD (ден)</option>
							<option value="₮" label="MNT (₮)">MNT (₮)</option>
							<option value="₨" label="MUR (₨)">MUR (₨)</option>
							<option value="$" label="MXN ($)">MXN ($)</option>
							<option value="RM" label="MYR (RM)">MYR (RM)</option>
							<option value="MT" label="MZN (MT)">MZN (MT)</option>
							<option value="$" label="NAD ($)">NAD ($)</option>
							<option value="₦" label="NGN (₦)">NGN (₦)</option>
							<option value="C$" label="NIO (C$)">NIO (C$)</option>
							<option value="kr" label="NOK (kr)">NOK (kr)</option>
							<option value="₨" label="NPR (₨)">NPR (₨)</option>
							<option value="$" label="NZD ($)">NZD ($)</option>
							<option value="﷼" label="OMR (﷼)">OMR (﷼)</option>
							<option value="B/." label="PAB (B/.)">PAB (B/.)</option>
							<option value="S/." label="PEN (S/.)">PEN (S/.)</option>
							<option value="₱" label="PHP (₱)">PHP (₱)</option>
							<option value="₨" label="PKR (₨)">PKR (₨)</option>
							<option value="zł" label="PLN (zł)">PLN (zł)</option>
							<option value="Gs" label="PYG (Gs)">PYG (Gs)</option>
							<option value="﷼" label="QAR (﷼)">QAR (﷼)</option>
							<option value="lei" label="RON (lei)">RON (lei)</option>
							<option value="Дин." label="RSD (Дин.)">RSD (Дин.)</option>
							<option value="руб" label="RUB (руб)">RUB (руб)</option>
							<option value="﷼" label="SAR (﷼)">SAR (﷼)</option>
							<option value="$" label="SBD ($)">SBD ($)</option>
							<option value="₨" label="SCR (₨)">SCR (₨)</option>
							<option value="kr" label="SEK (kr)">SEK (kr)</option>
							<option value="$" label="SGD ($)">SGD ($)</option>
							<option value="£" label="SHP (£)">SHP (£)</option>
							<option value="S" label="SOS (S)">SOS (S)</option>
							<option value="$" label="SRD ($)">SRD ($)</option>
							<option value="$" label="SVC ($)">SVC ($)</option>
							<option value="£" label="SYP (£)">SYP (£)</option>
							<option value="฿" label="THB (฿)">THB (฿)</option>
							<option value="DT" label="TND (DT)">TND (DT)</option>
							<option value="TRY" label="TRY (TRY)">TRY (TRY)</option>
							<option value="TT$" label="TTD (TT$)">TTD (TT$)</option>
							<option value="$" label="TVD ($)">TVD ($)</option>
							<option value="NT$" label="TWD (NT$)">TWD (NT$)</option>
							<option value="TSh" label="TZS (TSh)">TZS (TSh)</option>
							<option value="₴" label="UAH (₴)">UAH (₴)</option>
							<option value="USh" label="UGX (USh)">UGX (USh)</option>
							<option value="$" label="USD ($)">USD ($)</option>
							<option value="$U" label="UYU ($U)">UYU ($U)</option>
							<option value="лв" label="UZS (лв)">UZS (лв)</option>
							<option value="Bs" label="VEF (Bs)">VEF (Bs)</option>
							<option value="₫" label="VND (₫)">VND (₫)</option>
							<option value="$" label="XCD ($)">XCD ($)</option>
							<option value="﷼" label="YER (﷼)">YER (﷼)</option>
							<option value="R" label="ZAR (R)">ZAR (R)</option>
							<option value="Z$" label="ZWD (Z$)">ZWD (Z$)</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button id="submit_btn" type="submit" class="btn btn-primary"><?php echo $txt; ?></button>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div>
	
<script src="js/jquery.validate.min.js"></script>
<script src="js/settings.js"></script>  
<?php require_once 'templates/footer.php';?>




