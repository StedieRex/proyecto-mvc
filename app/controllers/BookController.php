<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
    
    public function index() {
        $bookModel = new Book();
        $books = $bookModel->getAll();
        require __DIR__ . '/../views/book/books.php';
    }

    public function add() {
        require __DIR__ . '/../views/book/addBook.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $autor = trim($_POST['autor']);
            $año = intval($_POST['año']);

            if (!empty($titulo) && !empty($autor) && $año > 0) {
                $bookModel = new Book();
                if ($bookModel->create($titulo, $autor, $año)) {
                    header('Location: /proyecto-mvc/book');
                    exit;
                }
            }
        }
        // Si hay error, volver al formulario
        header('Location: /proyecto-mvc/book/add');
    }
}
?>