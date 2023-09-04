<?php

require_once 'crud.php';
class Functions
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    function addImages($product_id,$type,$path,$tableName){
        $upload_to = "";
        // $type="";
        $upload_path_for_all_files = "";
        // print_r($type);
        if(!empty($_FILES)){
            foreach($_FILES[$type]["tmp_name"] as $key=>$tmp_name) {
                $file_name=$_FILES[$type]["name"][$key];
                $file_tmp=$_FILES[$type]["tmp_name"][$key];
                
                $timestamp=time();
                $file=$timestamp.'-'.$file_name;
                $upload_to=$path.$file;
                if(move_uploaded_file($file_tmp,$upload_to)){

                    $sql="insert into $tableName (product_id,image_path) values 
                    ('$product_id','$upload_to') ";
                    
                    if($this->db->sql($sql)){
                        // return "false";
                    }else{
                        // return "true";
                    }
                }//if

            }//foreach
        }else{
            return "empty";
        }

    }//addImages

    function getAllMessages(){
     $sql = "select * from contacts";

     if($this->db->sql($sql)){
        return $this->db->getResult();
    }

}
function getAllCategories(){

    $sql = "select * from categories";

    if($this->db->sql($sql)){
        return $this->db->getResult();
    }

}
function getAllSubCategories(){

   $sql = "select * from sub_categories";

   if($this->db->sql($sql)){
    return $this->db->getResult();
}


}
function getSingleSubCategories($id){

    $sql = "select * from sub_categories where id ='$id'";

   if($this->db->sql($sql)){
    return $this->db->getResult();
}

}
function getSingleCategories($id){
    $sql = "select * from categories where id='$id'";
    if($this->db->sql($sql)){
       return $this->db->getResult();
   }

}
function getSingleProduct_images($id){

    $sql = "select * from product_image where product_id='$id'";
    if($this->db->sql($sql)){
        return $this->db->getResult();
    }

}     
function getAllProducts(){
    $sql = "select * from products ORDER BY id DESC";
    if($this->db->sql($sql)){
        return $this->db->getResult();
    }

}

function getProducts($query){

    $sql="select * from products where $query";

    if($this->db->sql($sql)){
        return $this->db->getResult();
    }

}

function getProductImages($id){
    $sql = "select * from product_image where product_id = '$id'";
    if($this->db->sql($sql)){

        return $this->db->getResult();
    }    
}

function getSubCategories($id){

     $sql = "select * from sub_categories where main_category='$id'";
    if($this->db->sql($sql)){
        return $this->db->getResult();
    }    

}


function getProductPrice($id){
    $sql = "select * from compare_price where product_id = '$id'";
    if($this->db->sql($sql)){
        return $this->db->getResult();
    }    
}

function getSingleProduct($id){

    $sql = "select * from products where id = '$id'";
    if($this->db->sql($sql)){
        return $this->db->getResult();
    } 

}




function getProductsById($id){

    $sql = "select * from products  where category_id = '$id'";
    if($this->db->sql($sql)){
        return $this->db->getResult();
    } 

}

}
?>