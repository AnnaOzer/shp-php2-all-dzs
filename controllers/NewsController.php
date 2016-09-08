<?php


class NewsController
    extends AController
{
    protected function actionAll()
    {
        try {
            $view = new View();

            $view->news = News::findAll();

            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
                echo '<br>';
            }

            $view->display('index');
        } catch (Exception $e) {
            throw new ControllerException('Не удается показать все новости: ' . $e->getMessage());
        }
    }

    protected function actionOne()
    {
        try {
            $id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;

            $view = new View();
            $view->article = !is_null((new News)->findById($id)) ? (new News)->findById($id) : (new News)->findById(1);
            $view->display('one');
        } catch (Exception $e) {
            throw new ControllerException('Не удается показать эту новость: ' . $e->getMessage());
        }
    }
    
    protected function actionAdder()
    {
        $view = new View;
        $view->display('form_add');
    }

    protected function actionUpdater()
    {
        $id=(isset($_GET['id'])) ? $_GET['id'] : 1;

        $view = new View();
        $view->article = News::findById($id);
        $view->display('form_update');

    }

    protected function actionAdd()
    {
        try {

            if (!empty($_POST)) {
                if (!empty($_POST['text'])) {
                    $article = new News();
                    $article->title = isset($_POST['title']) ? $_POST['title'] : '***';
                    $article->text = $_POST['text'];
                    $article->save();
                    $_SESSION['message'] = 'Новость добавлена';
                }
            }
        } catch (Exception $e) {
            throw new Exception('Не удается добавить новость');
        }

        header("Location:/?r=news/all");
    }

    protected function actionUpdate()
    {
        try {
            if (!empty($_POST)) {

                if (!empty($_POST['id'])) {
                    $id = (int)$_POST['id'];
                    if (!empty($_POST['text'])) {

                        $article = News::findById($id);

                        $article->title = isset($_POST['title']) ? $_POST['title'] : '***';
                        $article->text = $_POST['text'];

                        $article->save();

                        $_SESSION['message'] = 'Новость обновлена';
                    }
                }
            }
        } catch (Exception $e) {
            throw new Exception('Не удается обновить новость');
        }

        header("Location:/?r=news/all");
    }

    protected function actionDelete()
    {
        $id=(isset($_GET['id'])) ? $_GET['id'] : 0;
        $articleToDelete = News::findById($id);

        if( isset($articleToDelete->id)  ) {
            $articleToDelete->delete();
            $_SESSION['message'] = 'Удалено';
        } else {
            throw new Exception('Попытка удалить несуществующую новость');
        }

        header("Location:/?r=news/all");
    }

}