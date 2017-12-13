2017-11-15 20:20:32 Route not found in file /var/www/RESTful-API-PHP/bootstrap/app.php on line 13 \n #0 /var/www/RESTful-API-PHP/init.php(10): require_once()
#1 /var/www/RESTful-API-PHP/public/index.php(17): require('/var/www/RESTfu...')
#2 {main} 
 2017-11-15 20:20:32 Route not found in file /var/www/RESTful-API-PHP/bootstrap/app.php on line 13 \n #0 /var/www/RESTful-API-PHP/init.php(10): require_once()
#1 /var/www/RESTful-API-PHP/public/index.php(17): require('/var/www/RESTfu...')
#2 {main} 
 2017-11-15 20:27:29 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('alter table pos...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:30:42 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('alter table pos...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:32:56 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('alter table pos...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:58:05 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned auto_increment primary_key, body varchar(255))' at line 1 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:58:28 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned auto_increment primary key,
         body varchar(255))' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:58:46 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned auto_increment primary key,
         body varchar(250))' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:58:59 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned auto_increment primary key,
         body varchar(250))' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 20:59:15 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key references comments(id),
        tag_id integer unsigned foreign key' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:00:16 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key(comment_id) references comments(id),
        tag_id integer unsigned' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:00:34 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key references tags(id),
        foreign key(comment_id) references comm' at line 3 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:00:57 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key(comment_id) references comments(id))' at line 5 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:01:16 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:03:56 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned auto_increment primary key,
        body char(50))' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table ta...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:04:28 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key references comments(id),
        tag_id integer unsigned foreign key' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:05:59 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned foreign key references posts(id), 
        comments_id unsigned foreign' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:06:47 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'unsigned, 
        comments_id unsigned,
        foreign key(post_id) references' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:07:18 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key references posts(id), 
        comments_id integer unsigned foreign ' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:08:15 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near '' at line 5 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:08:43 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near '' at line 5 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:08:55 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near '' at line 4 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:09:06 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near '' at line 3 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:09:28 Sqlstate[42000]: syntax error or access violation: 1072 key column 'comment_id' doesn't exist in table in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:09:40 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:11:24 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:13:51 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'foreign key references users(id),
    post_id integer(10) unsigned foreign key r' at line 2 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:15:56 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near '
    foreign key(user_id) references users(id),
    foreign key references posts' at line 5 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:16:11 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'references posts_body(id))' at line 7 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:16:25 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near 'references posts(id))' at line 7 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:17:07 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:17:23 Sqlstate[hy000]: general error: 1215 cannot add foreign key constraint in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table po...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:23:31 Sqlstate[42000]: syntax error or access violation: 1064 you have an error in your sql syntax; check the manual that corresponds to your mysql server version for the right syntax to use near '
        created_at timestamp default current_timestamp on update current_timest' at line 5 in file /var/www/RESTful-API-PHP/App/Services/DB/DB.php on line 60 \n #0 /var/www/RESTful-API-PHP/App/Services/Console/Commands/Commands.php(22): App\Services\DB\DB::exec('create table co...')
#1 /var/www/RESTful-API-PHP/api_cli(23): App\Services\Console\Commands\Commands->migrate()
#2 {main} 
 2017-11-15 21:51:22 Route not found in file /var/www/RESTful-API-PHP/bootstrap/app.php on line 13 \n #0 /var/www/RESTful-API-PHP/init.php(10): require_once()
#1 /var/www/RESTful-API-PHP/public/index.php(17): require('/var/www/RESTfu...')
#2 {main} 
 2017-11-15 22:05:25 call_user_func_array() expects parameter 2 to be array, string given in file /var/www/RESTful-API-PHP/App/Services/Route/Route.php on line 135 
