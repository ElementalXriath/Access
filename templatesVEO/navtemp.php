<?php 
			
			$page = end( $url_arr );
			?>
<nav class="navbar-default navbar-static-side" role="navigation" >
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
            <?php if(isset( $_SESSION['logged_in']) ) { ?>
                <li class="nav-header">
                    <div class="dropdown profile-element">
                    <i class="fa fa-user fa-2x"></i>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">	<?php echo $_SESSION['first_name']; ?></span>
                            <span class="text-muted text-xs block">Programer <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                <a href="home.php"><i class="fa fa-windows"></i> <span class="nav-label">Dash</span> </a>
            </li>
                <li>
                <a href="#"><i class="fa fa-bar-chart-o" aria-hidden="true"></i><span class="nav-label">CRM</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                           
                                <li><a href="invoices.php"><i class="fa fa-archive"></i> Manage Invoices</a></li>
                                <li><a href="invoice.php"><i class="fa fa-edit"></i> Create New Invoice</a></li>
                                <li><a href="manage-client.php"><i class="fa fa-group"></i>Manage Clients</a></li>
                                <li><a href="add-client.php"><i class="fa fa-address-card" aria-hidden="true"></i>Add Client</a></li>
                                <li><a href="settings.php"><i class="fa fa-cogs"></i>CRM Settings</a></li>
                              </ul>  
                </li>                    
                <li>
                        <a href="#"><i class="fa fa-cube"></i><span class="nav-label">Assignments</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                         
                                <li><a href="assignments_db.php"><i class="fa fa-tasks"></i> Assignment-M</a></li>
                                <li><a href="n_ass_form.php"><i class="fa fa-plus-square-o"></i>New Assingment</a></li>
                              
                        </ul>
                    </li>
                 
                  
               
               <li>
                    <a href="file_manager.php"><i class="fa fa-folder"></i> <span class="nav-label">File Manager </span> </a>
                </li>
                <?php }?>
                
            </ul>

        </div>
    </nav>