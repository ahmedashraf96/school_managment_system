<?php
include "blank.php";


function content(){

?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
           


  
  <thead>
              <tr> <th>id</th> <th>Question Name</th> <th>Lesson Name</th> <th>Department Name</th> <th>Section Name</th>   </tr>
          </thead>
          

          <tbody>
<?php
         $conn=new connection();
         $prepare ='SELECT * FROM questions';
         $stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
         while($data = $stmt->fetch( PDO::FETCH_ASSOC )){
           $prepare1 ='SELECT * FROM lessons  where id='.$data['lesson_id'];
           $stmt1= $conn->DBC->prepare($prepare1);
           $stmt1->execute();
           $data1 = $stmt1->fetch( PDO::FETCH_ASSOC);
          $prepare2 ='SELECT * FROM departments  where id='.$data1['department_id'];
           $stmt2= $conn->DBC->prepare($prepare2);
           $stmt2->execute();
           $data2 = $stmt2->fetch( PDO::FETCH_ASSOC);
           $prepare3 ='SELECT * FROM sections  where id='.$data2['section_id'];
           $stmt3= $conn->DBC->prepare($prepare3);
           $stmt3->execute();
           $data3 = $stmt3->fetch( PDO::FETCH_ASSOC);
                                                  
                                                  
        
    ?>

    <tr> <td><?php echo $data['id']; ?></td>  <td><?php echo $data['name']; ?></td>  <td><?php echo $data1['name']; ?></td> <td><?php echo $data2['name']; ?></td> <td><?php echo $data3['name']; ?></td><td> <a href="edit_question.php?<?php  echo "id=".$data['id']?>"> Edit </a> </td> <td> <a id="delete_question"  uid="<?php echo $data['id'];?>" > Delete </a> </td> 
                   
             


    </tr>
    <?php } ?>
                 
  


          </tbody>

                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                             </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>

 
 <?php                   
}
?>