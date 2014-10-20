<?php
   class UsersController extends AppController {

      public $uses = 'User';
      public $name = 'Users';

      public function admin_index()
      {
         $this->set('users', $this->User->find('all'));
      }

      public function admin_adicionar()
      {
         if($this->request->is('post'))
         {
            if($this->User->save($this->request->data))
            {
               $this->Session->setFlash('O usuário foi adicionado com sucesso!');
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash('O usuário não foi adicionado. Tente novamente!');
            }
         }
      }

      public function admin_editar($id = NULL)
      {
         $this->User->id = $id;
         if(!$this->User->exists())
         {
            throw new NotFoundException("Usuário não encontrado!");
         }

         if($this->request->is('post') || $this->request->is('put'))
         {
            if($this->User->save($this->request->data))
            {
               $this->Session->setFlash('O usuário foi editado com sucesso!');
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash('O usuário não foi editado. Tente novamente.');
            }
         } else {
            $this->request->data = $this->User->read();
            $this->set('user', $this->User->read());
         }
      }

      public function admin_deletar($id = NULL)
      {
         if($this->request->is('get'))
         {
            throw new MethodNotAllowedException('Você não tem permissão para deletar este usuário!');
         }

      if(!$id)
      {
         $this->Session->setFlash('ID inválido');
         $this->redirect(array('action' => 'index'));
      }

      if($this->User->delete($id))
      {
         $this->Session->setFlash('Usuário deletado');
         $this->redirect(array('action' => 'index'));
      }

      $this->Session->setFlash('Usuário não foi deletado');
      $this->redirect(array('action' => 'index'));
      }

      public function beforeFilter()
      {
         parent::beforeFilter();
         $this->Auth->allow('admin_login', 'admin_adicionar');       
      }

      public function isAuthorized($user)
      {
         if($user['role'] == 'admin')
         {
            return TRUE;
         }
         if(in_array($this->action, array('edit', 'delete')))
         {
            if($user['id'] != $this->request->params['pass'][0])
            {
               return FALSE;
            }
         }
         return TRUE;
      }

      public function admin_login()
      {
         if($this->request->is('post'))
         {
            if($this->Auth->login())
            {
               $this->redirect($this->Auth->redirect());
            } else {
               $this->Session->setFlash('Your username/password was incorrect');
            }
         }
      }

      public function admin_logout()
      {
         $this->redirect($this->Auth->logout());
      }
   }
?>