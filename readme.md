#  Тестовое задание на PHP + JS + MySQL  

Это приложение реализует:
- HTTP API для добавления и получения списка товаров
- Валидацию данных
- Хранение товаров в MySQL
- UI на чистом HTML + CSS + JS
- Адаптивную верстку в стиле макета

## 📦 Что внутри

- PHP 8.2 (через Apache)
- MySQL 8
- phpMyAdmin
- Docker Compose

---

##  Как запустить на своей машине

### 1.  Склонировать репозиторий
```bash
git clone https://github.com/yourusername/php-product-test.git
cd php-product-test
```

### 2. Запустить Docker окружение
```bash
docker-compose up -d
```

### 3. Проверить
Открой в браузере:
- http://localhost:8800 — само приложение
- http://localhost:8081 — phpMyAdmin

### 4.  Данные для входа в phpMyAdmin
```
Login: root
Password: root
```

---

##  Структура проекта

```
project/
│
├── public/                # index.php и статика
├── classes/                   # PHP-классы
│   ├── Product.php
│   ├── Validator.php
│   ├── Database.php
│   └── ProductRepository.php
│
├── docker-compose.yml
├── Dockerfile
├── init.sql              # SQL для создания таблицы
└── README.md
```

---

##  Структура таблицы `products`
```sql
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  date_time DATETIME NOT NULL
);
```

---

##  API

### POST `/api.php`
Добавление товара

```json
{
  "title": "Headphones",
  "price": "10.00",
  "dateTime": "11.01.2021 10:00:00"
}
```

Ответ:
```json
{
  "status": "success",
  "products": [ ... ]
}
```

### GET `/api.php`
Получение всех товаров (отсортированных по времени)

Ответ:
```json
{
  "status": "success",
  "products": [
    {
      "id": 1,
      "title": "Headphones",
      "price": "10.00",
      "date_time": "2021-01-11 10:00:00"
    }
  ]
}
```

---

##  Готово
После запуска ты сможешь открыть форму, добавлять товары и просматривать их список.
