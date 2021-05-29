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
            <!--            <tr>
                <td>S.No </td>
                <td input type="text" name="s_no"> </td>>
            <tr>
-->
            <tr>
                <td>Membership ID </td>
                <td> <input type="text" name="mem_id"> </td>
            <tr>
            <tr>
                <td>Membership Type </td>
                <td><select name="mem_type">
                        <option value="Individual">Individual</option>
                        <option value="Institue">Institute</option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Application Status </td>
                <td><select name="mem_status">
                        <option value="Approved">Developer</option>
                        <option value="Pending">Designer</option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Name </td>
                <td> <input type="date" name="mem_name"> </td>
            <tr>
            <tr>
                <td>Date of Birth </td>
                <td> <input type="date" name="mem_dob"> </td>
            <tr>
            <tr>
                <td>Address </td>
                <td> <input type="text" name="mem_address"> </td>
            <tr>
            <tr>
                <td>Telephone-Residential </td>
                <td> <input type="tel" name="mem_tel_res"> </td>
            <tr>
            <tr>
                <td>Telephone-Office </td>
                <td> <input type="tel" name="mem_tel_off"> </td>
            <tr>
            <tr>
                <td>Mobile </td>
                <td> <input type="tel" name="mem_mobile"> </td>
            <tr>
            <tr>
                <td>E-mail </td>
                <td> <input type="text" name="mem_email"> </td>
            <tr>
            <tr>
                <td>Profession </td>
                <td> <input type="text" name="mem_profession"> </td>
            <tr>
            <tr>
                <td>Name of Institute </td>
                <td> <input type="text" name="mem_name_ins"> </td>
            <tr>
            <tr>
                <td>Place of Institute </td>
                <td> <input type="text" name="mem_place_ins"> </td>
            <tr>
            <tr>
                <td>Designation </td>
                <td> <input type="text" name="mem_designation"> </td>
            <tr>
            <tr>
                <td>Interest </td>
                <td> <input type="text" name="mem_interest"> </td>
            <tr>
            <tr>
                <td>Reference Name </td>
                <td> <input type="text" name="mem_ref_name"> </td>
            <tr>
            <tr>
                <td>Reference Contact </td>
                <td> <input type="text" name="mem_ref_detail"> </td>
            <tr>
            <tr>
                <td>ID proof ype </td>
                <td><select name="mem_id_type">
                        <option value="aadhar">Aadhar Card</option>
                        <option value="license">Driving License</option>
                        <option value="license">Voters ID</option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Id proof no </td>
                <td> <input type="text" name="mem_id_no"> </td>
            <tr>
            <tr>
                <td>Amount </td>
                <td><select name="mem_amount">
                        <option value="2000">2,000/-</option>
                        <option value="10000">10,000/-</option>
                    </select></td>
            <tr>
            <tr>
                <td>Payment Status </td>
                <td><select name="mem_payment_status">
                        <option value="completed">Completed</option>
                        <option value="pending">Pending</option>
                    </select></td>
            <tr>
            <tr>
                <td>Payment Type </td>
                <td><select name="mem_payment_type">
                        <option value="google_pay">Google Pay</option>
                        <option value="bank">Bank</option>
                    </select></td>
            <tr>
            <tr>
                <td>Transaction ID </td>
                <td> <input type="text" name="mem_transaction_id"> </td>
            <tr>
            <tr>
                <td>Photo </td>
                <td> <input type="file" accept="image/png, image/jpeg, image/jpg" name="mem_photo"> </td>
            <tr>
            <tr>
                <td>Place </td>
                <td> <input type="text" name="mem_place"> </td>
            <tr>
            <tr>
                <td>Date </td>
                <td> <input type="text" name="mem_date"> </td>
            <tr>
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