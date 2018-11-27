<?php include 'templatesVEO/assignment_db_header.php'; ?>

<body>

    <div id="wrapper">

        <?php include 'templatesVEO/navtemp.php'; ?> <!--NAV SIDE-->

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

        <?php include 'templatesVEO/static-nav.php'; ?> <!--NAV STACTIC-->

        </div>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
            
                  
                        
                <div class="col-md-12">
                         
                <div class="col-sm-12">
                    <div class="title-action">
                      

  <em><label for="single-label-example"><h6>This Search Bar filters your entire data base, but ID CLAIMAINT INSURED FILE CLIENT. There are in grouped, labeld by ID. Find the assigment you need, enter it the one below.</h6></label></em>
  <form >  
  

          <input type="text" data-placeholder="Search By Client, File Number , Claimant , Insured?" class="chosen-select" id="convert" placeholder="Assignment ID"  name="user" oninput="showHint(this.value)" class="form-control" id="copytext" tabindex="17" >
           
                                    <?php
                                        $con = mysqli_connect('localhost','root','','smart_invoice_v1');
                                        if (!$con) {
                                            die('Could not connect: ' . mysqli_error($con));
                                        }

                               
                                        mysqli_select_db($con);
                                    
                                        $sql="SELECT * FROM assignments_t1 LIMIT 8";
                                        $result = mysqli_query($con,$sql);
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>
                                    <optgroup label="<?php echo $row['id']?>" class="text-danger">
                                       <option selected> <?php echo $row['id']?></option>
                                        <option>Client-- <?php  echo $row['client_name']?></option>
                                        <option>Isnured-- <?php  echo $row['ins_name']?></option>
                                        <option>Claimant-- <?php  echo $row['claimant_name']?></option>
                                        <option>File Number-- <?php  echo $row['file_number']?></option>
                                            
                                        
                                      
                                        <?php
                                        }
                                        mysqli_close($con);
                                        ?>   

                                            </optgroup>
                                        </select> 
                                   
                               
                                
                                   
                                    
                                    
                    </div>
                </div>
            </div>



</form>
<hr>
<hr>
           
                </div>
              
             


        
                <div class="wrapper wrapper-content">
                    <div class=" text-center animated fadeInRightBig">

                            <div id="txtHint"> 
                            <div class="col-lg-12 text-center">
                                    <h1>Awaiting Entry -- {<i class="fa fa-codepen" style="color:slategrey;font-size:30px"></i>} </h1>
                                   
                                   <div class="spiner-example text-center" style="height: 150px;width: 100%;">
                                       <div class="sk-spinner sk-spinner-grey sk-spinner-cube-grid">
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                           <div class="sk-cube"></div>
                                       </div>
                                   </div>
                               </div>
                           </div>  



                    </div>
                </div>
      









                <div class="footer">
                        <div class="float-right">
                            10GB of <strong>250GB</strong> Free.
                        </div>
                        <div>
                            <strong>Copyright</strong> Example Company &copy; 2014-2018
                        </div>
                    </div>

                </div>
            </div>
      <!-- Mainly scripts -->
      <script src="jsVEO/jquery-3.1.1.min.js"></script>
        <script src="jsVEO/popper.min.js"></script>
        <script src="jsVEO/bootstrap.js"></script>
    
      <!-- Custom and plugin javascript -->
      <script src="jsVEO/inspinia.js"></script>
        <script src="jsVEO/plugins/pace/pace.min.js"></script>
        <script src="jsVEO/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
        <!-- Chosen -->
        <script src="jsVEO/plugins/chosen/chosen.jquery.js"></script>
    
       <!-- JSKnob -->
       <script src="jsVEO/plugins/jsKnob/jquery.knob.js"></script>
    
       <!-- Input Mask-->
        <script src="jsVEO/plugins/jasny/jasny-bootstrap.min.js"></script>
    
       <!-- Data picker -->
       <script src="jsVEO/plugins/datapicker/bootstrap-datepicker.js"></script>
    
       <!-- NouSlider -->
       <script src="jsVEO/plugins/nouslider/jquery.nouislider.min.js"></script>
    
       <!-- Switchery -->
       <script src="jsVEO/plugins/switchery/switchery.js"></script>
    
        <!-- IonRangeSlider -->
        <script src="jsVEO/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
    
        <!-- iCheck -->
        <script src="jsVEO/plugins/iCheck/icheck.min.js"></script>
    
        <!-- MENU -->
        <script src="jsVEO/plugins/metisMenu/jquery.metisMenu.js"></script>
    
        <!-- Color picker -->
        <script src="jsVEO/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    
        <!-- Clock picker -->
        <script src="jsVEO/plugins/clockpicker/clockpicker.js"></script>
    
        <!-- Image cropper -->
        <script src="jsVEO/plugins/cropper/cropper.min.js"></script>
    
        <!-- Date range use moment.js same as full calendar plugin -->
        <script src="jsVEO/plugins/fullcalendar/moment.min.js"></script>
    
        <!-- Date range picker -->
        <script src="jsVEO/plugins/daterangepicker/daterangepicker.js"></script>
    
        <!-- Select2 -->
        <script src="jsVEO/plugins/select2/select2.full.min.js"></script>
    
        <!-- TouchSpin -->
        <script src="jsVEO/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    
        <!-- Tags Input -->
        <script src="jsVEO/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    
        <!-- Dual Listbox -->
        <script src="jsVEO/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>
    
        <script>
            $(document).ready(function(){
    
                $('.tagsinput').tagsinput({
                    tagClass: 'label label-primary'
                });
    
                var $image = $(".image-crop > img")
                $($image).cropper({
                    aspectRatio: 1.618,
                    preview: ".img-preview",
                    done: function(data) {
                        // Output the result data for cropping image.
                    }
                });
    
                var $inputImage = $("#inputImage");
                if (window.FileReader) {
                    $inputImage.change(function() {
                        var fileReader = new FileReader(),
                                files = this.files,
                                file;
    
                        if (!files.length) {
                            return;
                        }
    
                        file = files[0];
    
                        if (/^image\/\w+$/.test(file.type)) {
                            fileReader.readAsDataURL(file);
                            fileReader.onload = function () {
                                $inputImage.val("");
                                $image.cropper("reset", true).cropper("replace", this.result);
                            };
                        } else {
                            showMessage("Please choose an image file.");
                        }
                    });
                } else {
                    $inputImage.addClass("hide");
                }
    
                $("#download").click(function() {
                    window.open($image.cropper("getDataURL"));
                });
    
                $("#zoomIn").click(function() {
                    $image.cropper("zoom", 0.1);
                });
    
                $("#zoomOut").click(function() {
                    $image.cropper("zoom", -0.1);
                });
    
                $("#rotateLeft").click(function() {
                    $image.cropper("rotate", 45);
                });
    
                $("#rotateRight").click(function() {
                    $image.cropper("rotate", -45);
                });
    
                $("#setDrag").click(function() {
                    $image.cropper("setDragMode", "crop");
                });
    
                var mem = $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                        keyboardNavigation: false,
                        forceParse: false,
                        calendarWeeks: true,
                        autoclose: true
                    });
        
                    var yearsAgo = new Date();
                    yearsAgo.setFullYear(yearsAgo.getFullYear() - 20);
        
                    $('#selector').datepicker('setDate', yearsAgo );
        
        
                    $('#data_2 .input-group.date').datepicker({
                        startView: 1,
                        todayBtn: "linked",
                        keyboardNavigation: false,
                        forceParse: false,
                        autoclose: true,
                        format: "dd/mm/yyyy"
                    });
        
                    $('#data_3 .input-group.date').datepicker({
                        startView: 2,
                        todayBtn: "linked",
                        keyboardNavigation: false,
                        forceParse: false,
                        autoclose: true
                    });
        
                    $('#data_4 .input-group.date').datepicker({
                        minViewMode: 1,
                        keyboardNavigation: false,
                        forceParse: false,
                        forceParse: false,
                        autoclose: true,
                        todayHighlight: true
                    });
        
                    $('#data_5 .input-daterange').datepicker({
                        keyboardNavigation: false,
                        forceParse: false,
                        autoclose: true
                    });
        
                    var elem = document.querySelector('.js-switch');
                    var switchery = new Switchery(elem, { color: '#1AB394' });
        
                    var elem_2 = document.querySelector('.js-switch_2');
                    var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
        
                    var elem_3 = document.querySelector('.js-switch_3');
                    var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });
        
                    var elem_4 = document.querySelector('.js-switch_4');
                    var switchery_4 = new Switchery(elem_4, { color: '#f8ac59' });
                        switchery_4.disable();
        
                    $('.i-checks').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green'
                    });
        
                    $('.demo1').colorpicker();
        
                    var divStyle = $('.back-change')[0].style;
                    $('#demo_apidemo').colorpicker({
                        color: divStyle.backgroundColor
                    }).on('changeColor', function(ev) {
                                divStyle.backgroundColor = ev.color.toHex();
                            });
        
                    $('.clockpicker').clockpicker();
        
                    $('input[name="daterange"]').daterangepicker();
        
                    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        
                    $('#reportrange').daterangepicker({
                        format: 'MM/DD/YYYY',
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment(),
                        minDate: '01/01/2012',
                        maxDate: '12/31/2015',
                        dateLimit: { days: 60 },
                        showDropdowns: true,
                        showWeekNumbers: true,
                        timePicker: false,
                        timePickerIncrement: 1,
                        timePicker12Hour: true,
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        opens: 'right',
                        drops: 'down',
                        buttonClasses: ['btn', 'btn-sm'],
                        applyClass: 'btn-primary',
                        cancelClass: 'btn-default',
                        separator: ' to ',
                        locale: {
                            applyLabel: 'Submit',
                            cancelLabel: 'Cancel',
                            fromLabel: 'From',
                            toLabel: 'To',
                            customRangeLabel: 'Custom',
                            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            firstDay: 1
                        }
                    }, function(start, end, label) {
                        console.log(start.toISOString(), end.toISOString(), label);
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    });
        
                    $(".select2_demo_1").select2();
                    $(".select2_demo_2").select2();
                    $(".select2_demo_3").select2({
                        placeholder: "Select a state",
                        allowClear: true
                    });
        
        
                    $(".touchspin1").TouchSpin({
                        buttondown_class: 'btn btn-white',
                        buttonup_class: 'btn btn-white'
                    });
        
                    $(".touchspin2").TouchSpin({
                        min: 0,
                        max: 100,
                        step: 0.1,
                        decimals: 2,
                        boostat: 5,
                        maxboostedstep: 10,
                        postfix: '%',
                        buttondown_class: 'btn btn-white',
                        buttonup_class: 'btn btn-white'
                    });
        
                    $(".touchspin3").TouchSpin({
                        verticalbuttons: true,
                        buttondown_class: 'btn btn-white',
                        buttonup_class: 'btn btn-white'
                    });
        
                    $('.dual_select').bootstrapDualListbox({
                        selectorMinimalHeight: 160
                    });
        
        
                });
        
                $('.chosen-select').chosen({width: "100%"});
        
                $("#ionrange_1").ionRangeSlider({
                    min: 0,
                    max: 5000,
                    type: 'double',
                    prefix: "$",
                    maxPostfix: "+",
                    prettify: false,
                    hasGrid: true
                });
        
                $("#ionrange_2").ionRangeSlider({
                    min: 0,
                    max: 10,
                    type: 'single',
                    step: 0.1,
                    postfix: " carats",
                    prettify: false,
                    hasGrid: true
                });
        
                $("#ionrange_3").ionRangeSlider({
                    min: -50,
                    max: 50,
                    from: 0,
                    postfix: "°",
                    prettify: false,
                    hasGrid: true
                });
        
                $("#ionrange_4").ionRangeSlider({
                    values: [
                        "January", "February", "March",
                        "April", "May", "June",
                        "July", "August", "September",
                        "October", "November", "December"
                    ],
                    type: 'single',
                    hasGrid: true
                });
        
                $("#ionrange_5").ionRangeSlider({
                    min: 10000,
                    max: 100000,
                    step: 100,
                    postfix: " km",
                    from: 55000,
                    hideMinMax: true,
                    hideFromTo: false
                });
        
                $(".dial").knob();
        
                var basic_slider = document.getElementById('basic_slider');
        
                noUiSlider.create(basic_slider, {
                    start: 40,
                    behaviour: 'tap',
                    connect: 'upper',
                    range: {
                        'min':  20,
                        'max':  80
                    }
                });
        
                var range_slider = document.getElementById('range_slider');
        
                noUiSlider.create(range_slider, {
                    start: [ 40, 60 ],
                    behaviour: 'drag',
                    connect: true,
                    range: {
                        'min':  20,
                        'max':  80
                    }
                });
        
                var drag_fixed = document.getElementById('drag-fixed');
        
                noUiSlider.create(drag_fixed, {
                    start: [ 40, 60 ],
                    behaviour: 'drag-fixed',
                    connect: true,
                    range: {
                        'min':  20,
                        'max':  80
                    }
                });
        
        
            </script>
        
        </body>
        
        </html>
        