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
                        <a href="<?= siteUrl('?logout=1') ?>" class="float-end text-white mt-2"><i class="bi bi-box-arrow-right"></i></a>
                        <span class="username float-end"><?= getLoggedInUser()->name ?></span>
                        <img src="assets/img/profile.png" class="rounded float-end" width="40" height="40">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-3 side">
                            <div class="title">Folders</div>
                            <div class="add-folder mt-2">
                                <input class="input px-2 pb-1" type="text" id="addFolderInput" name="addFolderInput" placeholder="add new folder">
                                <button id="addFolderBtn" class="custom-btn text-white"><i class="bi bi-plus"></i></button>
                            </div>
                            <ul class="folder-list p-0 list-unstyled">
                                <li class="active">
                                    <a href="<?= BASE_URL ?>" class="link <?= (isset($_GET['folder_id'])) ? '' : 'active' ?>"><i class="bi bi-folder-fill mx-2"></i>All</a>
                                </li>
                                <?php foreach ($folders as $folder) : ?>
                                    <li>
                                        <a href="?folder_id=<?= $folder->id ?>" class="link <?= (isset($_GET['folder_id']) && $_GET['folder_id'] == $folder->id) ? 'active' : '' ?>"><i class="bi bi-folder-fill mx-2"></i><?= $folder->name ?></a>
                                        <a href="?delete_folder=<?= $folder->id ?>" class="float-end me-1 remove"><i class="bi bi-trash"></i></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-9">
                            <div class="w-100 pb-4" style="border-bottom: 1px solid #E0E0E0;">
                                <input type="text" name="addTaskInput" id="addTaskInput" placeholder="add new task">
                            </div>
                            <div class="tasks-title">My Tasks</div>
                            <ul class="list-unstyled">
                                <?php foreach ($tasks as $task) : ?>
                                    <li class="task <?= $task->is_done == 1 ? 'checked' : '' ?> my-1">
                                        <i data-taskId="<?= $task->id ?>" class="is_done <?= $task->is_done == 1 ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' ?>"></i>
                                        <span class="task-title mx-2"><?= $task->title ?></span>
                                        <div class="info float-end">
                                            <span class="created_at"><?= $task->created_at ?></span>
                                            <a href="?delete_task=<?= $task->id ?>" class="pull-right remove text-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="bi bi-trash"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#addTaskInput').focus();

            // Add Folder
            $('#addFolderBtn').click(function() {
                let input = $('#addFolderInput');
                $.ajax({
                    url: 'process/ajaxHandler.php',
                    method: 'post',
                    data: {
                        action: 'addFolder',
                        folderName: input.val()
                    },
                    success: function(responce) {
                        if (responce == '1') {
                            location.reload();
                            input.val('');
                        } else {
                            alert(responce);
                        }
                    }
                });
            });

            // Add Task
            $('#addTaskInput').keypress(function(e) {
                if (e.which == 13) {
                    $.ajax({
                        url: 'process/ajaxHandler.php',
                        method: 'post',
                        data: {
                            action: 'addTask',
                            taskTitle: $('#addTaskInput').val(),
                            folder_id: <?= $_GET['folder_id'] ?? 0 ?>
                        },
                        success: function(responce) {
                            if (responce == '1') {
                                location.reload();
                                $('#addTaskInput').val('');
                            } else {
                                alert(responce);
                            }
                        }
                    });
                }
            });

            $('.is_done').click(function(e) {
                let taskId = $(this).attr('data-taskId');
                $.ajax({
                    url: 'process/ajaxHandler.php',
                    method: 'post',
                    data: {
                        action: 'taskStatus',
                        taskId: taskId
                    },
                    success: function(responce) {
                        if (responce == '1') {
                            location.reload();
                        } else {
                            alert(responce);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>