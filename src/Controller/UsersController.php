<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\I18n\FrozenTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->viewBuilder()->setLayout('admin_default');
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Login
    public function login(){
        // $session = $this->request->getSession();
        // $session->destroy();
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);

                // Grabbing the current user's role from database
                $temp = $this->request->getData('email');
                $temp2 = $this->Users->find()->where(['email' => $temp])->first();
                $role = $temp2->role;

                if($role == 'admin'){
                    return $this->redirect(['controller'=>'products','action' => 'adminIndex']);
                }else{
                    return $this->redirect(['controller'=>'products','action' => 'index']);
                }
            }
            
            // Bad Login
            $this->Flash->error('Incorrect Login');
        }
        // Login not processed
        //$this->Flash->error(__('Login not processed'));
    }

    //Logout
    public function logout(){
        $this->Flash->success(__('You are logged out'));
        $this->getRequest()->getSession()->destroy();

        return $this->redirect(['controller'=>'products','action' => 'index']);
    }

    //Register
    public function register(){
        $user = $this->Users->newEmptyEntity();
        $state_array = ['VIC', 'NSW', 'QLD', 'SA', 'NT', 'TAS', 'WA'];
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $phone = $user -> phone_number;
            $post_code = $user -> post_code;
            $firstname = $user -> first_name;
            $lastname = $user -> last_name;

            $validated_phone = $this->isValidAUPhoneFormat(strval($phone));
            $validated_post_code = $this->isValidPostCodeFormat(strval($post_code));
            $validated_firstname = $this->isValidNameFormat(strval($firstname));
            $validated_lastname = $this->isValidNameFormat(strval($lastname));


            $saved_user = false;

            if ($validated_phone && $validated_post_code && $validated_firstname && $validated_lastname) {
                $state_code = intval($user -> state);
                $user -> state = $state_array[$state_code];
                $saved_user = $this->Users->save($user);
            }

            if (!$validated_firstname){
                $this->Flash->error(__('Please use the correct first name format: only allow to input letters and -'));
            }

            if (!$validated_lastname){
                $this->Flash->error(__('Please use the correct last name format: only allow to input letters and -'));
            }
            
            if (!$validated_phone){
                $this->Flash->error(__('Please use the correct phone number format: 0123456789'));
            }
            
            if (!$validated_post_code){
                $this->Flash->error(__('Please use the correct post code format: 3000'));
            } 

            
            if ($saved_user) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('This account already exists, Please login!'));
        }
        $this->set(compact('user'));
    }

    public function about(){

    }

    public function checkout(){

        $auth = $this->request->getSession()->read('Auth');
        $check_user = $auth['User'];
        if($check_user['id'] != 0){
            return $this->redirect(['controller'=> 'orders', 'action' => 'test']);
        }

        $product_list = $this->getRequest()->getSession()->read('product-list');
        $total_price = $this->getRequest()->getSession()->read('total-price');
        $user = $this->Users->newEmptyEntity();


        if ($this->request->is('post')) {
            // $time = FrozenTime::now();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $phone = $user -> phone_number;
            $email = $user -> email;
            $firstname = $user -> first_name;
            $lastname = $user -> last_name;

            $validated_phone = $this->isValidAUPhoneFormat(strval($phone));
            // $validated_post_code = $this->isValidPostCodeFormat(strval($post_code));
            $validated_firstname = $this->isValidNameFormat(strval($firstname));
            $validated_lastname = $this->isValidNameFormat(strval($lastname));

            $validated_check = true;

            // $user -> role = "user";
            // $user -> password = strval($time);
            // $user -> state = "VIC";
            // $saved_user = false;

            if ($validated_phone && $validated_firstname && $validated_lastname) {
                $this->getRequest()->getSession()->write('guest',$user);
                return $this->redirect(['controller'=> 'orders', 'action' => 'test']);
            }

            if (!$validated_firstname){
                $this->Flash->error(__('Please use the correct first name format: only allow to input letters and -'));
                $validated_check = false;
                return $this->redirect(['controller'=> 'users', 'action' => 'checkout']);
            }

            if (!$validated_lastname){
                $this->Flash->error(__('Please use the correct last name format: only allow to input letters and -'));
                $validated_check = false;
                return $this->redirect(['controller'=> 'users', 'action' => 'checkout']);
            }
            
            if (!$validated_phone){
                $this->Flash->error(__('Please use the correct phone number format: 0123456789'));
                $validated_check = false;
                return $this->redirect(['controller'=> 'users', 'action' => 'checkout']);
            }


            
            
            // if (!$validated_post_code){
            //     $this->Flash->error(__('Please use the correct post code format: 3000'));
            // } 


            // if ($saved_user) {
            //     $user_id = $saved_user -> id;
            //     $this->getRequest()->getSession()->write('user-id',$user_id);
            //     return $this->redirect(['controller'=> 'orders', 'action' => 'test']);
            // } else {
            //     $this->Flash->error(__('This email already been used, please try to login or use another one.'));
            //     return $this->redirect(['controller'=> 'users', 'action' => 'checkout']);
            // }
            
        }
        $this->set(compact('user','product_list', 'total_price'));
    }


    private function isValidAUPhoneFormat($phone){
           if (!preg_match('/^0[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/', $phone)) {
            return false;
           }
        return true;
    }

    private function isValidPostCodeFormat($post_code){
        if (!preg_match('/^[1-9][0-9][0-9][0-9]$/', $post_code)) {
         return false;
        }
     return true;
    }

    private function isValidNameFormat($name){
        if (!preg_match('/^[a-zA-Z][a-zA-Z]*\-?[a-zA-Z]*$/', $name)) {
         return false;
        }
     return true;
    }

    
    //Allow Guest
    public function beforeFilter(EventInterface $event){
        $this->Auth->allow(['register']);
        $this->Auth->allow(['login']);
        $this->Auth->allow(['about']);
    }
}
