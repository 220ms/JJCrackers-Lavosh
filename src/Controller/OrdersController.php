<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\I18n\FrozenTime;
use App\Model\Entity\Order;
use Cake\Event\EventInterface;
use Cake\Routing\Router;

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $orders = $this->paginate($this->Orders);
        $token = $this->request->getAttribute('csrfToken');
        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200])->all();
        $products = $this->Orders->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'users', 'products'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderstable = $this->fetchTable('Orders');

        $query = $orderstable->find()->join([
            'table' => 'orders_products',
            'alias' => 'o',
            'conditions' => 'Orders.id = o.order_id'
        ])->join([
            'table' => 'products',
            'alias' => 'p',
            'conditions' => 'o.product_id = p.id'
        ])->join([
            'table' => 'users',
            'alias' => 'u',
            'conditions' => 'Orders.user_id = u.id'
        ])->select([
            'Orders.cust_name', 'Orders.email', 'Orders.shipping_address', 'Orders.id','p.id','p.name','p.description', 'p.price','o.price', 'o.qty', 'u.first_name', 'u.last_name' , 'u.email','u.street_address','u.post_code','u.state'
        ])->where(['o.order_id' => $id]);

       $this->set('orderitems',$query->all());


        

        $order = $this->Orders->get($id, [
            'contain' => ['Products'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {

                return $this->redirect(['action' => 'index']);
            }
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200])->all();
        $products = $this->Orders->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function adminIndex() {
        $orders = $this->fetchTable('Orders')
            ->find()
            ->select([
                'Orders.cust_name', 'Orders.email', 'Orders.shipping_address', 'Orders.id', 'Orders.price'
            ])
            ->toArray();
        
        $this->set('orders', $orders);
    }


    public function cart()
    {
        $token = $this->request->getAttribute('csrfToken');
        $cart = $this->request->getSession()->read('cart');
        
        // $order_key = $cart['order'];
        // unset($cart['order']);
        if($this->request->getSession()->check('cart')){
            $product_ids = array_keys($cart);
            $products_in_cart = $this->fetchTable('Products')->find()->where(['id IN' => $product_ids]);

            $product_list = $products_in_cart->toArray();
            $total_price = 0;
            foreach($product_list as $product):
                $price = floatval($product['price']);
                $product['purchase_quantity'] = $cart[$product -> id];
                $product_total_price = $price * $product['purchase_quantity'];
                $total_price = $total_price + $product_total_price;
                $product['total_price'] = $product_total_price; 
            endforeach;

            $this->getRequest()->getSession()->write('product-list',$product_list);
            $this->getRequest()->getSession()->write('total-price',$total_price);
        }
        else{
            $product_list = array();
            $total_price = 0;
        }

        $this->set(compact('product_list', 'total_price'));
    }

    public function clear(){
        $session = $this->request->getSession();
        $session->delete('cart');
        return $this->redirect(['controller'=>'products','action' => 'index']);
    }

    // create order and orderproduct
    public function test() {
        // get user id from session
        $auth = $this->request->getSession()->read('Auth');
        $check_user = $auth['User'];
        $user_id = -1;

        $guest = $this->request->getSession()->read('guest');
        $order = new order();

        $cust_name = "";
        $email = "";
        $shipping_address = "";

        if($check_user['id'] == 0 && $guest){
            $first_name = $guest->first_name;
            $last_name = $guest->last_name;
            $user_id = 13;
            $cust_name = $first_name . " " . $last_name;
            $email = $guest->email;
            $shipping_address = $guest->street_address;
        } else {
            $user_id = $check_user['id'];
            $first_name = $check_user['first_name'];
            $last_name = $check_user['last_name'];
            $street_address = $check_user['street_address'];
            $post_code = $check_user['post_code'];
            $state = $check_user['state'];
            $cust_name = $first_name . " " . $last_name;
            $email = $check_user['email'];
            $shipping_address = $street_address . " " . $post_code . " " . $state;
        }
        
        // get product list and total price
        $product_list = $this->getRequest()->getSession()->read('product-list');
        $total_price = $this->getRequest()->getSession()->read('total-price');

        
        $order['user_id'] = $user_id;
        $order['price'] = $total_price;
        $order['products'] = $product_list;
        $order['status'] = 'waiting';

        // debug($order);
        // exit;

        $saved_order = $this->Orders->save($order);
        $order_id = $saved_order -> id;
        $orderstable = $this->fetchTable('Orders');

        $query = $orderstable->query();
        $updated_res = $query->update()
            ->set(['cust_name' => $cust_name, 'email' => $email, 'shipping_address' => $shipping_address])
            ->where(['id' => $order_id])
            ->execute();

        // $update_order = $this->Orders->get($order_id);
        // $update_order -> cust_name = $cust_name;
        // $update_order -> email = $email;
        // $update_order -> shipping_address = $shipping_address;
        // $updated_order = $this->Orders->save($update_order);
        

        if ($saved_order && $updated_res) {
            // update data in ordersproducts table
            foreach ($product_list as $product):
                $product_id = $product -> id;
                $qty = $product -> purchase_quantity;
                $price = $product -> total_price;

                $query = $this->fetchTable('OrdersProducts')->find()->where(['order_id' => $order_id, 'product_id' => $product_id]);
                $ordersProducts = $query -> first();
                
                $ordersProducts -> qty = $qty;
                $ordersProducts -> price = $price;

                $this->fetchTable('OrdersProducts')->save($ordersProducts);
            endforeach;
            
            
            $this->paypalRequest($order_id);
            $this->Flash->success(__('The order has been saved.'));
            return $this->redirect(['controller'=>'products','action' => 'index']);
        }


    }
    public function beforeFilter(EventInterface $event){
        $this->Auth->allow(['cart']);
    }


    public function confirm() {
        $cust_name = $this->getRequest()->getSession()->consume('cust_name');
        $ordered_items = $this->getRequest()->getSession()->consume('product-list');
        $total = $this->getRequest()->getSession()->consume('total-price');
        $address = $this->getRequest()->getSession()->consume('cust_address');
        $this->set('product_list',$ordered_items);
        $this->set('cust_name',$cust_name);
        $this->set('total_price',$total);
        $this->set('cust_address',$address);

        $this->getRequest()->getSession()->delete('cart');
        $this->getRequest()->getSession()->delete('paypalPaymentId');
    }
    public function paypalRequest($orderid) {
        
            //API Auth Stuff
            $clientId =  '';
            $secret =  '';
            $apiContext = new \PayPal\Rest\ApiContext(
               new \PayPal\Auth\OAuthTokenCredential(
               $clientId,
               $secret 
              )
            );
  

        //get ordered items form session
          $ordered_items = $this->getRequest()->getSession()->read('product-list');
        //Create new payer, user details can be taken from payer after payment complete
          $payer = new Payer();
          $payer->setPaymentMethod('paypal');
        //Create items and add to item list
          $item_list = new ItemList();

        //Set Payment amount, take amount from session
          $amount = new \PayPal\Api\Amount();
          $amount->setCurrency('AUD')
              ->setTotal($this->getRequest()->getSession()->read('total-price'));

        //Create new transaction object, add transaction data
          $transaction = new \PayPal\Api\Transaction();
          $transaction->setAmount($amount)
              ->setItemList($item_list)
              ->setDescription("Order From JJCrackers");
         //Set Redirect URL, one for success and one for failure     
          $redirect_urls = new \PayPal\Api\RedirectUrls();
          $redirect_urls->setReturnUrl(Router::url(['controller' => 'Orders', 'action' => 'status',$orderid], true))
                        ->setCancelUrl(Router::url(['controller' => 'Orders', 'action' => 'status'], true));
        //Create payment object
          $payment = new \PayPal\Api\Payment();
          $payment->setIntent('Sale')
              ->setPayer($payer)
              ->setRedirectUrls($redirect_urls)
              ->setTransactions(array($transaction));
          try {
              $payment->create($apiContext);
          } catch (\PayPal\Exception\PPConnectionException $ex) {
              $this->Flash->error('Something went wrong! Please try again.');
              return $this->redirect(['action'=>'index']);
              
          }
          foreach ($payment->getLinks() as $link) {
              if ($link->getRel() == 'approval_url') {
                  $redirect = $link->getHref();
                  break;
              }
          }
          //write payment id to session
          $this->getRequest()->getSession()->write('paypalPaymentId',$payment->getId());
         
          if (isset($redirect)) {
              return $this->redirect($redirect);
          }
           $this->Flash->error('Something went wrong! Please try again.');
           return $this->redirect(['action'=>'cart']);
    }

    public function status($orderid)
      {


        //api stuff, need to hide keys before deploying live
        $clientId =  '';
        $secret =  '';
            $apiContext = new \PayPal\Rest\ApiContext(
               new \PayPal\Auth\OAuthTokenCredential(
               $clientId,  
               $secret 
              )
            );
            
        //Get payment id from session
          $paymentSessionId = $this->getRequest()->getSession()->read('paypalPaymentId');
                     
          //$this->getRequest()->getSession()->delete('paypalPaymentId');
          $getPayeerId = $this->request->getQuery('PayerID');
          $token = $this->request->getQuery('token');
  
        //Validate payerId and token
          if (empty($getPayeerId) || empty($token)) {
              $this->Flash->error('Something went wrong! Please try again.');
              return $this->redirect(['action'=>'cart']);
          }

          //execute payment request
          $payment = Payment::get($paymentSessionId, $apiContext);
          $execution = new \PayPal\Api\PaymentExecution();
          $execution->setPayerId($getPayeerId);
  
          try { 
              $result = $payment->execute($execution, $apiContext);
          }  catch (PayPal\Exception\PPConnectionException $ex) {}
                
          if($result->getState() == 'approved') {

            //Get Details of Payer
            $payerInfo = $result->getPayer()->getPayerInfo()->toArray();
            $address = $payerInfo['shipping_address'];

            $addressAsString = $address['line1'] . " " . $address['city'] . " " . $address['state'] . " " . $address['postal_code'];
            

            $this->getRequest()->getSession()->write(['cust_name' => $payerInfo['first_name'],'cust_address' => $addressAsString]);

            $order = $this->fetchTable('Orders')->find()->where(['id' => $orderid])->first();
            $order -> status = 'paid';
            // $order -> shipping_address = $addressAsString;
            // $order -> email = $payerInfo['email'];
            // $order -> cust_name = $payerInfo['first_name'] . " "  . $payerInfo['last_name'];
            $this->fetchTable('Orders')->save($order);

            foreach($this->getRequest()->getSession()->read('product-list') as $product) {
                $query = $this->fetchTable('Products')->find()->where(['id' => $product->id])->first();
                $query -> quantity = $query -> quantity - $product->purchase_quantity;
                $this->fetchTable('products')->save($query);
            }
            

            
            return $this->redirect(['action'=>'confirm']);
          }
           $this->Flash->error('Payment failed.');
           return $this->redirect(['action'=>'index']);

        }






    

}
