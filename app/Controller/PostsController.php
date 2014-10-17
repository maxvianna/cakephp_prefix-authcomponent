<?php
   class PostsController extends AppController {

      public $uses = 'Post';
      public $name = 'Posts';

      public function index()
      {
         $this->set('posts', $this->Post->find('all'));
      }

      public function adicionar()
      {
         if($this->request->is('post'))
         {
            if($this->Post->save($this->request->data))
            {
               $this->Session->setFlash('O post foi adicionado com sucesso!');
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash('O post não foi adicionado. Tente novamente!');
            }
         }
      }

      public function editar($id = NULL)
      {
         $this->Post->id = $id;
         if(!$this->Post->exists())
         {
            throw new NotFoundException("Post não encontrado!");
         }

         if($this->request->is('post') || $this->request->is('put'))
         {
            if($this->Post->save($this->request->data))
            {
               $this->Session->setFlash('O post foi editado com sucesso!');
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash('O post não foi editado. Tente novamente.');
            }
         } else {
            $this->request->data = $this->Post->read();
         }
      }

      public function deletar($id = NULL)
      {
         if($this->request->is('get'))
         {
            throw new MethodNotAllowedException('Você não tem permissão para deletar este post!');
         }

      if(!$id)
      {
         $this->Session->setFlash('ID inválido');
         $this->redirect(array('action' => 'index'));
      }

      if($this->Post->delete($id))
      {
         $this->Session->setFlash('Post deletado');
         $this->redirect(array('action' => 'index'));
      }

      $this->Session->setFlash('Post não foi deletado');
      $this->redirect(array('action' => 'index'));
      }
   }
?>