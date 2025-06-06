<?php include '../connect.php'; ?>
<?php include '../Includes/functions/functions.php'; ?>


<?php
	
	if(isset($_POST['do']) && $_POST['do'] == "Add")
	{
        $category_name = test_input($_POST['category_name']);

        $checkItem = checkItem("category_name","menu_categories",$category_name);

        if($checkItem != 0)
        {
            $data['alert'] = "Warning";
            $data['message'] = "This category name already exists!";
            echo json_encode($data);
            exit();
        }
        elseif($checkItem == 0)
        {
        	//Insert into the database
            $stmt = $con->prepare("insert into menu_categories(category_name) values(?) ");
            $stmt->execute(array($category_name));

            $data['alert'] = "Success";
            $data['message'] = "The new category has been inserted successfully !";
            echo json_encode($data);
            exit();
        }
            
	}

	if(isset($_POST['do']) && $_POST['do'] == "Delete")
	{
		$category_id = $_POST['category_id'];

        // Step 1: Delete from 'menus'
        $stmt1 = $con->prepare("DELETE FROM menus WHERE category_id = ?");
        $stmt1->execute([$category_id]);

        //Step 2: Delete from 'menu_categories'
        $stmt = $con->prepare("DELETE from menu_categories where category_id = ?");
        $stmt->execute(array($category_id));    
	}
	
?>