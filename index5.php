<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style4.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<header class="site-header">
    <div class="container">
        <h1 class="site-title">BLOG</h1>

        <nav class="menu">
            <a href="index.html">Lab 1</a>
            <a href="index2.html">Lab 2</a>
            <a href="index3.html">Lab 3</a>
            <a href="index4.html" class="active">Lab 4</a>
            <a href="index5.php">Lab 5</a>
            <a href="index6.php">Lab 6</a>
            <a href="index7.html">Lab 7</a>
        </nav>
    </div>
</header>

<main class="lab-page">
    <div class="game-wrapper">
        <h2>Гра: знайди числа по порядку</h2>

        <div class="info-panel">
            <div class="info-box">Рівень: <span id="level">3 x 3</span></div>
            <div class="info-box">Наступне число: <span id="next-number">1</span></div>
            <div class="info-box">Час: <span id="timer">15</span> c</div>
        </div>

        <div id="message">Натискай числа по порядку, починаючи з 1</div>

        <div id="game">
            <table class="field"></table>
        </div>

        <div class="buttons">
            <button id="restart-btn">Почати спочатку</button>
        </div>
    </div>
</main>

<script>
$(function () {
    var startSize = 3;
    var startTime = 15;
    var currentSize = startSize;
    var currentTarget = 1;
    var timeLeft = startTime;
    var timerId = null;

    function randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';

        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
    }

    function createArr(from, to) {
        var arr = [];

        for (var i = from; i <= to; i++) {
            arr.push(i);
        }

        arr.sort(function () {
            return Math.random() - 0.5;
        });

        return arr;
    }

    function updateInfo() {
        $('#level').text(currentSize + ' x ' + currentSize);
        $('#next-number').text(currentTarget);
        $('#timer').text(timeLeft);
    }

    function setMessage(text) {
        $('#message').text(text);
    }

    function createCells(size, elem, arr) {
        elem.html(function () {
            var content = '';
            var index = 0;

            for (var i = 0; i < size; i++) {
                content += '<tr>';

                for (var j = 0; j < size; j++) {
                    var fontSize = randomInt(18, 36);
                    var color = getRandomColor();

                    content += '<td style="font-size:' + fontSize + 'px; color:' + color + ';">' + arr[index] + '</td>';
                    index++;
                }

                content += '</tr>';
            }

            return content;
        });
    }

    function drawGameFields(size) {
        var field = $('.field');
        var from = 1;
        var to = Math.pow(size, 2);
        var arr = createArr(from, to);

        createCells(size, field, arr);
    }

    function stopTimer() {
        clearInterval(timerId);
        timerId = null;
    }

    function startTimer() {
        stopTimer();
        timeLeft = startTime + (currentSize - startSize) * 3;
        $('#timer').text(timeLeft);

        timerId = setInterval(function () {
            timeLeft--;
            $('#timer').text(timeLeft);

            if (timeLeft <= 0) {
                stopTimer();
                alert('Час вийшов! Починаємо спочатку.');
                currentSize = startSize;
                newGame(currentSize);
            }
        }, 1000);
    }

    function bindClicks(size) {
        $('.field td').click(function () {
            if ($(this).hasClass('active')) {
                return;
            }

            if (Number($(this).text()) === currentTarget) {
                $(this).addClass('active');

                if (currentTarget === size * size) {
                    stopTimer();
                    alert('Вітаємо! Рівень пройдено.');
                    currentSize++;
                    newGame(currentSize);
                } else {
                    currentTarget++;
                    updateInfo();
                    setMessage('Правильно! Шукай число ' + currentTarget);
                }
            } else {
                stopTimer();
                alert('Упс! Помилка. Починаємо спочатку.');
                currentSize = startSize;
                newGame(currentSize);
            }
        });
    }

    function newGame(size) {
        currentSize = size;
        currentTarget = 1;

        drawGameFields(size);
        updateInfo();
        setMessage('Натискай числа по порядку, починаючи з 1');
        bindClicks(size);
        startTimer();
    }

    $('#restart-btn').click(function () {
        stopTimer();
        currentSize = startSize;
        newGame(currentSize);
    });

    newGame(startSize);
});
</script>

</body>
</html>