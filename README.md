# Лабораторная работа №7: RabbitMQ + PHP + Docker

## 👩‍💻 Автор
ФИО: Лямичев Семён Яковлевич  
Группа: ПМИ2-ИП1

---

## 📌 Описание задания
1. Научиться работать с очередями сообщений RabbitMQ через PHP.
2. Реализовать асинхронную обработку данных с использованием producers и consumers.
3. Создать веб-интерфейс для отправки сообщений в очередь.
4. Настроить Docker-контейнеры: nginx, PHP-FPM, RabbitMQ.
5. Реализовать worker для асинхронной обработки сообщений.

Вариант: RabbitMQ (четный номер).

Результат доступен по адресу [http://localhost:8080](http://localhost:8080).

---

## ⚙️ Как запустить проект

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/WorkNFlow/RabbitMq-Kafka-Lab.git
   cd RabbitMq-Kafka-Lab
   ```
2. Запустить контейнеры:
   ```bash
   docker-compose up -d --build
   ```
3. Открыть в браузере:
   ```text
   http://localhost:8080
   ```
4. Открыть RabbitMQ Management Panel:
   ```text
   http://localhost:15672
   Логин: guest
   Пароль: guest
   ```
5. Запустить worker для обработки сообщений:
   ```bash
   docker exec -it lab7_php php worker.php
   ```

---

## 📂 Содержимое проекта

```text
docker-compose.yml  — описание сервисов nginx, php, rabbitmq
Dockerfile          — образ PHP-FPM с поддержкой RabbitMQ
nginx.conf          — конфигурация nginx
composer.json       — зависимости PHP (php-amqplib)
www/
  index.php         — главная страница с формой отправки
  send.php          — отправка данных в очередь RabbitMQ
  worker.php        — обработчик сообщений из очереди
  QueueManager.php  — класс для работы с RabbitMQ
  db.php            — подключение к базе данных
  Student.php       — класс для работы с данными
```

---

## ✅ Результат

Сервер в Docker успешно запущен. Реализована система асинхронной обработки сообщений через RabbitMQ: данные из веб-формы отправляются в очередь и обрабатываются worker'ом в фоновом режиме. Обработанные сообщения сохраняются в лог-файл и отображаются на главной странице.
