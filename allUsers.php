
<?php include ('header.php');?>
 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>All Members List</h3>
          
            <table class="table table-borderd table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#SL.</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                    $sql = "SELECT * FROM users";
                    $allUsers = mysqli_query($db,$sql);

                    $i = 0;

                    while ($row = mysqli_fetch_assoc($allUsers)) {
                       $id         = $row['id'];
                       $firstname  = $row['firstname'];
                       $lastname   = $row['lastname'];
                       $username   = $row['username'];
                       $email      = $row['email'];
                       $phone      = $row['phone']; 
                       $join_date  = $row['join_date'];

                       $i++; 
                  ?>

                    <tr>
                      <th scope="row"><?php echo $i ?></th>
                      <td><?php echo $firstname ?></td>
                      <td><?php echo $lastname ?></td>
                      <td><?php echo $username ?></td>
                      <td><?php echo $email  ?></td>
                      <td><?php echo $phone ?></td>
                      <td><?php echo $join_date ?></td>
                      <td>

                        <div class="btn-group">
                          <a href="updateUsers.php?update=<?php echo $id?>" class="btn btn-info btn-sm">Update</a>
                          <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUser<?php echo $id?>">Delete</a>
                        </div>


                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteUser<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this user?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <div class="btn-group">
                              <a href="allUsers.php?delete=<?php echo $id?>" class="btn btn-danger">Yes</a>
                              <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                <?php }


                ?>
                  
                </tbody>
            </table>

            <?php

            if (isset($_GET['delete'])){
              $delID = $_GET['delete'];

              $sql = "DELETE FROM users WHERE id= '$delID' ";
              $delete_the_users = mysqli_query($db,$sql);

              if ($delete_the_users){
                header("Location: allUsers.php");
              }
              else {
                die("Mysql Connection Error".mysqli_error($db));
              }

            }


            ?>


          
        </div>
      </div>
    </div>
  </section> 

<?php include ('footer.php');?>