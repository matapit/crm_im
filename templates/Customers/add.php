

<?php
$elements= [];
$id= [];

foreach ($results as $result):
    array_push($elements,$result['username']);
    array_push($id,$result['id']);
endforeach;

echo $this->Form->create($customer);
// Hard code the user for now.
echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
echo $this->Form->control('first_name', ['class' => 'form-control'] );
echo $this->Form->control('last_name', ['class' => 'form-control'] );
echo $this->Form->control('email', ['class' => 'form-control'] );
echo $this->Form->control('departement', ['class' => 'form-control'] );
echo $this->Form->control('city', ['class' => 'form-control'] );
echo $this->Form->control('phone', ['class' => 'form-control'] );
echo $this->Form->control('address', ['class' => 'form-control'] );
echo $this->Form->control('bill_date', ['class' => 'form-control'] );
echo $this->Form->control('bill_plan', ['class' => 'form-control'] );
echo $this->Form->control('bill_option', ['class' => 'form-control'] );
echo $this->Form->control('bill_statut', ['class' => 'form-control'] );
echo $this->Form->control('account_statut', ['class' => 'form-control'] );

?>
<select name="radcheck_username" multiple="multiple">
    <?php foreach ($results as $result): ?>
    <option value="<?= $result['username']?>"><?=$result['username']?></option>
    <?php endforeach; ?>
</select>
<?php
echo $this->Form->button(__('Save customer'));
echo $this->Form->end();


var_dump($results);
