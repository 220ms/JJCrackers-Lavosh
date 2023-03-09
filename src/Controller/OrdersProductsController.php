<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\OrdersTable;
use Cake\ORM\Locator\LocatorAwareTrait;
/**
 * OrdersProducts Controller
 *
 * @property \App\Model\Table\OrdersProductsTable $OrdersProducts
 * @method \App\Model\Entity\OrdersProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user_id = $this->getRequest()->getSession()->read('Auth.User.id');
        
        $order_id = $this->getTableLocator()->get('Orders')->find('all')->where(['user_id'=>$user_id])->first()->id;
    
        $productsTable = $this->getTableLocator()->get('Products');
        $theProducts = $productsTable->find('all');
        
        $opTable = $this->fetchTable('OrdersProducts');
        $theOrderProducts = $opTable->find('all');
        debug($theOrderProducts);
        
    

        $this->set(compact('theOrderProducts'));
        $this->set(compact('theProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersProduct = $this->OrdersProducts->get($id, [
            'contain' => ['Products', 'Orders'],
        ]);

        $this->set(compact('ordersProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersProduct = $this->OrdersProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $ordersProduct = $this->OrdersProducts->patchEntity($ordersProduct, $this->request->getData());
            if ($this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->success(__('The orders product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders product could not be saved. Please, try again.'));
        }
        $products = $this->OrdersProducts->Products->find('list', ['limit' => 200])->all();
        $orders = $this->OrdersProducts->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('ordersProduct', 'products', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersProduct = $this->OrdersProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersProduct = $this->OrdersProducts->patchEntity($ordersProduct, $this->request->getData());
            if ($this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->success(__('The orders product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders product could not be saved. Please, try again.'));
        }
        $products = $this->OrdersProducts->Products->find('list', ['limit' => 200])->all();
        $orders = $this->OrdersProducts->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('ordersProduct', 'products', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersProduct = $this->OrdersProducts->get($id);
        if ($this->OrdersProducts->delete($ordersProduct)) {
            $this->Flash->success(__('The orders product has been deleted.'));
        } else {
            $this->Flash->error(__('The orders product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
