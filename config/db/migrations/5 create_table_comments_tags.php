<?php

return 'create table if not EXISTS comments_tags (
        comment_id integer unsigned,
        tag_id integer unsigned,
        foreign key(tag_id) references tags(id),
        foreign key(comment_id) references comments(id),
        created_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);';