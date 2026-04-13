* {
    box-sizing: border-box;
}

.container {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

.site-header {
    background: #ffffff;
    border-bottom: 1px solid #bdbdbd;
}

.site-header .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    min-height: 72px;
}

.site-title {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
    color: #111;
}

.menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 10px;
}

.menu a {
    display: inline-block;
    padding: 8px 12px;
    color: #111;
    text-decoration: none;
    border: 1px solid transparent;
    font-size: 14px;
    transition: 0.2s;
}

.menu a:hover,
.menu a.active {
    border-color: #111;
    background: #f5f5f5;
}

@media (max-width: 768px) {
    .site-header .container {
        flex-direction: column;
        align-items: flex-start;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .menu {
        justify-content: flex-start;
    }
}