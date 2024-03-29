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
SELECT item_name, person_name_id, activity_name_id, location_name_id, item_location
FROM location
LEFT JOIN items
ON (location_id = location_name_id)
WHERE ((person_name_id = 3) OR (person_name_id = 5) or (person_name_id = 7))
AND  ((activity_name_id = 1) OR (activity_name_id = 4))
ORDER BY location_name_id;

SELECT items.item_name, items.person_name_id, items.activity_name_id, items.location_name_id, location.item_location
FROM location
LEFT JOIN items
ON (location.location_id = items.location_name_id)
WHERE ((items.person_name_id = 3) OR (items.person_name_id = 7) or (items.person_name_id = 5))
AND  ((items.activity_name_id = 1) OR (items.activity_name_id = 4))
ORDER BY items.location_name_id;


INSERT INTO items (item_name, person_name_id, activity_name_id, location_name_id) 
VALUES 
    ('Hydration packs', 5, 3, 2);
	
	
SELECT item_name, first_name, activity_name
FROM items inner join person on person_name_id = person_id
inner join activity on activity_name_id = activity_id
WHERE item_name LIKE 'Test%';

--Test update
UPDATE items
SET 
item_name = '$new_item_name',
person_name_id = (SELECT person_id FROM person WHERE first_name = '$name'),
activity_name_id = (SELECT activity_id FROM activity WHERE activity_name = '$activity'),
location_name_id = (SELECT location_id FROM location WHERE item_location = '$location')
WHERE item_id = '$item_id'

