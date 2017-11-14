<?php

return	'
        create table if not EXISTS users 
        ( 
            id INTEGER auto_increment PRIMARY KEY,
            name CHAR(100),
            email CHAR(100) UNIQUE,
            password CHAR(100),
            verified TINYINT,
            token VARCHAR(255),
            rememberToken VARCHAR(255),
            created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
            updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';