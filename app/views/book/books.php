<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros - Biblioteca</title>
    <link rel="stylesheet" href="/proyecto-mvc/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>📚 Biblioteca Virtual</h1>
        
        <!-- Mensajes de éxito/error -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                ✅ <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                ❌ <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        
        <a href="/proyecto-mvc/book/add" class="btn btn-primary">➕ Agregar Nuevo Libro</a>
        
        <?php if (empty($books)): ?>
            <p class="no-books">No hay libros en la biblioteca.</p>
        <?php else: ?>
            <table class="books-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['id']); ?></td>
                        <td>
                            <a href="/proyecto-mvc/book/show/<?php echo $book['id']; ?>" class="book-title">
                                <?php echo htmlspecialchars($book['titulo']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($book['autor']); ?></td>
                        <td><?php echo htmlspecialchars($book['anio']); ?></td>
                        <td class="actions">
                            <a href="/proyecto-mvc/book/show/<?php echo $book['id']; ?>" 
                               class="btn btn-info">👁️ Ver</a>
                            <a href="/proyecto-mvc/book/delete/<?php echo $book['id']; ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('¿Estás seguro de que quieres eliminar el libro \\'<?php echo addslashes($book['titulo']); ?>\'?')">
                               🗑️ Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script>
        // Auto-ocultar mensajes después de 5 segundos
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.display = 'none';
            });
        }, 5000);
    </script>
</body>
</html>