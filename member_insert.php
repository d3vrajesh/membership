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
        <form name="frm" action="#" method="post" enctype="multipart/form-data">
            <!--            <tr>
                <td>S.No </td>
                <td input type="hidden" name="s_no"> </td>>
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
                        <option value="Institute">Institute</option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Application Status </td>
                <td><select name="mem_status">
                        <option value="Approved">Approved</option>
                        <option value="Pending">Pending</option>
                    </select>
                </td>
            <tr>
            <tr>
                <td>Name </td>
                <td> <input type="text" name="mem_name"> </td>
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
                <td>Type of Institute </td>
                <td> <input type="text" name="mem_type_ins"> </td>
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
                        <option value="Aadhar Card">Aadhar Card</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Voters ID">Voters ID</option>
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
                        <option value="Done">Done</option>
                        <option value="Pending">Pending</option>
                    </select></td>
            <tr>
            <tr>
                <td>Payment Type </td>
                <td><select name="payment_mode">
                        <option value="Google Pay">Google Pay</option>
                        <option value="Bank Transfer">Bank</option>
                    </select></td>
            <tr>
            <tr>
                <td>Transaction ID </td>
                <td> <input type="text" name="mem_transaction_id"> </td>
            <tr>
            <tr>
                <td>Photo (File name should not contain space)</td>
                <td> <input type="file" accept="image/png, image/jpeg, image/jpg" name="mem_photo"> </td>
            <tr>
            <tr>
                <td>Place </td>
                <td> <input type="text" name="mem_place"> </td>
            <tr>
            <tr>
                <td>Date </td>
                <td> <input type="date" name="mem_date"> </td>
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
//      $s_no=$_POST['s_no'];
        $m_id=$_POST['mem_id'];
        $membership_type=$_POST['mem_type'];
        $app_status=$_POST['mem_status'];
        $applicant_name=$_POST['mem_name'];
        $dob=$_POST['mem_dob'];
        $contact_address=$_POST['mem_address'];
        $tel_res=$_POST['mem_tel_res'];
        $tel_off=$_POST['mem_tel_off'];
        $mob=$_POST['mem_mobile'];
        $email=$_POST['mem_email'];
        $profession=$_POST['mem_profession'];
        $name_ins=$_POST['mem_name_ins'];
        $type_institution = $_POST['mem_type_ins'];
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
        //$upload=$_POST['mem_photo'];
        $place=$_POST['mem_place'];
        $app_date=$_POST['mem_date']; 
         
        //------------Upload file to directory
        if ( ! function_exists( 'wp_handle_upload' ) ) 
          require_once( ABSPATH . 'wp-admin/includes/file.php' );
          $uploadedfile = $_FILES['mem_photo']; 
          $newfilename = wp_unique_filename( $path_being_saved_to, $filename_to_check );     
         $upload_overrides = array( 'test_form' => false);
          $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
          if ( $movefile ) {
              var_dump( $movefile );
          }
          // -----------------Uploaed file Url --------------------
          $target_dir_array = wp_upload_dir();
          $target_dir = $target_dir_array[url];
          $target_file = $target_dir . basename($_FILES['mem_photo']['name']);
          $uploadedfileurl= $target_dir . "/" .basename($_FILES['mem_photo']['name']);
          // -----------------Inserting Data to the databse --------------------
        $nnhs_table_name = $wpdb->prefix . 'members_list';
        $wpdb->insert(
            $nnhs_table_name,
            array(
                'm_id' => $m_id,
                'membership_type' => $membership_type,
                'app_status' => $app_status,
                'applicant_name' => $applicant_name,
                'dob' => $dob,
                'contact_address' => $contact_address,
                'tel_res' => $tel_res,
                'tel_off' => $tel_off,
                'mob' => $mob,
                'email' => $email,
                'profession' => $profession,
                'name_ins' => $name_ins,
                'type_institution' => $type_institution,
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
                'upload' => $uploadedfileurl,
                'place' => $place,
                'app_date' => $app_date)
        );
         ?>
<meta http-equiv="refresh" content="1; url=http://localhost/nnhs/wp-admin/admin.php?page=Members_Listing" />
<?php
        exit;
    }
}
?>