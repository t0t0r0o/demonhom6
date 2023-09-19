CREATE DATABASE info_user ;
CREATE TABLE users (
    id INT UNSIGNED PRIMARY KEY,
    username VARCHAR(60) NOT NULL,
    password VARCHAR(60) NOT NULL,
    hoten VARCHAR(60) NOT NULL,
    ngaysinh DATE NOT NULL,
    email VARCHAR(60),
    role ENUM('user', 'admin') DEFAULT 'user',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (id,username, password, hoten, ngaysinh, email)
VALUES (0,'admin', 'adminn@1287', 'admin_idor', '2020-02-02', 'flag_idor_oke!!!');
INSERT INTO users (id,username, password, hoten, ngaysinh, email)
VALUES (1,'john_doe', 'password@123', 'John Doe', '1990-05-15', 'john@gmail.com');
INSERT INTO users (id,username, password, hoten, ngaysinh, email)
VALUES (2,'viet_tran', 'password@viet', 'Viet Tran', '2002-04-21', 'viettran@gmail.com');
INSERT INTO users (id,username, password, hoten, ngaysinh, email)
VALUES (3,'ha_chinh', 'password@chinh', 'Xuan Chinh', '2002-08-1', 'chinh1403@gmail.com');
INSERT INTO users (id,username, password, hoten, ngaysinh, email)
VALUES (4,'idor123', 'password@idor', 'idor', '2023-08-17', 'f14g_1D0R_N4Y_K0_PH41');
INSERT INTO users (id,username, password, hoten, ngaysinh, email,role)
VALUES (5,'admin2020','adminn@1287', 'admin', '2023-08-17', 'acountadmin@gmail.com','admin');
INSERT INTO users (id,username, password, hoten, ngaysinh, email)
VALUES (6,'john_doe1', 'password@123', 'John Doe1', '1990-05-15', 'john1@gmail.com');
