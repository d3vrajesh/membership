<?php
function member_update(){
//Updating form data in the database    
    $i=$_GET['id'];
    global $wpdb;
    $nnhs_table_name = $wpdb->prefix . 'members_list';
    $membethership = $wpdb->get_results("SELECT id,name,address,contact,role from $table_name where id=$i");
    echo $member[0]->id;
    ?>

<!---- Form to edit the Row in the databse----->
<table>
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="id" value="<?= $member[0]->s_no; ?>">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="nm" value="<?= $member[0]->name; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="adrs" value="<?= $member[0]->address; ?>"></td>
            </tr>
            <tr>
                <td>Desigination:</td>
                <td><select name="des">
                        <option value="developer" <?php if($member[0]->role=="developer"){echo "selected";} ?>>Developer
                        </option>
                        <option value="designer" <?php if($member[0]->role=="designer"){echo "selected";} ?>>Designer
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mob no:</td>
                <td><input type="number" name="mob" value="<?= $member[0]->contact; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
                <br>

            </tr>
        </form>
    </tbody>
</table>
<?php
}
if(isset($_POST['upd']))
{
    global $wpdb;
    $nnhs_table_name=$wpdb->prefix.'employee_list';
    $id=$_POST['id'];
    $nm=$_POST['nm'];
    $ad=$_POST['adrs'];
    $d=$_POST['des'];
    $m=$_POST['mob'];
    $wpdb->update(
        $nnhs_table_name,
        array(
            'name'=>$nm,
            'address'=>$ad,
            'role'=>$d,
            'contact'=>$m
        ),
        array(
            's_no'=>$id
        )
    );
     
    $url=admin_url('admin.php?page=Members_Listing');
      
     ?>
<meta http-equiv="refresh" content="1; url=http://localhost/nnhs/wp-admin/admin.php?page=Members_Listing" />
<?php
    exit;
    
     
}
?>