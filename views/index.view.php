<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container todolist-body mt-5 mb-5">

    <div class="todolist-dashboard-header row">

        <div class="my-3 col-lg-6">
            <h4 class=" text-white">Dashboard</h4>
        </div>

        <div class="my-2 col-lg-6 d-flex justify-content-end">
            <img src="<?= BASE_URL ?>/assets/img/person.jpg" class="rounded  user-image" alt>
        </div>

        <div>

            <div class="todolist-body row">

                <div class="left-sidebar col-lg-2 px-2">

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="searchInput" placeholder="search">
                    </div>

                    <div class="mb-3 mt-3 px-2">
                        FOLDERS
                    </div>

                    <div class="mb-3 mt-3">
                        <ul class="list-group folder-list">
                            <!--   this line ok   -->
                            <li class="list-group-item px-2 <?= isset($_GET['folder_id']) ? '' : 'active' ?>">
                                <a href="<?= site_uri() ?>"><i class="fa fa-folder px-2"></i>All</a>
                            </li>

                            <?php foreach ($folders as $folder): ?>


                                <li class="<?= isset($_GET['folder_id']) ? (($_GET['folder_id'] == $folder->id) ? 'active' : '') : '' ?> list-group-item px-2">

                                    <a href="<?= site_uri("?folder_id= $folder->id") ?>"><i
                                                class="fa fa-folder px-2"></i><?= $folder->name ?></a>

                                    <a class="remove"
                                       onclick="return confirm('Are you sure to delete this item\n <?= $folder->name ?>')"
                                       href="?delete_folder=<?php echo $folder->id ?>">
                                        <i class="fa fa-trash  px-2"></i>
                                    </a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>


                    <div class="mb-3 mt-3">
                        <input type="text" id="addFolderInput" class="form-control" placeholder="Add New Folder">
                    </div>

                    <div class="mb-3 mt-3">
                        <button type="button" id="addFolderBtn" class="btn btn-success btn-sm">Add Folder</button>
                    </div>

                </div>

                <div class="right-main col-lg-10 bg-white d-flex flex-column">

                    <div class="main-header  border-bottom p-4 row">

                        <div class="main-title col-lg-6">
                            <div class="mb-3 mt-3">
                                <input type="text" id="addTaskInput" class="form-control" placeholder="Add New Task">
                            </div>
                        </div>

                        <div class="main-header-op d-flex justify-content-end align-items-center col-lg-6">
                            <div>
                                <button id="completed" class="btn btn-secondary btn-sm mx-2">Completed</button>
                            </div>
                            <div>
                                <button id="addNewTask" class="btn btn-info btn-sm mx-2">Add New Task</button>
                            </div>
                        </div>

                    </div>

                    <div class="task-content row mt-5">
                        <div class="col-lg-12">
                            <ul class="list-group task-list">

                                <?php if (sizeof($tasks) > 0): ?>

                                    <?php foreach ($tasks as $task): ?>
                                        <li class="list-group-item d-flex justify-content-between <?= $task->status == 0 ? '' : 'active'; ?>">
                                            <div>
                                                <i data-taskId="<?= $task->id ?>"
                                                   class="isDone fa-regular <?= $task->status ? 'fa-square-check fa-lg' : 'fa-square fa-lg'; ?>"></i>
                                                <span><?= $task->title ?></span>
                                            </div>
                                            <div class="info">
                                                <span><?= $task->created_at ?></span>
                                                <a class="remove"
                                                   href="<?= site_uri() ?>?delete_task=<?php echo $task->id ?>"
                                                   onclick="return confirm('Are you sure to delete this item?\n <?= $task->title ?>')">
                                                    <i class="fa fa-trash  px-2"></i>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <li class="list-group-item">
                                        No task here !
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- partial -->
<script src='<?= BASE_URL ?>/assets/js/jquery-3.5.1.min.js'></script>
<script src='<?= BASE_URL ?>/assets/js/bootstrap.bundle.min.js'></script>
<script src="<?= BASE_URL ?>/assets/js/script.js"></script>
<script>
    $(document).ready(function () {


        // add folder with ajax
        $('#addFolderBtn').click(function (e) {
            let input = document.getElementById('addFolderInput').value;
            $.ajax({
                url: "controllers/controller.php",
                method: "post",
                data: {action: "addFolder", folderName: input},
                success: function (response) {
                    if (response == '1') {
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        });
        // for add taks with ajax
        $('#addTaskInput').on('keypress', function (e) {
            if (e.which == 13) {
                let input = document.getElementById('addTaskInput').value;
                $.ajax({
                    url: "controllers/controller.php",
                    method: "post",
                    data: {
                        action: "addTask",
                        folderId: ' <?= isset($_GET['folder_id']) ? $_GET['folder_id'] : '' ?> ',
                        taskName: input
                    },
                    success: function (response) {
                        if (response == '1') {
                            location.reload();
                            document.getElementById('addTaskInput').value = '';
                        } else {
                            alert(response);
                        }
                    }
                });
            }
        });
        $('#addTaskInput').focus();

        // for make complete task with ajax
        $('.isDone').click(function (e) {
            let taskId = $(this).attr('data-taskId');
            $.ajax({
                url: "controllers/controller.php",
                method: "post",
                data: {action: "doneStatus", taskId: taskId},
                success: function (response) {
                    location.reload();
                }
            });
        });
    });

</script>
</body>
</html>

