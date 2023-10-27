<?php
declare(strict_types=1);

namespace App\Controller;

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
        $this->paginate = [
            'contain' => ['Statuses', 'Roles'],
        ];
        $users = $this->paginate($this->Users);

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
            'contain' => ['Statuses', 'Roles', 'Apartments'],
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
        $statuses = $this->Users->Statuses->find('list', ['limit' => 200])->all();
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'statuses', 'roles'));
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
        $statuses = $this->Users->Statuses->find('list', ['limit' => 200])->all();
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'statuses', 'roles'));
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function login()
    {
        $this->request->allowMethod(['post']);

        $response = [];
        $response['error'] = true;

        if ($this->request->is('post')) {
            $dataPost = $this->request->getData();

            $validate = $this->Users->verify($dataPost);

            if (!$validate['error']) {
                $response['error'] = false;
                $response['info'] = $validate['info'];
            }
        }
        $responseJson = json_encode($response);

        return $this->response->withType('application/json')->withStringBody($responseJson);
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $this->request->allowMethod(['post']);

        $response = [];
        $response['error'] = true;

        if ($this->request->is('post')) {
            $dataPost = $this->request->getData();

            $validate = $this->Users->register($dataPost);

            if (!$validate['error']) {
                $response['error'] = false;
            } else {
                $response['error_description'] = @$validate['error_description'];
            }
        }
        $responseJson = json_encode($response);

        return $this->response->withType('application/json')->withStringBody($responseJson);
    }
}
