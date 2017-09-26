<?php 
include('server.php'); 

  if(isset($_GET['edit']))
  {
    $id=$_GET['edit'];
    $edit_state=true;
    $rec=mysqli_query($database,"SELECT * FROM users WHERE id=$id");
    $record=mysqli_fetch_array($rec);
    $fname=$record['firstname'];
    $lname=$record['lastname'];
    $phone=$record['phone'];
    $date_joined =$record['date_joined'];
    $date_edited =$record['date_edited'];
    $id=$record['id'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>crud </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php 
    if(isset($_REQUEST['msg']))
    {
      if($_REQUEST['msg'] == 'success')
      {
        $message = 'Details Saved';
      }
      else if($_REQUEST['msg'] == 'deleted')
      {
        $message = 'Details Deleted';
      }
      else
      {
        $message = 'Details Updated';
      }
    }
    else
    {
      $message = '';
    }
  ?>
  <?php if($message!= ''){ ?>
    <div class='msg'><?=$message;?></div>
  <?php  } ?>
 <div class="container-fulid"> 
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
      <table class="table">
       <thead>
         <tr>
           <th>Firstname</th>
           <th>Lastname</th>
           <th>Phonenumber</th>
           <th>joined date</th>
           <th>Edited date</th>
           <th>Edit</th>
           <th>Delete</th>
         </tr>
       </thead>
       <tbody>
         <?php
         //pagination
            $res =mysqli_query($database,'SELECT * FROM users');
            $count=mysqli_num_rows($res);
            $a =$count/5;
            $a=ceil($a);
           if(isset($_GET['page']))
            {           
               $page = $_GET['page'];
               if($page == "" || $page =="1")
               {
                 $page1=0;
               }
               else
               {
                 $page1 =($page * 5)-5;
               }
           }
           else
           {
              $page1 = 1;
           }
           $read="SELECT * FROM users limit $page1,5" ;
           $result = mysqli_query($database,$read);
           while($row = mysqli_fetch_array($result)) { ?>
           <tr>
             <td><?php echo $row['firstname'];?></td>
             <td><?php echo $row['lastname']; ?></td>
             <td><?php echo $row['phone'];    ?></td>
             <td><?php echo date('d/m/y',strtotime($row['date_joined'])); ?></td>
             <td><?php echo date('d/m/y',strtotime($row['date_edited'])); ?></td>
             <td><a href="index.php?edit=<?php echo $row['id'];?>" id='edit'>Edit</a></td>
             <td><a  onClick="Delete(<?php echo $row['id']; ?>)" class='delete'>Delete</a></td> 
           </tr>
         <?php  }?>
       </tbody>
     </table>
      <div>
         <?php
          for($b=1;$b<=$a;$b++)
               {?>
                 <a href="index.php?page=<?php echo $b; ?>" id='pagination'><?php echo $b; ?></a><?php 
               }?>
      </div>     
    </div>
    <!-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
    </div> -->  
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> 
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
          <div class="input-group">
            <label>Firstname</label>
            <input type="text" id='firstname' name="firstname" value="<?php echo $fname;?>"/>
             <p id='first'></p> 
          </div>
          <div class="input-group">
            <label>Lastname</label>
            <input type="text" id='lastname' name="lastname" value="<?php echo $lname;?>"/>
            <p id='last'></p>
          </div> 
          <div class="input-group">
            <label>Phone</label>
            <input type="number" id='phone' name="phone" value="<?php echo $phone;?>"/> 
            <p id='phonemsg'></p> 
          </div>
          <div class="input-group">
            <?php if($edit_state == false): ?>
            <button type="submit" id="submit"  name ="save" class="btn btn-primary btn-sm">save</button>
            <?php else : ?>
            <button type="submit" id="submit"  name='update' class="btn btn-info btn-sm">Update</button>
            <?php endif ?>
         </div>
      </form>
     </div>
    </div>
   </div> 
</body>
 <script src="./assets/js/crudjs.js"></script>
 <script type="text/javascript">
  function Delete(delid)
  {
     if (confirm('are you sure to delete this user'))
     {
       window.location.href='server.php?del='+delid+'';
       return true;
     }
  }
</script>

</html>
