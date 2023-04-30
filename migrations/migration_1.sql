INSERT INTO users(emri, mbiemri, email, password) VALUES ('user', 'username', 'user@user.com', '$2y$10$nhEEgeCw5lwvQY2xOf4iiO8GzMaolrKliQN6yd0yctAIiVVneVyAi')

ALTER TABLE `products` ADD COLUMN picture VARCHAR(512) AFTER `price`;
INSERT INTO `products`(`name`, `gender`, `size`, `quantity`, `price`, `picture`) VALUES ('Dr. Martens Classic', 'Female', 38, 10, 119.99, 'assets/images/products/boots_1.jpg');
INSERT INTO `products`(`name`, `gender`, `size`, `quantity`, `price`, `picture`) VALUES ('Nike Sneaker', 'Female', 39, 14, 69.99, 'assets/images/products/nike_1.jpg');
INSERT INTO `products`(`name`, `gender`, `size`, `quantity`, `price`, `picture`) VALUES ('Vans High Tops', 'Female', 37, 9, 99.99, 'assets/images/products/vans_1.jpg');

