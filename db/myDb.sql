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
    item_name VARCHAR(255) NOT NULL,
    activity_name_id integer REFERENCES activity(activity_id),
    person_name_id integer REFERENCES person(person_id),
    location_name_id integer REFERENCES location(location_id)
);

CREATE TABLE location (
    location_id serial PRIMARY KEY,
    item_location VARCHAR(255) NOT NULL
 );


--test query for merritt
SELECT 
    item_name, person_name_id, activity_name_id, location_name_id
FROM 
    items
WHERE ((person_name_id = 2) OR (person_name_id = 5) or (person_name_id = 8))
AND  ((activity_name_id = 3) OR (activity_name_id = 4))
ORDER BY location_name_id;

--test query for kids
SELECT 
    item_name, person_name_id, activity_name_id, location_name_id
FROM 
    items
WHERE ((person_name_id = 3) OR (person_name_id = 5) or (person_name_id = 7))
AND  ((activity_name_id = 1) OR (activity_name_id = 4))
ORDER BY location_name_id;
    

--test join
-- SELECT * FROM items, person, activity
-- WHERE items.activity_name_id = activity.activity_id AND items.person_name_id = person.person_id;

INSERT INTO items (item_name, person_name_id, activity_name_id, location_name_id) 
VALUES 
    ('Hydration packs', 5, 3, 2);

