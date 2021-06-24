<?php
//Deleting the Row in the databse table;
function member_delete(){
    echo "member delete";
    if(isset($_GET['s_no'])){
        global $wpdb;
        $nnhs_table_name=$wpdb->prefix.'members_list';
        $i=$_GET['s_no'];
        $wpdb->delete(
            $nnhs_table_name,
            array('s_no'=>$i)
        );
    }
    echo get_site_url() .'/wp-admin/admin.php?page=Members_List';
    ?>
<meta http-equiv="refresh" content="0; url=http://localhost/nnhs/wp-admin/admin.php?page=Members_Listing" />
<?php
    
    exit;
     
}
?>