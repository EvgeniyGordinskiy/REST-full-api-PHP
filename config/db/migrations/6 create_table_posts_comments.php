<?php

return 'create table if not EXISTS posts_comments (
        post_id integer unsigned, 
        comment_id integer unsigned,
        foreign key(post_id) references posts(id),
        foreign key(comment_id) references comments(id),
        created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';