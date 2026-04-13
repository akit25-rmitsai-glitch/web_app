<?php
session_start();

if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['current_player'] = 'X';
    $_SESSION['winner'] = '';
    $_SESSION['draw'] = false;
}

function checkWinner($board) {
    $winCombinations = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];

    foreach ($winCombinations as $combo) {
        $a = $combo[0];
        $b = $combo[1];
        $c = $combo[2];

        if (
            $board[$a] !== '' &&
            $board[$a] === $board[$b] &&
            $board[$b] === $board[$c]
        ) {
            return $board[$a];
        }
    }

    return '';
}

function isDraw($board) {
    foreach ($board as $cell) {
        if ($cell === '') {
            return false;
        }
    }
    return true;
}

if (isset($_GET['reset'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['current_player'] = 'X';
    $_SESSION['winner'] = '';
    $_SESSION['draw'] = false;

    header('Location: index5.php');
    exit();
}

if (isset($_GET['cell'])) {
    $cellIndex = (int)$_GET['cell'];

    if (
        $cellIndex >= 0 &&
        $cellIndex <= 8 &&
        $_SESSION['board'][$cellIndex] === '' &&
        $_SESSION['winner'] === '' &&
        $_SESSION['draw'] === false
    ) {
        $_SESSION['board'][$cellIndex] = $_SESSION['current_player'];

        $winner = checkWinner($_SESSION['board']);

        if ($winner !== '') {
            $_SESSION['winner'] = $winner;
        } elseif (isDraw($_SESSION['board'])) {
            $_SESSION['draw'] = true;
        } else {
            $_SESSION['current_player'] = $_SESSION['current_player'] === 'X' ? 'O' : 'X';
        }
    }

    header('Location: index5.php');
    exit();
}

$board = $_SESSION['board'];
$currentPlayer = $_SESSION['current_player'];
$winner = $_SESSION['winner'];
$draw = $_SESSION['draw'];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 5</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style5.css">
</head>
<body>

<header class="site-header">
    <div class="container">
        <h1 class="site-title">BLOG</h1>

        <nav class="menu">
            <a href="index.html">Lab 1</a>
            <a href="index2.html">Lab 2</a>
            <a href="index3.html">Lab 3</a>
            <a href="index4.html">Lab 4</a>
            <a href="index5.php" class="active">Lab 5</a>
            <a href="index6.php">Lab 6</a>
            <a href="index7.html">Lab 7</a>
        </nav>
    </div>
</header>

<main class="lab-page">
    <div class="game-wrapper">
        <h2>Хрестики-нулики</h2>

        <?php if ($winner !== ''): ?>
            <p class="status">Переміг гравець: <strong><?php echo $winner; ?></strong></p>
        <?php elseif ($draw): ?>
            <p class="status">Нічия</p>
        <?php else: ?>
            <p class="status">Зараз ходить: <strong><?php echo $currentPlayer; ?></strong></p>
        <?php endif; ?>

        <div class="board">
            <?php for ($i = 0; $i < 9; $i++): ?>
                <?php if ($board[$i] === '' && $winner === '' && !$draw): ?>
                    <a href="index5.php?cell=<?php echo $i; ?>" class="cell"></a>
                <?php else: ?>
                    <div class="cell"><?php echo $board[$i]; ?></div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <div class="restart-block">
            <a href="index5.php?reset=1" class="restart-link">Перезапустити гру</a>
        </div>
    </div>
</main>

</body>
</html>