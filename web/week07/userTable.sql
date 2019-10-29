CREATE TABLE userlogin (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL
);

INSERT INTO userlogin (username, user_password) VALUES (:username, :user_password);