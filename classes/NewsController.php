<?php


class NewsController
    extends AController
{
    protected function actionAll()
    {
        $view = new View();
        $view->news = (new newsModel)->getAll();

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
            echo '<br>';
        }

        $view->display('index');
    }

    protected function actionOne()
    {

        $id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;
        
        $view = new View();
        $view->article = !is_null( (new newsModel)->getOne($id) ) ? (new newsModel)->getOne($id) : (new newsModel)->getOne(1);
        $view->display('one');
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
        $view->article = ( new newsModel() )->getOne($id);
        $view->display('form_update');

    }

    protected function actionAdd()
    {
        if(!empty($_POST)) {
            if(!empty($_POST['text'])) {
                $article=[];
                $article['title'] = isset($_POST['title']) ? $_POST['title'] : '***';
                $article['text'] = $_POST['text'];

                $_SESSION['message'] = ( (new newsModel)->add($article) )  ? 'Добавлено' : 'Что-то пошло не так';
            }
        }

        header("Location:/?r=news/all");
    }

    protected function actionUpdate()
    {
        if(!empty($_POST)) {

            if(!empty($_POST['id'])) {

                if (!empty($_POST['text'])) {
                    $article = [];


                    $article['title'] = isset($_POST['title']) ? $_POST['title'] : '***';
                    $article['text'] = $_POST['text'];

                    $id = (int)$_POST['id'];

                    $_SESSION['message'] = ((new newsModel)->update($article, $id)) ? 'Обновлено' : 'Что-то пошло не так';
                }
            }
        }

        header("Location:/?r=news/all");
    }

    protected function actionDelete()
    {
        $id=(isset($_GET['id'])) ? $_GET['id'] : 0;

        if( !is_null( (new newsModel)->getOne($id) )  ) {
            $_SESSION['message'] = (new newsModel)->delete($id) ? 'Удалено' : 'Что-то пошло не так';
        } else {
            $_SESSION['message'] = 'Попытка удалить несуществующую новость';
        }

        header("Location:/?r=news/all");
    }

}