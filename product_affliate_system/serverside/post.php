<?php

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {

    session_start();
}

include "crud.php";
include "functions.php";
//connect to database
$db = new Database();
$db->connect();
//create functions object
$Functions = new Functions();

$func = $_POST['func'];


//Add category
if ($func == 1) {
    $category_name = htmlspecialchars(stripslashes($_POST['category_name']));
    $category_name = $db->escapeString($category_name);
    
    $sql = "insert into categories (name) values ('$category_name')";
    if ($db->sql($sql)) {
        echo "true";
    } else {
        echo "false";
    }

}// add category


//add product
else if($func == 2){

    $main_category = htmlspecialchars(stripslashes($_POST['main_category']));
    $main_category = $db->escapeString($main_category);

    $sub_category = htmlspecialchars(stripslashes($_POST['sub_category']));
    $sub_category = $db->escapeString($sub_category);

    $title = htmlspecialchars(stripslashes($_POST['title']));
    $title = $db->escapeString($title);

    $price = htmlspecialchars(stripslashes($_POST['price']));
    $price = $db->escapeString($price);

    $description = htmlspecialchars(stripslashes($_POST['description']));
    $description = $db->escapeString($description);

    $link = htmlspecialchars(stripslashes($_POST['link']));
    $link = $db->escapeString($link);

    $rating = htmlspecialchars(stripslashes($_POST['rating']));
    $rating = $db->escapeString($rating);

    $condition = htmlspecialchars(stripslashes($_POST['condition']));
    $condition = $db->escapeString($condition);

        
    $sql="insert into products (`title`,`price`,`main_category`,`sub_category`,`link`,`rating`,`condition`,`description`) values 
    ('$title','$price','$main_category','$sub_category','$link','$rating','$condition','$description')";
    if ($db->sql($sql)) {
        $insert_id=$db->insert_id(); 

        $Functions->addImages($insert_id,"product_image",'../uploads/','product_image');
        echo "true";

    } else {
        echo "false";
    }

}//add product

//delete product
else if ($func == 3) {

    $product_id = htmlspecialchars(stripslashes($_POST['product_id']));
    $product_id = $db->escapeString($product_id);

    $sql="delete from products where id='$product_id'";
    if ($db->sql($sql)) {
        $sql="delete from product_image where product_id='$product_id'";
        $db->sql($sql);
        echo "true";
    } else {

        echo "false";
    }

} //add category


//update product
else if($func == 4){

    $main_category = htmlspecialchars(stripslashes($_POST['main_category']));
    $main_category = $db->escapeString($main_category);

    $sub_category = htmlspecialchars(stripslashes($_POST['sub_category']));
    $sub_category = $db->escapeString($sub_category);

    $product_id = htmlspecialchars(stripslashes($_POST['product_id']));
    $product_id = $db->escapeString($product_id);

    $title = htmlspecialchars(stripslashes($_POST['title']));
    $title = $db->escapeString($title);

    $price = htmlspecialchars(stripslashes($_POST['price']));
    $price = $db->escapeString($price);

    $description = htmlspecialchars(stripslashes($_POST['description']));
    $description = $db->escapeString($description);

    $link = htmlspecialchars(stripslashes($_POST['link']));
    $link = $db->escapeString($link);

    $rating = htmlspecialchars(stripslashes($_POST['rating']));
    $rating = $db->escapeString($rating);

    $condition = htmlspecialchars(stripslashes($_POST['condition']));
    $condition = $db->escapeString($condition);    


    $sql="update products set 
    `title`='$title',`price`='$price',`rating`='$rating',`condition`='$condition',
    `main_category`='$main_category',`sub_category`='$sub_category',`link`='$link',`description`='$description'
    where `id`='$product_id'";

    if ($db->sql($sql)) {
       
        if(!empty($_FILES["product_image"])){
            $res=$Functions->addImages($product_id,"product_image",'../uploads/','product_image');

        }
        
        echo "true";

    } else {
        echo "false";
    }

}//update product

//delete images
else if($func==5){

    $image_id = htmlspecialchars(stripslashes($_POST['image_id']));
    $image_id = $db->escapeString($image_id);
    
    $sql = "delete from product_image where id='$image_id'";

    if ($db->sql($sql)) {
        echo "true";
    } else {

        echo "false";
    }
}//delete images


//login user
else if ($func == 6) {

    $email = htmlspecialchars(stripslashes($_POST['email']));
    $email = $db->escapeString($email);

    $password = htmlspecialchars(stripslashes($_POST['password']));
    $password = $db->escapeString($password);
    
    $hashpass = md5($password);
    $sql = "SELECT * FROM admin WHERE email='$email' and password='$hashpass'";
    if ($db->sql($sql)) {

        $result = $db->getResult();
        if (!empty($result)) {

            if (strcmp($result[0]["email"], $email) == 0) {


             foreach ($result as $row) {
                $_SESSION['user_id'] = $row["id"];
                    // $_SESSION['user_type']=$row['user_type'];
                echo "true"; 
                
            }

        } else {
            echo "false";
        }
    }else{
        echo 'false';
    } 
} 


}//func6
//Contact message
else if($func==7){

    $name = htmlspecialchars(stripslashes($_POST['name']));
    $name = $db->escapeString($name);

    $message = htmlspecialchars(stripslashes($_POST['message']));
    $message = $db->escapeString($message);

    $email = htmlspecialchars(stripslashes($_POST['email']));
    $email = $db->escapeString($email);

    $sql="insert into contacts (name,email,message) values ('$name','$email','$message')";

    if ($db->sql($sql)) {
        echo "true";
    } else {

        echo "false";
    }
}//7

//Edit Category
else if($func==8){

    $category_name = htmlspecialchars(stripslashes($_POST['category_name']));
    $category_name = $db->escapeString($category_name);

    $category_id = htmlspecialchars(stripslashes($_POST['category_id']));
    $category_id = $db->escapeString($category_id);

    $sql="update categories set name='$category_name' where id='$category_id' ";

    if ($db->sql($sql)) {
        echo "true";
    } else {

        echo "false";
    }
}//8
else if($func==9){

    $category_id = htmlspecialchars(stripslashes($_POST['category_id']));
    $category_id = $db->escapeString($category_id);

    $sql="delete from categories where id='$category_id' ";

    if ($db->sql($sql)) {
        
        //delete the sub category also of this category
         $sql="delete from sub_categories where main_category='$category_id' ";
         $db->sql($sql);

        //delete the products also of this category
         $sql="delete from products where  main_category='$category_id' ";
         $db->sql($sql);
        
        echo "true";
    } else {

        echo "false";
    }
}//9

else if($func==10){

    $product_id = htmlspecialchars(stripslashes($_POST['product_id']));
    $product_id = $db->escapeString($product_id);

    $sql="select * from products where id='$product_id' ";

    if ($db->sql($sql)) { 
        echo json_encode($db->getResult());
    } else {

        echo "false";
    }
}//10

//get product image
else if($func==11){

    $product_id = htmlspecialchars(stripslashes($_POST['product_id']));
    $product_id = $db->escapeString($product_id);

    $sql="select * from product_image where product_id='$product_id' ";

    if ($db->sql($sql)) { 
        // echo $db->getSql();
        echo json_encode($db->getResult());
    } else {

        echo "false";
    }
}//11
//delete message
else if($func==12){

    $message_id = htmlspecialchars(stripslashes($_POST['message_id']));
    $message_id = $db->escapeString($message_id);

    $sql="delete from contacts where id='$message_id' ";

    if ($db->sql($sql)) { 
       echo "true";
    } else {

        echo "false";
    }
}//12

//Add sub category
if ($func == 13) {
    $sub_category = htmlspecialchars(stripslashes($_POST['sub_category']));
    $sub_category = $db->escapeString($sub_category);

    $main_category = htmlspecialchars(stripslashes($_POST['main_category']));
    $main_category = $db->escapeString($main_category);
    
    $sql = "insert into sub_categories (name,main_category) values ('$sub_category','$main_category')";
    if ($db->sql($sql)) {
        echo "true";
    } else {
        echo "false";
    }

}// Add  sub category

//edit sub category
if ($func == 14) {
    $sub_category = htmlspecialchars(stripslashes($_POST['sub_category']));
    $sub_category = $db->escapeString($sub_category);

    $main_category = htmlspecialchars(stripslashes($_POST['main_category']));
    $main_category = $db->escapeString($main_category);

    $sub_category_id = htmlspecialchars(stripslashes($_POST['sub_category_id']));
    $sub_category_id = $db->escapeString($sub_category_id);

    $sql = "update sub_categories set name='$sub_category', main_category='$main_category' where id='$sub_category_id'";
    if ($db->sql($sql)) {
        echo "true";
    } else {
        echo "false";
    }

}//edit sub category

//delete sub category
else if($func==15){

    $category_id = htmlspecialchars(stripslashes($_POST['category_id']));
    $category_id = $db->escapeString($category_id);

    $sql="delete from sub_categories where id='$category_id' ";

    if ($db->sql($sql)) { 
    $sql="delete from products where sub_category='$category_id'";
    $db->sql($sql);

       echo "true";
    } else {

        echo "false";
    }
}//15

//get  sub category
else if($func==16){

    $main_category = htmlspecialchars(stripslashes($_POST['main_category']));
    $main_category = $db->escapeString($main_category);

    $sql="select * from sub_categories where main_category='$main_category'";

    if ($db->sql($sql)) { 
   
    echo json_encode($db->getResult());
     
    } else {

        echo "false";
    }
}

    


?>