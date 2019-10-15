CREATE TABLE person (
    person_id serial PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL
);

CREATE TABLE activity (
    activity_id serial PRIMARY KEY,
    activity_name VARCHAR(100) NOT NULL
);

CREATE TABLE items (
item_id serial PRIMARY KEY,
item_name VARCHAR(255) NOT NULL
person_name VARCHAR(50) REFERENCES person(first_name),
activity_name VARCHAR(100) REFERENCES activity(activity_name)
);


SELECT 
    item_name 
FROM 
    items 
WHERE 
    person_name = 'name' 
AND activity_name = 'activity';