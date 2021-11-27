<?php require_once 'process.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_calculator"); ?>
<?php  if(isset($_SESSION['message'])): ?>


<?php endif ?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-dark bg-dark text-center">
    <span class="navbar-brand mb-0 h1 text-center">Record Store</span>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center">Add Record</h2>
                <hr><br>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="budgetTitle">User Name</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="budget" class="form-control" id="budgetTitle" placeholder="Enter Budget Title" required autocomplete="off"  value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required  value="<?php echo $amount; ?>">
                    </div>
                    <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Total Budget : Rs. <?php echo $total;?></h2>
                <hr>
                <br><br>

                <?php 

                    if(isset($_SESSION['massage'])){
                        echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                    <strong> {$_SESSION['massage']} </storng>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                ";
                    }

                ?>
                <h2>Records List</h2>

                <?php 
                    
                    $result = mysqli_query($con, "SELECT * FROM budget");
                ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Budget Amount</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td> Rs. <?php echo $row['amount']; ?></td>
                                <td>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                                    <a href="process.php?delete=<?php echo $row['id']; ?>"  class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            

                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
</body>
</html>