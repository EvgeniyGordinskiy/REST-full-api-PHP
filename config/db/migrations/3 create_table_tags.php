<?php

return 'create table if not EXISTS tags (
        id integer unsigned auto_increment primary key,
        body char(50),
        created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';