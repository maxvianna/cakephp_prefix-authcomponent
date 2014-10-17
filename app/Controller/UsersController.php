<?php
   class UsersController extends AppController {

      public $uses = 'User';
      public $name = 'Users';

      public function index()
      {
         $this->set('users', $this->User->find('all'));
      }

      public function adicionar()
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

      public function editar($id = NULL)
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

      public function deletar($id = NULL)
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
   }
?>