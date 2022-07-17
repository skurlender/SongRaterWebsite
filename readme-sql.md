# Booting Up XAMPP

The first step to install XAMPP, start the services, enable the networks, and start the program. This will allow you to access the local host.

# Creating Our Tables

First, run this code to create a table called 'artists', with song and artist features that consist only of characters. It will then insert the three songs and artists into the table.

```
CREATE TABLE `artists` (
  `song` VARCHAR(255) NOT NULL ,
  `artist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `artists` (`song`, `artist`) VALUES
('Days of Wine and Roses', 'Bill Evans'),
('Freeway', 'Aimee Mann'),
('These Walls', 'Kendrick Lamar');
```


Run this code to create a table called 'users', with a username feature that both consists of characters and a password feature that consists of text. It will then insert the two users and associated passwords into the table.


```
CREATE TABLE `users` (
  `username` VARCHAR(255) NOT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`username`, `password`) VALUES
('Amelia-Earhart', 'Youaom139&yu7'),
('Otto', 'StarWars2*');
```

This code will make the last table that we need. Run this code to create a table called 'ratings', with an id feature that is an integer, a rating feature that's also an integer, and username and song features that both consist of characters. It will then insert the four user ratings into the table.

```
CREATE TABLE `ratings`
 (
    `id` int(1) NOT NULL,
    `username` VARCHAR(255) NOT NULL ,
    `song` VARCHAR(255) NOT NULL ,
    `rating` int(1) NOT NULL,
    FOREIGN KEY (`username`)
     REFERENCES `users`(`username`)
     ON DELETE CASCADE ,
    FOREIGN KEY (`song`)
     REFERENCES `artists`(`song`)
     ON DELETE CASCADE
 ) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ratings` (`id`, `username`, `song`, `rating`) VALUES
(1, 'Amelia-Earhart', 'Freeway', 3),
(2, 'Amelia-Earhart', 'Days of Wine and Roses', 4),
(3, 'Otto', 'Days of Wine and Roses', 5),
(4, 'Amelia-Earhart', 'These Walls', 4);
```

Lastly, every SQL table requires a primary key. Run this code to make the song feature the artists table's primary key, the id feature the ratings table's primary key, and username the users table's primary key.

```
ALTER TABLE `artists`
  ADD PRIMARY KEY (`song`);

ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
```