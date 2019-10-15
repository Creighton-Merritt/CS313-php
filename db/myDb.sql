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
    activity_id VARCHAR(100) REFERENCES activity(activity_id),
    person_id VARCHAR(50) REFERENCES person(id)
);


--This seems unecessary
-- CREATE TABLE item_assign (
--     item_assign_id serial PRIMARY KEY,
--     item_name VARCHAR(255) REFERENCES items(item_name),
--     activity_name VARCHAR(100) REFERENCES activity(activity_name),
--     person_name VARCHAR(50) REFERENCES person(first_name)
-- );


--join tables to we pull person and item name from those tables based on person and activity id from items.
-- SELECT 
--     item_name 
-- FROM 
--     items
-- WHERE 
--     person_name = 'name' 
-- AND activity_name = 'activity';