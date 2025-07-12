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

Form validation with SESSION.
#register.php => 
                    <form action="register_post.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>

                                <input type="text" name="name" value="<?= isset($_SESSION['name_value']) ? $_SESSION['name_value'] : '' ?>" class="form-control">


                                <?php if(isset($_SESSION['name_error'])){ ?>
                                        <strong class="text-danger"><?= $_SESSION['name_error'] ?></strong>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" value="<?= isset($_SESSION['email_value']) ? $_SESSION['email_value']: '' ?>" class="form-control">
                                <?php if (isset($_SESSION['email_error'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['email_error'] ?></strong>
                                <?php } ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
#REgister_post.php
                  <?php
                        session_start();
                        
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $flag = true;
                        
                        
                        if(empty($name)){
                            $_SESSION['name_error'] = "Enter your name";
                            $flag = false;
                        }
                        
                        
                        if(empty($email)){
                            $_SESSION['email_error'] = "Enter your mail";
                            $flag = false;
                        }else{
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $_SESSION['email_error'] = "Enter valild email";
                                $flag = false;
                            }
                        }
                        
                        
                        if($flag){
                            echo $name;
                            echo $email;
                        }else{
                            $_SESSION['name_value'] = $name;
                            $_SESSION['email_value'] = $email;
                            header('location:register.php');
                        }
                        
                        ?>
