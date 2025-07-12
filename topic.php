Form validation with GET.
#register.php => 
                       <form action="register_post.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                                <?php if(isset($_GET['name_error'])){ ?>
                                        <strong class="text-danger"><?= $_GET['name_error'] ?></strong>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                                <?php if (isset($_GET['email_error'])){ ?>
                                    <strong class="text-danger"><?= $_GET['email_error'] ?></strong>
                                <?php } ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
#REgister_post.php
                        <?php
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        if(empty($name)){
                            $error = "Enter your name";
                            header('location:register.php?name_error='.$error);
                        }elseif(empty($email)){
                            $error = "Enter your mail";
                            header('location:register.php?email_error='.$error);
                        }
                        else{
                            echo $name;
                        }
                        
                        ?>
===============================================================================
