<?php

return
    'create table if not EXISTS posts_article (
    user_id INTEGER UNSIGNED,
    post_id INTEGER UNSIGNED,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key(user_id) references users(id),
    foreign key(post_id) references posts(id))';