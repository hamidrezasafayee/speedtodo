<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/bootstrap-icons/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/img/profile.png" type="image/x-icon">
    <title>SpeedTodo - Todo Manager</title>
</head>
<body>
    <div class="container">
        <div class="col-12 mt-5">
            <div class="box w-100">
                <div class="custom-nav">
                    <div class="title text-white">SpeedTodo</div>
                    <div class="user">
                        <a href="http://learn.php/8-todo/?logout=1" class="float-end text-white mt-2"><i class="bi bi-box-arrow-right"></i></a>
                        <span class="username float-end">hamidreza safayee</span>
                        <img src="assets/img/profile.png" class="rounded float-end" width="40" height="40">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-3 side">
                            <div class="title">Folders</div>
                            <div class="add-folder mt-2">
                                <input class="input px-2 pb-1" type="text" name="addFolderInput" placeholder="add new folder">
                                <button id="addFolderBtn" class="custom-btn text-white"><i class="bi bi-plus"></i></button>
                            </div>
                            <ul class="folder-list p-0 list-unstyled">
                                <li class="active">
                                    <a href="#" class="link active"><i class="bi bi-folder-fill mx-2"></i>All</a>
                                </li>
                                <li>
                                    <a href="#" class="link"><i class="bi bi-folder-fill mx-2"></i>Personal</a>
                                    <a href="?delete_folder=1" class="float-end me-1 remove" onclick="return confirm('Are you sure to delete this item?')"><i class="bi bi-trash"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="link"><i class="bi bi-folder-fill mx-2"></i>Work</a>
                                    <a href="?delete_folder=1" class="float-end me-1 remove" onclick="return confirm('Are you sure to delete this item?')"><i class="bi bi-trash"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-9">
                            <div class="w-100 pb-4" style="border-bottom: 1px solid #E0E0E0;">
                                <input type="text" class="" name="addTaskInput" id="addTaskInput" placeholder="add new task">
                            </div>
                            <div class="tasks-title">My Tasks</div>
                            <ul class="list-unstyled">
                                <li class="task checked border-bottom border-top my-1">
                                    <i data-taskid="1" class="is-done bi-hand-thumbs-up-fill"></i>
                                    <span class="task-title mx-2">complete the project</span>
                                    <div class="info float-end">
                                      <span class="created_at">Created_at 2021-12-03 15:17:43</span>
                                      <a href="?delete_task=1" class="pull-right remove text-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>

                                <li class="task border-bottom border-top my-1">
                                    <i data-taskid="1" class="is-done bi-hand-thumbs-up"></i>
                                    <span class="task-title mx-2">complete the project</span>
                                    <div class="info float-end">
                                      <span class="created_at">Created_at 2021-12-03 15:17:43</span>
                                      <a href="?delete_task=1" class="pull-right remove text-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>

                                <li class="task border-bottom border-top my-1">
                                    <i data-taskid="1" class="is-done bi-hand-thumbs-up"></i>
                                    <span class="task-title mx-2">complete the project</span>
                                    <div class="info float-end">
                                      <span class="created_at">Created_at 2021-12-03 15:17:43</span>
                                      <a href="?delete_task=1" class="pull-right remove text-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>