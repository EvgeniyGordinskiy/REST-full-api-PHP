<?php

return
    'create table if not EXISTS posts (
        id integer unsigned primary key auto_increment,
        body text,
        article char(100),
        created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';