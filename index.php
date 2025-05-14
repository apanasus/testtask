<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Center</title>
    <link rel="stylesheet" href="assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo">STOCK <br> CENTER</div>
        <nav class="menu">
            <span class="burger-menu">&#9776;</span>
        </nav>
    </div>

    <h1>Items in stock</h1>

    <table id="productTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price, USD</th>
            <th>Date and time</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

<button id="openModal" class="full-width">New item</button>


    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>New item</h2>
            <form id="productForm">
                <label>Title</label>
                <input type="text" id="title" placeholder="Title">
                <div class="error" id="error-title"></div>

                <label>Price</label>
                <input type="text" id="price" placeholder="Price (e.g. 10.00)">
                <div class="error" id="error-price"></div>

                <label>Date and time</label>
                <input type="text" id="dateTime" placeholder="dd.mm.yyyy hh:mm:ss">
                <div class="error" id="error-dateTime"></div>

                <div class="modal-buttons">
                    <button type="button" class="close-btn">Close</button>
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/script.js"></script>
</body>
</html>
