<?php

return 'create table if not EXISTS comments (
        id integer unsigned auto_increment primary key,
        body varchar(255),
        created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);';