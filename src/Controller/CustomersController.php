<?php


namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\Log\Log;

class CustomersController extends AppController
{
    public function index()
    {
        $customer = $this->getTableLocator()->get('Customers');
        $customers = $customer->find()->all();
        $this->set(compact('customers'));
    }


    public function add()
    {
        $connection = ConnectionManager::get('default');
        $results = $connection
            ->execute('SELECT * FROM `radcheck`')
            ->fetchAll('assoc');
        $this->set(compact('results'));
        $customer = $this->Customers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            $customer->last_bill=date("Y-m").'-'.$customer->bill_date;
            $customer->account_statut='ok';
            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.

            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('customer', $customer);
    }
    public function control(){



        $customer = $this->getTableLocator()->get('Customers');
        $customers = $customer->find()->all();
        foreach ($customers as $c):
        $days= $c->last_bill;
        //var_dump($c->bill_statut);
            $origin = date_create($c->last_bill);
            $target = $date = date_create(date("Y-m-d"));
            //$target = date_create("2021-5-30");
            $diff = $target->diff($origin);
            //print_r( $diff->days ) ;
            $d = $diff->days;
            $mont =(int)($diff->days/30);
            //print_r($mont);
            if ($mont >= 1){

                $c->bill_statut += $mont;
                //echo $c->bill_statut;
                $date = date_create($c->last_bill);
                $date->modify('+'.$mont.' month'); // or you can use '-90 day' for deduct
                echo $date->format('Y-m-d');
                $c->last_bill = $date->format('Y-m-d');
                //echo $date;
                if ($c->bill_statut >=3 and $c->bill_option != "vip"){
                    $c->account_statut = 'disable';
                    $connection = ConnectionManager::get('default');

                    $results = $connection
                        ->execute('SELECT * FROM `radusergroup` WHERE username  = :username ', ['username' => $c->radcheck_username])
                        ->fetchAll('assoc');
                    //echo sizeof($results);
                    var_dump(sizeof($results) );
                    if (sizeof($results) == 0){

                        $connection->insert('radusergroup', [
                            'username' => $c->radcheck_username,
                            'groupname' => 'daloRADIUS-Disabled-Users',
                            'priority' => '0'
                        ]);
                    }


                }
                $this->Customers->save($c);
            }

        endforeach;
    }
public function edit($id){
        //echo $id;

    $connection = ConnectionManager::get('default');
    $results = $connection
        ->execute('SELECT * FROM `radcheck`')
        ->fetchAll('assoc');

    $customer = $this->Customers
        ->findById($id)
        ->firstOrFail();
    $this->set(compact('results'));


    if ($this->request->is(['post', 'put'])) {
        $this->Customers->patchEntity($customer, $this->request->getData());
        if ($this->Customers->save($customer)) {
            $this->Flash->success(__('Your article has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your article.'));
    }

    $this->set('customer', $customer);

}
}
