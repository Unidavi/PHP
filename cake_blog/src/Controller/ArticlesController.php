<?php

namespace App\Controller;

class ArticlesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash'); // Inclui o FlashComponent
        /*
          Nota: Você precisa incluir o Flash component em qualquer controller que vá usá-lo. Se necessário,
          inclua no AppController e assim o FlashComponent estará disponível para todos os controllers da
          aplicação.
         */
    }

    public function index() {
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }

    public function view($id = null) {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function adicionar() {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Seu artigo foi salvo.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não é possível adicionar o seu artigo.'));
        }
        $this->set('article', $article);
    }

    public function editar($id = null) {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Seu artigo foi atualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Seu artigo não pôde ser atualizado.'));
        }
        $this->set('article', $article);
    }

    public function deletar($id) {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('O artigo com id: {0} foi deletado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

}
