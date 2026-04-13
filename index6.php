<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style6.css">

    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/daypilot-all.min.js" type="text/javascript"></script>
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
            <a href="index5.php">Lab 5</a>
            <a href="index6.php" class="active">Lab 6</a>
            <a href="index7.html">Lab 7</a>
        </nav>
    </div>
</header>

<header class="page-header">
    <div class="page-header-box">
        <h1 id="logo">HTML5 Бронювання кімнат в готелі (JavaScript/PHP)</h1>
        <p id="claim">AJAX-календар застосунок з JavaScript/HTML5/jQuery</p>
    </div>
</header>

<main class="main-layout">
    <aside class="sidebar">
        <h2>Параметри</h2>

        <div class="filter-box">
            <label for="capacity">Місткість кімнати</label>
            <select id="capacity">
                <option value="all">Усі</option>
                <option value="1">1 місце</option>
                <option value="2">2 місця</option>
                <option value="4">4 місця</option>
            </select>
        </div>

        <div class="status-box">
            <h3>Стани кімнат</h3>
            <ul>
                <li><span class="mark ready"></span> Готова</li>
                <li><span class="mark cleanup"></span> Прибирання</li>
                <li><span class="mark dirty"></span> Брудна</li>
            </ul>
        </div>

        <div class="status-box">
            <h3>Статуси бронювання</h3>
            <ul>
                <li><span class="line new"></span> New</li>
                <li><span class="line confirmed"></span> Confirmed</li>
                <li><span class="line arrived"></span> Arrived</li>
                <li><span class="line checkedout"></span> Checked Out</li>
                <li><span class="line expired"></span> Expired</li>
            </ul>
        </div>
    </aside>

    <section class="content">
        <div class="content-box">
            <h2>Область планувальника</h2>
            <div id="nav">
                Тут буде розміщено календар бронювання кімнат.
            </div>
        </div>

        <div class="content-box">
            <h2>Постановка задачі</h2>
            <p>
                Метою роботи є підготовка основи веб-застосунку для резервування кімнат у готелі
                з використанням HTML5, CSS3, JavaScript, PHP та MySQL.
            </p>
            <p>
                Застосунок повинен відображати перелік кімнат, їх стан, статуси бронювання,
                підтримувати створення, редагування, видалення бронювань та роботу з даними через AJAX.
            </p>
            <p>
                У даній лабораторній роботі реалізовано базову структуру інтерфейсу та підготовлено
                структуру бази даних для подальшої розробки.
            </p>
        </div>
    </section>
</main>

<footer class="page-footer">
    <address>(с) Автор лабораторної роботи: студент спеціальності Робототехніка, Міцай Руслан</address>
</footer>

</body>
</html>