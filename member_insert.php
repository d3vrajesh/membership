<?php

function member_insert()
{
 // creating form to add new member data   
    ?>
<table>
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <form name="frm" action="#" method="post">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="nm"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="adrs"></td>
            </tr>
            <tr>
                <td>Desigination:</td>
                <td><select name="des">
                        <option value="developer">Developer</option>
                        <option value="designer">Designer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mob no:</td>
                <td><input type="number" name="mob"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Insert" name="ins"></td>
            </tr>
        </form>
    </tbody>
</table>

<?php
// Inserting the form data in the databse table  
    if(isset($_POST['ins'])){
        global $wpdb;
        $nm=$_POST['nm'];
        $ad=$_POST['adrs'];
        $d=$_POST['des'];
        $m=$_POST['mob'];
        $nnhs_table_name = $wpdb->prefix . 'members_list';

        $wpdb->insert(
            $nnhs_table_name,
            array(
                'name' => $nm,
                'address' => $ad,
                'role' => $d,
                'contact'=>$m
            )
        );
        echo "inserted";
         ?>

<meta http-equiv="refresh" content="1; url=http://localhost/nnhs/wp-admin/admin.php?page=Members_Listing" />

<?php
        exit;
    }
}

?>