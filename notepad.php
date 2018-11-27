<?php include 'templatesVEO/header_np.php'; ?>

<body>

    <div id="wrapper">

        <?php include 'templatesVEO/navtemp.php'; ?> <!--NAV SIDE-->

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

        <?php include 'templatesVEO/static-nav.php'; ?> <!--NAV STACTIC-->

        </div>


            <div class="row wrapper border-bottom black-bg page-heading" style="background-image: linear-gradient(white, grey);border:.75px solid grey;font-size:18px; box-shadow: 5px 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                            
             
                <div class="col-sm-8 text-center" >
                 <h1>Note Book</h1>
                </div>
            </div>






            <div class="wrapper wrapper-content gray-bg ">
            <div id="demo">

<h2>The XMLHttpRequest Object</h2>

<button type="button"
onclick="loadDoc('ajax_info.txt', myFunction)">Change Content
</button>
</div>

<script>
function loadDoc(url, cFunction) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      cFunction(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
function myFunction(xhttp) {
  document.getElementById("demo").innerHTML =
  xhttp.responseText;
}
</script>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs" role="tablist" style="">
                          <li style="background-image: linear-gradient(white, grey );border:.75px solid grey; border-radius:6px;font-size:18px; box-shadow: 5px 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link  active btn-xs" data-toggle="tab" href="#tab-0"><i class="fa fa-codepen " style="color:blue;;"></i></a></li>
                                <li style="background-image: linear-gradient(white, grey );border:.75px solid grey; border-radius:6px;font-size:18px; box-shadow: 5px 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link btn-xs" data-toggle="tab" href="#tab-66"><i class="fa fa-database " style="color:aqua;"></i></a></li>
                             
                                <li  style="background-image: linear-gradient(white, grey);border:.75px solid grey; border-radius:6px;font-size:18px; box-shadow: 5px 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">  
                                 
                                <span class="input-group-prepend">
                                <a class="nav-link btn-xs" ><i class="fa fa-search " style="color:blue;"></i></a>
                                    <input style="color:blue;border-radius: 12px;  " id="convert" placeholder="Assignment ID" type="text "name="users" onupdate="showUser(this.value)" class="form-control" value="2018">
                                </li>

                            
                                
                            </ul> 

                            
                            <div class="tab-content">

                                    <div role="tabpanel" id="tab-0" class="tab-pane active">
                                        <div class="panel-body white-bg">
                                    
                                            <div class="text-center">
		                        <a class="btn btn-white btn-bitbucket" style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);" value="Print ACAR" id="btnPrint">
		                            <i class="fa fa-print"></i>
		                        </a>
		                        <a class="btn btn-white btn-bitbucket " style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
		                            <i class="fa fa-edit"></i>
		                        </a>
		                        <a class="btn btn-white btn-bitbucket " style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
		                            <i class="fa fa-book"></i>
		                        </a>
		                        <a class="btn btn-white btn-bitbucket " style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
		                            <i class="fa fa-exchange"></i>
		                        </a>                 
                                </div>
                                    
                                          <hr> 
                   
                                                   
                                                        <div id="txtHint"> <div class="col-lg-4 text-center">
                                                        <h5>Awaiting Entry -- {<i class="fa fa-codepen" style="color:aqua;font-size:15px"></i>} </h5>
        <h1><span style="color:aqua">{</span>Assignment ID<span style="color:aqua">}</span></h1>
                                                                <div class="spiner-example">
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

                                                    </div></div>                                                              
                                                        
                             
                                        

                                        </div>               
                                    </div>

                                    <div role="tabpanel" id="tab-66" class="tab-pane">
                                        <div class="panel-body">

                             
                                                
                                            <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Client</th>
                                                <th>File Number</th>
                                                <th>Claimant</th>
                                                <th>Insured</th>
                                                <th>STATUS</th>
                                              
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                                    <?php
                                                    $con = mysqli_connect('localhost','root','','smart_invoice_v1');
                                                    if (!$con) {
                                                        die('Could not connect: ' . mysqli_error($con));
                                                    }

                                                    mysqli_select_db($con);
                                                    $sql="SELECT * FROM assignments_t1";
                                                    $result = mysqli_query($con,$sql);

                                                    while($row = mysqli_fetch_array($result)) {
                                                    ?>

                                                    <tr>
                                                        <td><span style="color:blue"><i class="fa fa-codepen"></i>  <?php echo $row['id']?></span></td>
                                                        <td><?php echo $row['client_name']?></td>
                                                        <td><?php echo $row['file_number']?></td>
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['client_name']?></td>
                                                        <td><?php echo $row['file_number']?></td>
                                                        <td><span style="color:green"> OPN </span> {<i class="fa fa-folder-o"></i>}</td>
                                                    </tr>


                                                    <?php
                                                    }
                                                    mysqli_close($con);
                                                    ?>    
           
                                            </tbody>                                       
                                            </table>
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
    <script src="jsVEO/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="jsVEO/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="jsVEO/plugins/dataTables/datatables.min.js"></script>
    <script src="jsVEO/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="jsVEO/inspinia.js"></script>
    <script src="jsVEO/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

</body>

</html>
