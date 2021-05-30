<?php
function member_update(){
//Updating form data in the database    
    $i=$_GET['s_no'];
    global $wpdb;
    $nnhs_table_name = $wpdb->prefix . 'members_list';
    $membethership = $wpdb->get_results("SELECT s_no, m_id, membership_type, app_status, applicant_name, dob, contact_address, tel_res, tel_off, 
    mob, email, profession, name_ins, place_ins, designation, interest, ref_name, ref_detail, id_proof_type, 
    id_proof_no, amount, pay_status, transaction_type, transaction_id, upload, place, app_date from $table_name where s_no=$i");
    echo $member[0]->s_no;
    ?>

<!---- Form to edit the Row in the databse----->
<table>
    <thead>
        <tr>
            <th>Update Member Details</th>

        </tr>
    </thead>
    <tbody>
        <form name="frm" action="#" method="post">
            <tr>
                <td>S.No </td>
                <td><input type="hidden" name="s_no" value="<?= $member[0]->s_no; ?>"> </td>

            <tr>

            <tr>
                <td>Membership ID </td>
                <td> <input type="text" name="mem_id" value="<?= $member[0]->s_no; ?>"> </td>
            <tr>
            <tr>
                <td>Membership Type </td>
                <td><select name="mem_type">
                        <option value="Individual" <?php if($member[0]->role=="Individual"){echo "selected";} ?>>
                            Individual</option>
                        <option value="Institute" <?php if($member[0]->role=="Institute"){echo "selected";} ?>>Institute
                        </option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Application Status </td>
                <td><select name="mem_status">
                        <option value="Approved" <?php if($member[0]->role=="Approved"){echo "selected";} ?>>Approved
                        </option>
                        <option value="Pending" <?php if($member[0]->role=="Pending"){echo "selected";} ?>>Pending
                        </option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Name </td>
                <td> <input type="date" name="mem_name" value="<?= $member[0]->applicant_name; ?>"> </td>
            <tr>
            <tr>
                <td>Date of Birth </td>
                <td> <input type="date" name="mem_dob" value="<?= $member[0]->dob; ?>"> </td>
            <tr>
            <tr>
                <td>Address </td>
                <td> <input type="text" name="mem_address" value="<?= $member[0]->contact_address; ?>"> </td>
            <tr>
            <tr>
                <td>Telephone-Residential </td>
                <td> <input type="tel" name="mem_tel_res" value="<?= $member[0]->tel_res; ?>"> </td>
            <tr>
            <tr>
                <td>Telephone-Office </td>
                <td> <input type="tel" name="mem_tel_off" value="<?= $member[0]->tel_off; ?>"> </td>
            <tr>
            <tr>
                <td>Mobile </td>
                <td> <input type="tel" name="mem_mobile" value="<?= $member[0]->mob; ?>"> </td>
            <tr>
            <tr>
                <td>E-mail </td>
                <td> <input type="text" name="mem_email" value="<?= $member[0]->email; ?>"> </td>
            <tr>
            <tr>
                <td>Profession </td>
                <td> <input type="text" name="mem_profession" value="<?= $member[0]->profession; ?>"> </td>
            <tr>
            <tr>
                <td>Name of Institute </td>
                <td> <input type="text" name="mem_name_ins" value="<?= $member[0]->name_ins; ?>"> </td>
            <tr>
            <tr>
                <td>Place of Institute </td>
                <td> <input type="text" name="mem_place_ins" value="<?= $member[0]->place_ins; ?>"> </td>
            <tr>
            <tr>
                <td>Designation </td>
                <td> <input type="text" name="mem_designation" value="<?= $member[0]->designation; ?>"> </td>
            <tr>
            <tr>
                <td>Interest </td>
                <td> <input type="text" name="mem_interest" value="<?= $member[0]->interest; ?>"> </td>
            <tr>
            <tr>
                <td>Reference Name </td>
                <td> <input type="text" name="mem_ref_name" value="<?= $member[0]->ref_name; ?>"> </td>
            <tr>
            <tr>
                <td>Reference Contact </td>
                <td> <input type="text" name="mem_ref_detail" value="<?= $member[0]->ref_detail; ?>"> </td>
            <tr>
            <tr>
                <td>ID proof ype </td>
                <td><select name="mem_id_type">
                        <option value="Aadhar Card" <?php if($member[0]->role=="Aadhar Card"){echo "selected";} ?>>
                            Aadhar Card</option>
                        <option value="Driving License"
                            <?php if($member[0]->role=="Driving License"){echo "selected";} ?>>Driving License</option>
                        <option value="Voters ID" <?php if($member[0]->role=="Voters ID"){echo "selected";} ?>>Voters ID
                        </option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Id proof no </td>
                <td> <input type="text" name="mem_id_no" value="<?= $member[0]->id_proof_no; ?>"> </td>
            <tr>
            <tr>
                <td>Amount </td>
                <td><select name="mem_amount">
                        <option value="2000" <?php if($member[0]->role=="2000"){echo "selected";} ?>>2,000/-</option>
                        <option value="10000" <?php if($member[0]->role=="10000"){echo "selected";} ?>>10,000/-</option>
                    </select></td>
            <tr>
            <tr>
                <td>Payment Status </td>
                <td><select name="mem_payment_status">
                        <option value="Done" <?php if($member[0]->role=="Done"){echo "selected";} ?>>Done</option>
                        <option value="Pending" <?php if($member[0]->role=="Pending"){echo "selected";} ?>>Pending
                        </option>
                    </select></td>
            <tr>
            <tr>
                <td>Payment Type </td>
                <td><select name="payment_mode">
                        <option value="Google Pay" <?php if($member[0]->role=="Google Pay"){echo "Google Pay";} ?>>
                            Google Pay</option>
                        <option value="Bank Transfer"
                            <?php if($member[0]->role=="Bank Transfer"){echo "Bank Transfer";} ?>>Bank Transfer</option>
                    </select></td>
            <tr>
            <tr>
                <td>Transaction ID </td>
                <td> <input type="text" name="mem_transaction_id" value="<?= $member[0]->transaction_id; ?>"> </td>
            <tr>
            <tr>
                <td>Photo </td>
                <td> <input type="file" accept="image/png, image/jpeg, image/jpg" name="mem_photo"
                        value="<?= $member[0]->upload; ?>"> </td>
            <tr>
            <tr>
                <td>Place </td>
                <td> <input type="text" name="mem_place" value="<?= $member[0]->place; ?>"> </td>
            <tr>
            <tr>
                <td>Date </td>
                <td> <input type="text" name="mem_date" value="<?= $member[0]->app_date; ?>"> </td>
            <tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Insert" name="ins"></td>
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
            $m_id=$_POST['mem_id'];
            $membership_type=$_POST['mem_type'];
            $app_status=$_POST['mem_status'];
            $applicant_name=$_POST['mem_name'];
            $dob=$_POST['mem_dob'];
            $contct_address=$_POST['mem_address'];
            $tel_res=$_POST['mem_tel_res'];
            $tel_off=$_POST['mem_tel_off'];
            $mob=$_POST['mem_mobile'];
            $email=$_POST['mem_email'];
            $profession=$_POST['mem_profession'];
            $name_ins=$_POST['mem_name_ins'];
            $place_ins=$_POST['mem_place_ins'];
            $designation=$_POST['mem_designation'];
            $interest=$_POST['mem_interest'];
            $ref_name=$_POST['mem_ref_name'];
            $ref_detail=$_POST['mem_ref_detail'];
            $id_proof_type=$_POST['mem_id_type'];
            $id_proof_no=$_POST['mem_id_no'];
            $amount=$_POST['mem_amount'];
            $pay_status=$_POST['mem_payment_status'];
            $transaction_type=$_POST['payment_mode'];
            $transaction_id=$_POST['mem_transaction_id'];
            $upload=$_POST['mem_photo'];
            $place=$_POST['mem_place'];
            $app_date=$_POST['mem_date'];

    $wpdb->update(
        $nnhs_table_name,
        array(
            'm_id' => $m_id,
            'membership_type' => $membership_type,
            'app_status' => $app_status,
            'applicant_name' => $applicant_name,
            'dob' => $dob,
            'contact_address' => $contct_address,
            'tel_res' => $tel_res,
            'tel_off' => $tel_off,
            'mob' => $mob,
            'email' => $email,
            'profession' => $profession,
            'name_ins' => $name_ins,
            'place_ins' => $place_ins,
            'designation' => $designation,
            'interest' => $interest,
            'ref_name' => $ref_name,
            'ref_detail' => $ref_detail,
            'id_proof_type' => $id_proof_type,
            'id_proof_no' => $id_proof_no,
            'amount' => $amount,
            'pay_status' => $pay_status,
            'transaction_type' => $transaction_type,
            'transaction_id' => $transaction_id,
            'upload' => $upload,
            'place' => $place,
            'app_date' => $app_date            
        ),
        array(
            's_no'=>$s_no
        )
    );
     
    $url=admin_url('admin.php?page=Members_Listing');
      
     ?>
<meta http-equiv="refresh" content="1; url=http://localhost/nnhs/wp-admin/admin.php?page=Members_Listing" />
<?php
    exit;
    
     
}
?>