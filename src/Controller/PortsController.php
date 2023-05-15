<?php


namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class PortsController extends AppController
{
    public function index()
    {
        $port = $this->getTableLocator()->get('Ports');
        $ports = $port->find()->all();
        $this->set(compact('ports'));
    }


    public function add()
    {

        $customer = $this->getTableLocator()->get('Customers');
        $customers = $customer->find()->all();
        $this->set(compact('customers'));


        $connection = ConnectionManager::get('default');
        $results = $connection
            ->execute('SELECT * FROM `nas`')
            ->fetchAll('assoc');
        $this->set(compact('results'));



        $port = $this->Ports->newEmptyEntity();
        if ($this->request->is('post')) {
            $port = $this->Ports->patchEntity($port, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.

            if ($this->Ports->save($port)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('port', $port);
    }
    public function control($id){

        $port = $this->Ports
            ->findById($id)
            ->firstOrFail();
        $config ="
        en \n
        conf t \n
        ip local pool PPPoEPOOL $port-> 10.0.0.10 \n
interface virtual-template $port->id \n
ip address $port->id $port->subnet_mask \n
 mtu 1492 \n
 peer default ip address pool PPPoEPOOL \n
 ppp authentication chap callin \n
exit \n


bba-group pppoe global \n
virtual-template $port->id \n
exit
interface $port->interface_name \n
pppoe enable group global  \n
pppoe \n
exit
        ";
        $connextion = ssh2_connect('192.0.0.2', 22);
        var_dump($connextion);
        $this->set(compact('config'));

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
