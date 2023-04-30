INSERT INTO `products`(`name`, `gender`, `size`, `quantity`, `price`, `picture`) VALUES ('Nike Air Jordan 1 Retro', 'Male', 42, 15, 149.99, 'assets/images/products/nike_2.jpg');

CREATE TABLE cart(
	id INTEGER AUTO_INCREMENT,
    user_id INTEGER,
    product_id INTEGER,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id),
    PRIMARY KEY (id)
);