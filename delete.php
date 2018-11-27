<?php

/**
 * Delete a user
 */

require "config2.php";
require "common.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $id = $_GET["id"];

    $sql = "DELETE FROM tasks_board WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM tasks_board";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php include 'templatesVEO/header.php'; ?>

<body>

    <div id="wrapper">

        <?php include 'templatesVEO/navtemp.php'; ?> <!--NAV SIDE-->

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

        <?php include 'templatesVEO/static-nav.php'; ?> <!--NAV STACTIC-->

        </div>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Teams Board IN DEVELOPMENT</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"></a>
                        </li>
                        
                    </ol>
                </div>
             
                <div class="col-sm-8">
                    <div class="title-action">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                            Add Task
                                        </button>
                    </div>
                </div>
            </div>






        
                <div class="wrapper wrapper-content">
                   
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox collapsed ">
                                    <div class="ibox-title">
                                        <h5><a href=""></a> Teams Board</h5>
                                        
                                        <div class="ibox-tools">
                                     
                                   
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                                </li>
                                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                                </li>
                                            </ul>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                      
                                    
                           
                            <h2>Delete Task...</h2>
            
            
                                    <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Deadline</th>
                                                    <th>Description</th>
                                                    <th>Employee</th>
                                                    <th>Priorty Level</th>
                                                    <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($result as $row) : ?>
                                                    <tr>
                                                    <td><?php echo escape($row["id"]); ?></td>
                                                    <td><?php echo escape($row["date"]); ?></td>
                                                    <td><?php echo escape($row["deadline"]); ?></td>
                                                    <td><?php echo escape($row["description"]); ?></td>
                                                    <td><?php echo escape($row["employee"]); ?></td>
                                                    <td><?php echo escape($row["level"]); ?></td>
                                                
                                                    <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                                </table>
                                                </div>                                                    
                                                            
                      
                                    </div>                     
                                </div>
                            </div>
                    </div>
              
      









                
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-tasks modal-icon"></i>
                                            <h4 class="modal-title">Add Task to Teams Board</h4>
                                            <small class="font-bold">Let the team no what is priorty to increase Accounts Recievable...</small>
                                        </div>
                                        <div class="modal-body">
                                        <form action="insert_tasks.php" method="post">
                                                    <div class="form-group"><label>Date Added</label> <input id="datepicker" type="text" placeholder="Date" class="form-control" name="date"></div>
                                                    <div class="form-group"><label>Deadline</label> <input id="datepicker1" type="text" placeholder="Deadline" class="form-control" name="deadline"></div>
                                                    <div class="form-group"><label>Task</label> <input type="text" placeholder="Description" class="form-control" name="description"></div>
                                                    <div class="form-group"><label>Who should complete this task?</label> <input type="text" placeholder="Employees Name" class="form-control" name="employee"></div>
                                     <h4>Priorty Level</h4>
                                                    <div class="form-check form-check from-group">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="level" value="1">
                                                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="level" value="2">
                                                        <label class="form-check-label" for="inlineCheckbox2">2 </label> 
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="level" value="3">
                                                        <label class="form-check-label" for="inlineCheckbox3">3 </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="level" value="4">
                                                        <label class="form-check-label" for="inlineCheckbox3">4 </label>
                                                        </div>                                       </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-white" value="Insert">Add Task</button>
                                            </form>   
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php include 'templatesVEO/footer.php'; ?>