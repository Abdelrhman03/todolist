<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Tasks</title>
    <style>
        .todo-item{
            display: flex !important;
            margin: 8px 0;
            border-radius: 0;
            background-color: #f7f7f7;
        }
        .todo-item.completed div{
            text-decoration: line-through;
        }
        .todo-item-remove{
            visibility: hidden;
        }
        
        .todo-item:hover .todo-item-remove{
            visibility: visible;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card-header p-3">
                    <form action="task/create" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="description" value="" required placeholder="New Task">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <div class="card-body p-3">
                    <ul class="nav nav-pi;;s justify-content-center mb-3">
                        <li class="nav-item">
                            <a href="<?= home() ?>" class="nav-link">
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?completed=0" class="nav-link">In Progress </a> 
                         </li>
                        <li class="nav-item">
                            <a href="?completed=1" class = "nav-link">completed</a>
                        </li>

                    </ul>
                    <?php foreach ($tasks as $task) : ?>

                        <div class="todo-item p-2 <?= !$task->completed ? : "completed" ?>">
                                <div class="todo-item p-2 <?= !$task->completed ? : "completed" ?>" >
                                    <div class="p-1">                                                        <!-- true : false -->
                                        <a href="task/update?id=<?= $task->id ?>&completed=<?= $task->completed ? 0:1 ?>">
                                            <i class="bi fs-5 <?= $task->completed ? "bi-check-square":"bi-clock text-secondary" ?>"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="flex-fill m-auto p-2">

                                    <?= $task->description ?>

                                </div>
                                <div class="mb-2" style="margin-top: 20px !important;">

                                    <a href="task/delete?id=<?= $task->id ?>">

                                        <i class="bi bi-trash text-danger fs-4 todo-item-remove"></i>

                                    </a>

                                </div>
                        </div>
                        <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>