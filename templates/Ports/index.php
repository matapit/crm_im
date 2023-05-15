
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
            <th>interface_name</th>
            <th>nas_ip</th>
            <th>id_client</th>
            <th>ip_address</th>
            <th>start_pool</th>
            <th>end_pool</th>
            <th>configure</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>


        <?php foreach ($ports as $port ): ?>
        <tr class="odd gradeX">
            <td><?= $port->id?></td>
            <td><?= $port->interface_name?></td>
            <td><?= $port->nas_ip?></td>
            <td><?= $port->id_client?></td>
            <td><?= $port->ip_address?></td>
            <td><?= $port->start_pool?></td>
            <td><?= $port->end_pool?></td>
            <td><a class="btn btn-primary" href="/crm-im/ports/control/<?=$port->id?>" role="button">configure</a></td>
            <td><?= $this->Html->link('Edit', ['action' => 'edit', $port->id]) ?></td>


        </tr>
        <?php endforeach; ?>

        </tbody>
        <tfoot>
        <tr>
            <th>id </th>
            <th>interface_name</th>
            <th>nas_ip</th>
            <th>id_client</th>
            <th>ip_address</th>
            <th>start_pool</th>
            <th>end_pool</th>
            <th>configure</th>
            <th>edit</th>        </tr>
        </tfoot>
    </table>
</div>
<?php
