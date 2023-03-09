<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Cache\Cache;

/**
 * Carousel Controller
 *
 * @property \App\Model\Table\CarouselTable $Carousel
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarouselController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $carousel = $this->paginate($this->Carousel);

        $this->set(compact('carousel'));
    }

    /**
     * View method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carousel = $this->Carousel->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('carousel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carousel = $this->Carousel->newEmptyEntity();
        if ($this->request->is('post')) {
            $carousel = $this->Carousel->patchEntity($carousel, $this->request->getData());

            if(!$carousel->getErrors){
                $photo = $this->request->getData('photo');
                

                $name = $photo->getClientFileName();

                if(!is_dir(WWW_ROOT.'img'.DS.'carousel')){
                    mkdir(WWW_ROOT.'img'.DS.'carousel', 0775);
                }

                $targetPath = WWW_ROOT.'img'.DS.'carousel'.DS.$name;

                if($name){
                    $photo->moveTo($targetPath);
                }
                $image = imagecreatefromjpeg('img/carousel/'.$name);
                $imgResized = imagescale($image, 2048, 926);
                imagejpeg($imgResized, 'img/carousel/'.$name); 

                $carousel->photo = $name;
                
            }




            if ($this->Carousel->save($carousel)) {
                $this->Flash->success(__('The carousel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carousel could not be saved. Please, try again.'));
        }
        $this->set(compact('carousel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carousel = $this->Carousel->get($id, [
            'contain' => [],
        ]);
        $name = $carousel->photo;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $carousel = $this->Carousel->patchEntity($carousel, $this->request->getData());

            if(!$carousel->getErrors){
                $photo = $this->request->getData('change_photo');

                $randomeNumber = rand(1,999);
                $name = $photo->getClientFileName();

                if($name) {
                    $newName = strval($randomeNumber) . $name;

                    if(!is_dir(WWW_ROOT.'img'.DS.'carousel')){
                        mkdir(WWW_ROOT.'img'.DS.'carousel', 0775);
                    }

                    $targetPath = WWW_ROOT.'img'.DS.'carousel'.DS.$newName;

                    if($newName){
                        $photo->moveTo($targetPath);
                        $image = imagecreatefromjpeg('img/carousel/'.$newName);
                        $imgResized = imagescale($image, 2048, 926);
                        imagejpeg($imgResized, 'img/carousel/'.$newName); 
                    }

                    $photoPath = WWW_ROOT.'img'.DS.'carousel'.$carousel->photo;
                    if(file_exists($photoPath)) {
                        unlink($photoPath);
                    }

                    $carousel->photo = $newName;

                }

                
            }


            if ($this->Carousel->save($carousel)) {
                $this->Flash->success(__('The carousel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carousel could not be saved. Please, try again.'));
        }

        $this->set(compact('carousel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carousel = $this->Carousel->get($id);
        if ($this->Carousel->delete($carousel)) {
            $this->Flash->success(__('The carousel has been deleted.'));
        } else {
            $this->Flash->error(__('The carousel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
