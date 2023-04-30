CREATE TABLE orders(
	id INTEGER NOT NULL AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    arrival_date TIMESTAMP DEFAULT DATE_ADD(order_date, INTERVAL 3 DAY),
    address VARCHAR(70) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);


CREATE TABLE product_list(
	id INTEGER AUTO_INCREMENT,
    order_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE VIEW orders_view AS
SELECT orders.id, orders.user_id, orders.order_date, orders.arrival_date, orders.address, product_list.product_id FROM orders
INNER JOIN product_list
ON orders.id = product_list.order_id;