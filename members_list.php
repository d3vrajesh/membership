<?php

function members_list() {
    ?>
<style>
scroll-table {
    display: box;
    overflow-x: auto;
    overflow-y: hidden;
    border: 1px solid green;
}

table {
    border-collapse: collapse;


}

member_update.php table,
td,
th {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}
</style>
<div class="wrap">
    <div class="scroll-table">
        <table>
            <thead>
                <tr>
                    <!----Table Heading---->
                    <th>S.No</th>
                    <th>Membership ID</th>
                    <th>App Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Ph-Res</th>
                    <th>Ph-Off</th>
                    <th>Mobile</th>
                    <th>E-mail</th>
                    <th>Profession</th>
                    <th>Name of Institute</th>
                    <th>Place of Institute</th>
                    <th>Designation</th>
                    <th>Interest</th>
                    <th>Referrece Name</th>
                    <th>Reference Contact</th>
                    <th>ID proof type</th>
                    <th>Id proof no</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Payment Type</th>
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
            $membership = $wpdb->get_results("SELECT m_no, app_status, applicant_name, dob, contact_address, tel_res, tel_off, 
            mob, email, profession, name_ins, place_ins, designation, interest, ref_name, ref_detail, id_proof_type, 
            id_proof_no, amount, pay_status, transaction_type, transaction_id, upload, place, app_date from $nnhs_table_name ORDER BY id DESC");
            foreach ($membership as $member) {
                ?>
                <tr>
                    <td><?= $member->s_no; ?></td>
                    <td><?= $member->m_no; ?></td>
                    <td><?= $member->app_status; ?></td>
                    <td><a
                            href="<?php echo admin_url('admin.php?page=Member_Update&s_no=' . $member->s_no); ?>">Update</a>
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
                    <td><?= $member->upload; ?></td>
                    <td><?= $member->place; ?></td>
                    <td><?= $member->app_date; ?></td>
                </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>
</div>
<?php

}
add_shortcode('short_members_list', 'members_list');
?>