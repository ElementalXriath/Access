<?php include 'templatesVEO/header_cal.php'; ?>

<body>

    <div id="wrapper">

        <?php include 'templatesVEO/navtemp.php'; ?> <!--NAV SIDE-->

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

        <?php include 'templatesVEO/static-nav.php'; ?> <!--NAV STACTIC-->

        </div>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>SEED</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">This is</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>
             
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">This is action area</a>
                    </div>
                </div>
            </div>






        
                <div class="wrapper wrapper-content">
                    <div class="middle-box text-center animated fadeInRightBig">
                       
                   <div id='calendar'></div>


                    </div>
                </div>
      





<script src='lib/jquery.min.js'></script>
<script src='lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>



            <?php include 'templatesVEO/footer.php'; ?>