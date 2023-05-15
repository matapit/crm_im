
<div class="module-head">
    <h3>
        DataTables</h3>
</div>
<div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
           width="100%">
        <thead>
        <tr>
            <th>id </th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>departement</th>
            <th>city</th>
            <th>phone</th>
            <th>address</th>
            <th>bill_date</th>
            <th>bill_plan</th>
            <th>last_bill</th>
            <th>bill_option</th>
            <th>bill_statut</th>
            <th>account_statut</th>
            <th>radcheck_username</th>
            <th>edit</th>

        </tr>
        </thead>
        <tbody>


        <?php foreach ($customers as $customer ): ?>
        <tr class="odd gradeX">
            <td><?= $customer->id?></td>
            <td><?= $customer->first_name?></td>
            <td><?= $customer->last_name?></td>
            <td><?= $customer->email?></td>
            <td><?= $customer->departement?></td>
            <td><?= $customer->city?></td>
            <td><?= $customer->phone?></td>
            <td><?= $customer->address?></td>
            <td><?= $customer->bill_date?></td>
            <td><?= $customer->last_bill?></td>
            <td><?= $customer->bill_plan?></td>
            <td><?= $customer->bill_option?></td>
            <td><?= $customer->bill_statut?></td>
            <td><?= $customer->account_statut?></td>
            <td><?= $customer->radcheck_username?></td>
            <td><?= $this->Html->link('Edit', ['action' => 'edit', $customer->id]) ?></td>


        </tr>
        <?php endforeach; ?>

        </tbody>
        <tfoot>
        <tr>
            <th>id </th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>departement</th>
            <th>city</th>
            <th>phone</th>
            <th>address</th>
            <th>bill_date</th>
            <th>last_bill</th>
            <th>bill_plan</th>
            <th>bill_option</th>
            <th>bill_statut</th>
            <th>account_statut</th>
            <th>radcheck_username</th>

        </tr>
        </tfoot>
    </table>
</div>
<?php
