<?php
session_start();
?>

<?php
    $item_name_loc=$_POST['item_name_box'];
    $dbc = mysqli_connect('localhost','root','root','food');
   
    if(mysqli_connect_errno())
    { 
       echo "not connected:" . mysqli_connect_errno();
    }
	$id="";
   
    $query_id="SELECT item_id FROM food_item where item_name = Rtrim(Ltrim('$item_name_loc'))"; 
	$get_id= mysqli_query($dbc,$query_id);
	
    if(mysqli_num_rows($get_id)){
	        while($r = mysqli_fetch_assoc($get_id))
			{
                $id=$r["item_id"];
			}
        }       
	$query_delete="UPDATE food_item SET status='d' where item_id=$id";
	$search = mysqli_query($dbc,$query_delete);
	echo "<script>
          alert('$item_name_loc successfully deleted');
          window.location.href='all_items.php#portfolio';
          </script>";
	
?>