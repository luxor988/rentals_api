<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Apartments Controller
 *
 * @property \App\Model\Table\ApartmentsTable $Apartments
 * @method \App\Model\Entity\Apartment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApartmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ApartmentTypes', 'Statuses', 'Users'],
        ];
        $apartments = $this->paginate($this->Apartments);

        $responseJson = json_encode($apartments);

        return $this->response->withType('application/json')->withStringBody($responseJson);
    }

    /**
     * View method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apartment = $this->Apartments->get($id, [
            'contain' => ['ApartmentTypes', 'Statuses', 'Users'],
        ]);


        $responseJson = json_encode($apartment);

        return $this->response->withType('application/json')->withStringBody($responseJson);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apartment = $this->Apartments->newEmptyEntity();
        if ($this->request->is('post')) {
            $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
        }
        $apartmentTypes = $this->Apartments->ApartmentTypes->find('list', ['limit' => 200])->all();
        $statuses = $this->Apartments->Statuses->find('list', ['limit' => 200])->all();
        $users = $this->Apartments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('apartment', 'apartmentTypes', 'statuses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apartment = $this->Apartments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
        }
        $apartmentTypes = $this->Apartments->ApartmentTypes->find('list', ['limit' => 200])->all();
        $statuses = $this->Apartments->Statuses->find('list', ['limit' => 200])->all();
        $users = $this->Apartments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('apartment', 'apartmentTypes', 'statuses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apartment = $this->Apartments->get($id);
        if ($this->Apartments->delete($apartment)) {
            $this->Flash->success(__('The apartment has been deleted.'));
        } else {
            $this->Flash->error(__('The apartment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
