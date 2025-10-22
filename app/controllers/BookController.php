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
            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $autor = trim(htmlspecialchars($_POST['autor']));
            $anio = intval($_POST['año']); // El formulario sigue usando name="año"

            if (!empty($titulo) && !empty($autor) && $anio > 1000 && $anio <= date('Y')) {
                $bookModel = new Book();
                if ($bookModel->create($titulo, $autor, $anio)) {
                    header('Location: /proyecto-mvc/book');
                    exit;
                }
            }
        }
        header('Location: /proyecto-mvc/book/add');
        exit;
    }
}
?>