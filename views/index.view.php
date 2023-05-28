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
                            <?php foreach ($folders as $folder): ?>
                                <li class="list-group-item px-2">
                                    <a href="?folder_id=<?php echo $folder->id ?>"><i class="fa fa-folder px-2"></i><?= $folder->name ?></a>
                                    <a class="remove" href="?delete_folder=<?php echo $folder->id ?>"><i class="fa fa-trash  px-2"></i>remove</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="mb-3 mt-3 px-2">
                        ALL
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" id="addFolderInput" class="form-control" placeholder="Add New Folder">
                    </div>

                    <div class="mb-3 mt-3">
                        <button type="button" id="addFolderBtn" class="btn btn-success btn-sm">Add Folder</button>
                    </div>

                </div>

                <div class="right-main col-lg-10 bg-white">

                    <div class="main-header  border-bottom p-4 d-flex justify-content-between">

                        <div class="main-title">
                            <h3 class=" text-secondary">Manage Tasks</h3>
                        </div>

                        <div class="main-header-op d-flex flex-row ">

                            <div>
                                <button id="trash" class="btn btn-danger btn-sm mx-2">Trash</button>
                            </div>
                            <div>
                                <button id="completed" class="btn btn-secondary btn-sm mx-2">Completed</button>
                            </div>
                            <div>
                                <button id="addNewTask" class="btn btn-info btn-sm mx-2">Add New Task</button>
                            </div>


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

                        $('.folder-list').append('<li class="list-group-item px-2"> <a href="?folder_id=14"><i class="fa fa-folder px-2"></i>'+ input +'</a> <a class="remove" href="?delete_folder=14"><i class="fa fa-trash  px-2"></i>remove</a> </li>');
                    } else {
                        alert(response);
                    }

                }

            });
        });


        // $('.isDone').click(function(e){
        //     var tid = $(this).attr('data-taskId');
        //     $.ajax({
        //         url : "process/ajaxHandler.php",
        //         method : "post",
        //         data : {action: "doneSwitch",taskId : tid},
        //         success : function(response){
        //             location.reload();
        //         }
        //     });
        // });

        // $('#addFolderBtn').click(function(e){
        //     var input = $('input#addFolderInput');
        //     $.ajax({
        //         url : "process/ajaxHandler.php",
        //         method : "post",
        //         data : {action: "addFolder",folderName: input.val()},
        //         success : function(response){
        //             if(response == '1'){
        //                 $('<li> <a href="#"><i class="fa fa-folder"></i>'+input.val()+'</a></li>').appendTo('ul.folder-list');
        //             }else{
        //                 alert(response);
        //             }
        //         }
        //     });
        // });

        //$('#taskNameInput').on('keypress',function(e) {
        //    e.stopPropagation();
        //    if(e.which == 13) {
        //        $.ajax({
        //            url : "process/ajaxHandler.php",
        //            method : "post",
        //            data : {action: "addTask",folderId : <?//= $_GET['folder_id'] ?? 0 ?>// ,taskTitle: $('#taskNameInput').val()},
        //            success : function(response){
        //                if(response == '1'){
        //                    location.reload();
        //                }else{
        //                    alert(response);
        //                }
        //            }
        //        });
        //    }
        //});
        //$('#taskNameInput').focus();
    });

</script>
</body>
</html>

