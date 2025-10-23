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
            // Sanitizar y validar datos
            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $autor = trim(htmlspecialchars($_POST['autor']));
            $anio = intval($_POST['anio']);
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));

            // Validaciones
            if (!empty($titulo) && !empty($autor) && $anio > 1000 && $anio <= date('Y')) {
                $bookModel = new Book();
                if ($bookModel->create($titulo, $autor, $anio, $descripcion)) {
                    header('Location: /proyecto-mvc/book?success=Libro agregado correctamente');
                    exit;
                } else {
                    header('Location: /proyecto-mvc/book/add?error=Error al guardar el libro en la base de datos');
                    exit;
                }
            } else {
                header('Location: /proyecto-mvc/book/add?error=Datos inválidos. Asegúrate de llenar todos los campos correctamente.');
                exit;
            }
        }
        
        header('Location: /proyecto-mvc/book/add');
        exit;
    }

    public function delete($id) {
        if (!is_numeric($id) || $id <= 0) {
            echo "ID inválido";
            exit;
        }

        $bookModel = new Book();
        
        if ($bookModel->delete($id)) {
            header('Location: /proyecto-mvc/book?success=Libro eliminado correctamente');
        } else {
            header('Location: /proyecto-mvc/book?error=Error al eliminar el libro');
        }
        exit;
    }

    // Nuevo método para mostrar detalles del libro
    public function show($id) {
        if (!is_numeric($id) || $id <= 0) {
            echo "ID inválido";
            exit;
        }

        $bookModel = new Book();
        $book = $bookModel->getById($id);

        if ($book) {
            require __DIR__ . '/../views/book/showBook.php';
        } else {
            http_response_code(404);
            echo "Libro no encontrado";
        }
    }
}
?>