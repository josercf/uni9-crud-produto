<?php
require_once 'produto.php';

$produto = new Produto();
$produtos = $produto->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir Font Awesome para os ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Lista de Produtos <i class="fas fa-box"></i></h1>

            <!-- Botões de Ações -->
            <div class="d-flex justify-content-center mb-4">
                <a href="produto-adicionar.php" class="btn btn-success me-2">
                    <i class="fas fa-plus"></i> Adicionar Produto
                </a>
                <a href="listar_produtos.php" class="btn btn-primary">
                    <i class="fas fa-sync-alt"></i> Atualizar Lista
                </a>
            </div>

            <!-- Verificar se há produtos -->
            <?php if (count($produtos) > 0): ?>
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($produto['id']); ?></td>
                                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                                <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                                <td><?php echo htmlspecialchars(number_format($produto['preco'], 2, ',', '.')); ?></td>
                                <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                                <td>
                                    <a href="produto-alterar.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Alterar
                                    </a>
                                    <a href="produto-excluir.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">Nenhum produto encontrado.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
