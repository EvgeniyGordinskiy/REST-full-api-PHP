<?php

return
    'create table posts_article (
    id INTEGER auto_increment  primary key,
    user_id INTEGER(10) UNSIGNED,
    post_id INTEGER(10) UNSIGNED,
    article char(100),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';