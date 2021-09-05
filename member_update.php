<?php

$path = preg_replace('/wp-content.*$/','',__DIR__);
require_once($path."wp-load.php");

if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}

function member_update(){


//Updating form data in the database    
    $i=$_GET['s_no'];
    global $wpdb;
    $nnhs_table_name = $wpdb->prefix . 'members_list';
    $membership = $wpdb->get_results("SELECT s_no, m_id, membership_type, app_status, applicant_name, dob, contact_address, tel_res, tel_off, mob, email, profession, name_ins, type_institution, place_ins, designation, interest, ref_name, ref_detail, id_proof_type, id_proof_no, amount, pay_status, transaction_type, transaction_id, upload, place, app_date from $nnhs_table_name where s_no=$i");
    
   $current_member = $membership[0]->s_no;
   echo "<h3> S.No: $current_member</h3>";
    ?>
<style>

img {
    width: 100px;
    height: 130px;
    object-fit: cover;
}
tr, td {
    vertical-align: middle;
    width: 200px;

}
</style>
<!---- Form to edit the Row in the databse----->
<table>
    <thead>
        <tr>
            <th>Update the member details</th>


        </tr>

    </thead>
    <br>
    <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="s_no" value="<?= $membership[0]->s_no; ?>">
            <tr>
                <td>Membership ID </td>
                <td> <input type="text" name="mem_id" value="<?= $membership[0]->m_id; ?>"> </td>
            </tr>
            <tr>
                <td>Membership Type </td>
                <td><select name="mem_type">
                        <option value="Individual"
                            <?php if($membership[0]->membership_type=="Individual"){echo "selected";} ?>>
                            Individual</option>
                        <option value="Institute"
                            <?php if($membership[0]->membership_type=="Institute"){echo "selected";} ?>>Institute
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Application Status </td>
                <td><select name="mem_status">
                        <option value="Approved" <?php if($membership[0]->app_status=="Approved"){echo "selected";} ?>>
                            Approved
                        </option>
                        <option value="Pending" <?php if($membership[0]->app_status=="Pending"){echo "selected";} ?>>Pending
                        </option>
                        <option value="Not Considered" <?php if($membership[0]->app_status=="Not Considered"){echo "selected";} ?>>Pending
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Name </td>
                <td> <input type="text" name="mem_name" value="<?= $membership[0]->applicant_name; ?>"> </td>
            </tr>
            <tr>
                <td>Date of Birth </td>
                <td> <input type="date" name="mem_dob" value="<?= $membership[0]->dob; ?>"> </td>
            </tr>
            <tr>
                <td>Address </td>
                <td> <input type="text" name="mem_address" value="<?= $membership[0]->contact_address; ?>"> </td>
            </tr>
            <tr>
                <td>Telephone-Residential </td>
                <td> <input type="tel" name="mem_tel_res" value="<?= $membership[0]->tel_res; ?>"> </td>
            </tr>
            <tr>
                <td>Telephone-Office </td>
                <td> <input type="tel" name="mem_tel_off" value="<?= $membership[0]->tel_off; ?>"> </td>
            </tr>
            <tr>
                <td>Mobile </td>
                <td> <input type="tel" name="mem_mobile" value="<?= $membership[0]->mob; ?>"> </td>
            </tr>
            <tr>
                <td>E-mail </td>
                <td> <input type="text" name="mem_email" value="<?= $membership[0]->email; ?>"> </td>
            </tr>
            <tr>
                <td>Profession </td>
                <td> <input type="text" name="mem_profession" value="<?= $membership[0]->profession; ?>"> </td>
            </tr>
            <tr>
                <td>Name of Institution </td>
                <td> <input type="text" name="mem_name_ins" value="<?= $membership[0]->name_ins; ?>"> </td>
            </tr>
            <tr>
                <td>Type of Institution </td>
                <td> <input type="text" name="mem_type_ins" value="<?= $membership[0]->type_institution; ?>"> </td>
            </tr>       
            <tr>
                <td>Place of Institution </td>
                <td> <input type="text" name="mem_place_ins" value="<?= $membership[0]->place_ins; ?>"> </td>
            </tr>
            <tr>
                <td>Designation </td>
                <td> <input type="text" name="mem_designation" value="<?= $membership[0]->designation; ?>"> </td>
            </tr>
            <tr>
                <td>Interest </td>
                <td> <input type="text" name="mem_interest" value="<?= $membership[0]->interest; ?>"> </td>
            </tr>
            <tr>
                <td>Reference Name </td>
                <td> <input type="text" name="mem_ref_name" value="<?= $membership[0]->ref_name; ?>"> </td>
            </tr>
            <tr>
                <td>Reference Contact </td>
                <td> <input type="text" name="mem_ref_detail" value="<?= $membership[0]->ref_detail; ?>"> </td>
            </tr>
            <tr>
                <td>ID proof ype </td>
                <td><select name="mem_id_type">
                        <option value="Aadhar Card"
                            <?php if($membership[0]->id_proof_type=="Aadhar Card"){echo "selected";} ?>>
                            Aadhar Card</option>
                        <option value="Driving License"
                            <?php if($membership[0]->id_proof_type=="Driving License"){echo "selected";} ?>>Driving License
                        </option>
                        <option value="Voters ID" <?php if($membership[0]->id_proof_type=="Voters ID"){echo "selected";} ?>>
                            Voters ID
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Id proof no </td>
                <td> <input type="text" name="mem_id_no" value="<?= $membership[0]->id_proof_no; ?>"> </td>
            </tr>
            <tr>
                <td>Amount </td>
                <td><select name="mem_amount">
                        <option value="2000" <?php if($membership[0]->amount=="2000"){echo "selected";} ?>>2,000/-</option>
                        <option value="10000" <?php if($membership[0]->amount=="10000"){echo "selected";} ?>>10,000/-
                        </option>
                    </select></td>
            </tr>
            <tr>
                <td>Payment Status </td>
                <td><select name="mem_payment_status">
                         
                        <option value="Pending" <?php if($membership[0]->pay_status=="Pending"){echo "Pending";} ?>>Pending
                        </option>
                        <option value="Done" <?php if($membership[0]->pay_status=="Done"){echo "Done";} ?>>Done</option>
                    </select></td>
            </tr>
            <tr>
                <td>Payment Type </td>
                <td><select name="payment_mode">
                
                        <option value="-Select-"
                            <?php if($membership[0]->transaction_type=="-Select-"){echo "-Select-";} ?>>
                            -Select-</option>                        
                        <option value="Cheque"
                            <?php if($membership[0]->transaction_type=="Cheque"){echo "Cheque";} ?>>
                            Cheque</option>
                        <option value="Bank Transfer"
                            <?php if($membership[0]->transaction_type=="Bank Transfer"){echo "Bank Transfer";} ?>>Bank
                            Transfer</option>
                    </select></td>
            </tr>
            <tr>
                <td>Transaction ID </td>
                <td> <input type="text" name="mem_transaction_id" value="<?= $membership[0]->transaction_id; ?>"> </td>
            </tr>
            <tr>
                <td>Photo </td>
                <td><img src="<?= $membership[0]->upload; ?>">  
                 <!-- <br><input type="file" accept="image/png, image/jpeg, image/jpg" name="mem_photo"
                        value="<#remove#?= // $membership[0]->upload; ?>"> --></td> 
            </tr>
            <tr>
                <td>Place </td>
                <td> <input type="text" name="mem_place" value="<?= $membership[0]->place; ?>"> </td>
            </tr>
            <tr>
                <td>Date </td>
                <td> <input type="date" name="mem_date" value="<?= $membership[0]->app_date; ?>"> </td>
            </tr>
            <tr>
                <td>Do you want to send an email to the applicant?  </td>
                <td> <input type="checkbox" name="email_accept" value="yes"> </td>
            </tr>   
            <tr>
                <td>Type your Message </td>
                <td> <textarea name="email_message" rows="5" cols="33" maxlength="200"> </textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
            </tr>
        </form>
    </tbody>
</table>
<?php
}

if(isset($_POST['upd']))
{

    global $wpdb;
    $nnhs_table_name = $wpdb->prefix . 'members_list';

           $s_no=$_POST['s_no'];
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

            //------------Email section 
           
            $email_accept = $_POST['email_accept'];
            $email_message = $_POST['email_message'];

                $to = "rajeshr@keystone-foundation.org"; 
			    $subject = "NNHS Membership";
			//	$body = $email_message;
				$message = "hello nnhs";
				$headers = array('Content-Type: text/html; charset=UTF-8', 'From: NNHS <wordpress@nnhs.in>');					 
 				
          $yes = "yes";         
   /* if($email_accept == $yes)
    {
       // wp_mail( $to, $subject, $body, $headers );
       wp_mail( $to, $subject, $message );
    }  
    */
     

    $wpdb->update(
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
            //'upload' => $upload,
            'place' => $place,
            'app_date' => $app_date            
        ),
        array(
            's_no'=> $s_no
        )
    );
    
    
     
    $url=admin_url('admin.php?page=Members_Listing');
      
     ?>
<meta http-equiv="refresh" content="1; url=https://nnhs.in/wp-admin/admin.php?page=Members_Listing" />

<?php
    exit;
    
     
}

?>