

<?php
$elements= [];
$id= [];


//var_dump($customer->id);
echo $this->Form->create($port);
// Hard code the user for now.
echo $this->Form->control('interface_name', ['class' => 'form-control'] );
?>
<div>
    <label for="client">client</label>
<select name="id_client" multiple="multiple">
    <?php foreach ($customers as $customer): ?>
        <option value="<?= $customer->id?>"><?=$customer->first_name?></option>
    <?php endforeach; ?>
</select>
</div>
<div>
    <label for="nas"></label>
    <select name="nas_ip" multiple="multiple">
    <?php foreach ($results as $result): ?>
        <option value="<?= $result['nasname']?>"><?=$result['shortname']?></option>
    <?php endforeach; ?>
</select>
</div>
<?php
echo $this->Form->control('ip_address', ['class' => 'form-control'] );
echo $this->Form->control('subnet_mask', ['class' => 'form-control'] );
echo $this->Form->control('start_pool', ['class' => 'form-control'] );
echo $this->Form->control('end_pool', ['class' => 'form-control'] );
echo $this->Form->button('Save customer');
echo $this->Form->end();





