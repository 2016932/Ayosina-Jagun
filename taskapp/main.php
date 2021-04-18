<div id="mainBody">
    <div class="container-fluid">
        <div class="row">
            <!-- this is the sidebar menu -->
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div id="sideBody">
                    <a href="homepage.php">Home</a><br>
                    <div class="dropdown">
                <button class="dropbtn">Allplan</button>
                <div class="dropdown-content">
                    <a href="favourite.php">Favourite</a>

                    <div class="dropdown">
                        <button class="dropbtn">Category</button>
                        <div class="dropdown-content">
                            <a href="personal.php">Personal</a>
                            <a href="work.php">Work</a>
                            <a href="life.php">Life</a>
                            <a href="travel.php">Travel</a>
                            <a href="addcat.php">Add Category</a>
                            <a href="notes.php">Notes</a>
                            <a href="share.php">Share</a>
                        </div>
                    </div>
                </div>
            </div>
                </div>
          </div>

          <style>
                .dropbtn {
                    background-color: violet;
                    color: white;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                }

                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f1f1f1;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                }

                .dropdown-content a {
                    color: purple;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                .dropdown-content a:hover {
                    background-color: #ddd;
                }

                .dropdown:hover .dropdown-content {
                    display: block;
                }

                .dropdown:hover .dropbtn {
                    background-color: #3e8e41;
                }
            </style>


            <!-- this is the mainBody showing the calender and task information -->
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="taskBody">
                    <div class="row">
                        <?php
                            $newTasks= displayNewEvent();
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <?php foreach($newTasks as $task): ?>
                            <div id="newEvent">
                                <p>Newest Event: <?= $task['taskname']; ?></p>
                            </div>
                            <?php endforeach ?>
                        </div>

                        <?php
                            $totalTask= totalNoOfTasks();
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div id="totalTask">
                                <p>Total Task Available: <?= $totalTask ?> </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="taskButton">
                                <div id="dashboard">Dashboard</div>

                                <div id="addButton">
                                    <button type="button" data-toggle="modal" data-target="#newTask">Add New Task</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- this is the function to display all the tasks registered inside the database.
                        This function can be found in (functions.php)
                    -->
                    <?php 
                        $tasks= display_tasks();
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="taskTable">
                                <form action="controller.php" method="post">
                                    <table>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Task Name</th>
                                            <th>Start Date</th>
                                            <th>Deadline</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                        <?php $id = 1; ?>
                                        <?php foreach ($tasks as $task) : ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $task['taskname'] ?></td>
                                            <td><?= $task['start_date'] ?></td>
                                            <td><?= $task['deadline']?></td>
                                            <!-- Checkbox -->
                                            <td><input type='checkbox' name="checkbox[]" value='<?= $task["id"] ?>' ></td>
                                            
                                        </tr>
                                        <!-- this code below will increase the serial number by 1 every time a new task is added -->
                                        <?php $id++ ?>
                                        <?php endforeach ?>
                                    </table>

                                    <div id="delete">
                                        <button type="submit" id="trash" name="but_delete">
                                            Delete Selected Tasks
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <footer>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="footerBox">
                                    <p>This project is submitted by: </p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="newTask">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Get your busy tasks monitored </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="controller.php" method="post" id="taskForm">
            <div id="error"></div>

            <div class="form-group">
                <input type="text" name="taskname" placeholder="Enter the task name" class="form-control">
            </div>

            <div class="form-group">
                <label for="startdate">Start Date</label>
                <input type="date" name="startdate" class="form-control">
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="taskBtn" id="submitTask">Submit Task</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>