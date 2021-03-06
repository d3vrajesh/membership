<?php

function members_list() {
    ?>
<style>

.scroll-table {
    display: box;
    overflow-x: auto;
    overflow-y: hidden;
    border: 2px solid green;     
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    height: 650px;
    overflow-y: scroll;
    
}
.membership-title {
    text-align: center;
    font-size: 20pt;
    font-weight: bold;
    padding-top: 40px;
    color: #046f32;
}
.csv-export-button {
    background-color: #555555;
    color: #ffffff;
    padding: 10px;
    font-size: 12pt;
    border: none;
    border-radius: 10px;
}
.csv-export-button:hover {
    background-color: #046f32;
}

table {
    border-collapse: collapse;
    background-color: #ffffff;
   

}

member_update.php table,
td {
    border: 1px solid green;
    padding: 5px;
    text-align: center;

}
th {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
      position: sticky;
  top: 0; /* Don't forget this, required for the stickiness */
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4); 
  background-color: #046f32;
  color: white;
     
}
img {
    width: 70px;
    height: 90px;
    object-fit: cover;
    
}
</style>
<div class="wrap">
<div class="membership-title"> Membership List</div> <br>
<div class="membership-export-button"> <button class="csv-export-button" name="export_csv"> Export CSV</button></div> <br>
    <div class="scroll-table">
    
        <table>
            <thead>
                <tr>
                    <!----Table Heading---->
                    <th>S.No</th>
                    <th>Membership ID</th>
                    <th>Membership Type</th>
                    <th>App Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Tel-Res</th>
                    <th>Tel-Off</th>
                    <th>Mobile</th>
                    <th>E-mail</th>
                    <th>Profession</th>
                    <th>Name of Institute</th>
                    <th>Type of Institute</th>
                    <th>Place of Institute</th>
                    <th>Designation</th>
                    <th>Interest</th>
                    <th>Reference Name</th>
                    <th>Reference Contact</th>
                    <th>ID proof type</th>
                    <th>Id proof no</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Mode of Payment </th>
                    <th>Transaction ID</th>
                    <th>Photo</th>
                    <th>Place</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Displaying the membership data in a table
            global $wpdb;
            $nnhs_table_name = $wpdb->prefix . 'members_list';
            $membership = $wpdb->get_results("SELECT s_no, m_id, membership_type, app_status, applicant_name, dob, contact_address, tel_res, tel_off, 
            mob, email, profession, name_ins, type_institution, place_ins, designation, interest, ref_name, ref_detail, id_proof_type, 
            id_proof_no, amount, pay_status, transaction_type, transaction_id, upload, place, app_date from $nnhs_table_name ORDER BY s_no DESC");
            foreach ($membership as $member) {
                ?>
                <tr>
                    <td><?= $member->s_no; ?></td>
                    <td><?= $member->m_id; ?></td>
                    <td><?= $member->membership_type; ?></td>
                    <td><?= $member->app_status; ?></td>
                    <td><a
                            href="<?php echo admin_url('admin.php?page=Member_Update&s_no=' . $member->s_no); ?>">Update</i></a>
                    </td>
                    <td><a
                            href="<?php echo admin_url('admin.php?page=Member_Delete&s_no=' . $member->s_no); ?>">Delete</a>
                    </td>
                    <td><?= $member->applicant_name; ?></td>
                    <td><?= $member->dob; ?></td>
                    <td><?= $member->contact_address; ?></td>
                    <td><?= $member->tel_res; ?></td>
                    <td><?= $member->tel_off; ?></td>
                    <td><?= $member->mob; ?></td>
                    <td><?= $member->email; ?></td>
                    <td><?= $member->profession; ?></td>
                    <td><?= $member->name_ins; ?></td>
                    <td><?= $member->type_institution; ?></td>
                    <td><?= $member->place_ins; ?></td>
                    <td><?= $member->designation; ?></td>
                    <td><?= $member->interest; ?></td>
                    <td><?= $member->ref_name; ?></td>
                    <td><?= $member->ref_detail; ?></td>
                    <td><?= $member->id_proof_type; ?></td>
                    <td><?= $member->id_proof_no; ?></td>
                    <td><?= $member->amount; ?></td>
                    <td><?= $member->pay_status; ?></td>
                    <td><?= $member->transaction_type; ?></td>
                    <td><?= $member->transaction_id; ?></td>
                    <td><img src="<?= $member->upload; ?>"></td>
                    <td><?= $member->place; ?></td>
                    <td><?= $member->app_date; ?></td>
                </tr>
                <?php } /*
                
                if(isset($_POST["export_csv"]))
                {
                    
                    $nnhs_table_name = $wpdb->prefix . 'members_list';
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Disposition: attachment; filename=membership.csv');
                    $output = fopen("php://output", "w");
                    fputcsv($output, array('s_no', 'm_id', 'membership_type', 'app_status', 'applicant_name', 'dob', 'contact_address', 'tel_res', 'tel_off', 'mob', 'email', 'profession', 'name_ins', 'type_institution', 'place_ins', 'designation', 'interest', 'ref_name', 'ref_detail', 'id_proof_type', 'id_proof_no', 'amount', 'pay_status', 'transaction_type', 'transaction_id', 'upload', 'place', 'app_date'));
                    $query = "SELECT * from $nnhs_table_name ORDER BY id DESC");
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        fputcsv($output, $row);
                    }
                    fclose($output);
                    }

                    $folder = 
                }
                */
                ?> 
            </tbody>
        </table>
    </div>
</div>
<?php

}
add_shortcode('short_members_list', 'members_list');
?>