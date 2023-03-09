<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Table;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Event\EventInterface;
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Model\Entity\User;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {

        if(!($this->request->getSession()->check('Auth'))){
            # CREATE DUMMY USER
            $newuser = new user();
            $newuser['user_id'] = 0;
            $newuser['email'] = 'guest@gmail.com';
            $newuser['password'] = 'guest';
            $newuser['role'] = 'user';
            $newuser['first_name'] = 'guest';
            $newuser['last_name'] = 'guest';
            $newuser['street_address'] = 'guest';
            $newuser['post_code'] = '4032';
            $newuser['street_address'] = 'guest';
            $newuser['phone_number'] = '0462784222';
            $this->Auth->setuser($newuser);
        }
        
        $this->getRequest()->getSession();
        $query = $this->fetchTable('Products')->find()->where(['Products.deleted' => 0])->contain('Categories');
        $query2 = $this->fetchTable('Carousel')->find();
        $carousel = $query2->toArray();
        $products = $query->toArray();
        $name = $this->request->getSession();

        $this->set(compact('products','carousel'));

        // if($this->request->is('post')) {
        //     $this->paypalRequest();
        //   }  
    }


    /**
     * Admin Index Page
     */
    public function adminIndex()
    {
        $query = $this->fetchTable('Products')->find()->where(['Products.deleted' => 0])->contain('Categories');
        $products = $query->toArray();

        $categories = $this->fetchTable('Categories')->find()->where(['deleted' => 0]);

        $this->set(compact('products','categories'));
    }
    

    public function receive(){
        $id = $this->request->getData('id');
        debug($id);
        $quantity = intval($this->request->getData('quantity'));

        $this->addProduct($id, $quantity);
        exit($id);
    }
    public function addProduct($productId, $quantity) {
        if ($this->getRequest()->getSession()->check("cart.".$productId)) {
            $qty = $this->getRequest()->getSession()->consume('cart.'.$productId);
            $this->getRequest()->getSession()->write('cart.'.$productId,$qty+$quantity);
        }
        else{$this->getRequest()->getSession()->write('cart.'.$productId,$quantity);} 
        
    }

    
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));

    }

    public function show(){
        $products = $this->paginate($this->Products->find()->where(['Products.deleted' => 0]), ['contain'=>['Categories'],'limit' => 12]);
        $this->set(compact('products'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);


        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            // $errors = $product->getErrors();

            if(!$product->getErrors){
                $photo = $this->request->getData('submit_photo');

                $randomeNumber = rand(100,999);
                $name = $photo->getClientFileName();
                $newName = strval($randomeNumber) . $name;

                if(!is_dir(WWW_ROOT.'img'.DS.'products-img')){
                    mkdir(WWW_ROOT.'img'.DS.'products-img', 0775);
                }

                $targetPath = WWW_ROOT.'img'.DS.'products-img'.DS.$newName;

                if($newName){
                    $photo->moveTo($targetPath);
                }
                $image = imagecreatefromjpeg('img/products-img/'.$newName);
                $imgResized = imagescale($image , 500, 400);
                imagejpeg($imgResized, 'img/products-img/'.$newName); 

                $product->photo = $newName;
            }

            

            $category_id = $this->request->getData('category');
            $product->category_id = $category_id;

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'adminIndex']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $this->set(compact('product', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain'=>['Categories']
        ]);


        $categories = $this->Products->Categories->find('list', ['limit' => 200]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            if(!$product->getErrors){
                $photo = $this->request->getData('change_photo');
                $category = intval($this->request->getData('category'));

                $randomeNumber = rand(1,999);
                $name = $photo->getClientFileName();
                if($name) {
                    $newName = strval($randomeNumber) . $name;

                    if(!is_dir(WWW_ROOT.'img'.DS.'products-img')){
                        mkdir(WWW_ROOT.'img'.DS.'products-img', 0775);
                    }

                    $targetPath = WWW_ROOT.'img'.DS.'products-img'.DS.$newName;

                    if($newName){
                        $photo->moveTo($targetPath);
                    }

                    $photoPath = WWW_ROOT.'img'.DS.'products-img'.$product->photo;
                    if(file_exists($photoPath)) {
                        unlink($photoPath);
                    }

                    $product->photo = 'products-img/'.$newName;

                }
                $product->category_id = $category;
            }

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'adminIndex']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);

        $product -> deleted = 1;

        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'adminIndex']);
    }

    public function beforeFilter(EventInterface $event){
        $this->Auth->allow(['index','show']);
    }

}
