 <?php

include "blank.php";
function content(){
$conn=new connection();


$name;
$pass;
$id=$_GET['id'];
$prepare ='SELECT * FROM  lessons where id='.$id;
$stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
       $data = $stmt->fetch( PDO::FETCH_ASSOC );
        $name=$data['name'];
        $department_id=$data['department_id'];
$prepare ='SELECT * FROM departments where id=:department_id ';
$stmt= $conn->DBC->prepare($prepare);
$stmt->bindParam(':department_id', $department_id);
$stmt->execute();
$data = $stmt->fetch( PDO::FETCH_ASSOC);
 $department_name=$data['name'];
 



 ?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"  id="edit_user" >
                                        
                                        <div class="form-group">
                                            <p>user_name</p>
                                        <input type="text"  name="name" placeholder="please enter the name" class="pass" required="" value="<?php echo $name;?> ">
                                        </input>
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                            <label>select the Department of this lesson</label>
                                            <select class="form-control" name="department">
                                                                                                
                                                    <?php 
                                                    $conn=new connection();
                                                   $prepare ='SELECT * FROM departments ';
                                                   $stmt= $conn->DBC->prepare($prepare);
                                                  $stmt->execute();
                                                  while($data = $stmt->fetch( PDO::FETCH_ASSOC) ) {
                                                    $prepare1 ='SELECT * FROM sections  where id='.$data['section_id'];
                                                           $stmt1= $conn->DBC->prepare($prepare1);
                                                           $stmt1->execute();
                                                           $data1 = $stmt1->fetch( PDO::FETCH_ASSOC);
                                                  
                                                    if($data['name']==$department_name){
                                                           
                                                   ?>
                                                  <option selected="selected" > <?php echo $data['name']."-".$data1['name']  ?> </option>
                                                
                                                   <?php  } else {?>
                                                    
                                                  <option >  <?php echo $data['name']."-".$data1['name']  ?>  </option>
                                                
                                                   <?php  }} ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="edit_lesson" >
                                        </div>
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="id" value="<? echo $id; ?>" >
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>