# DBAL

Sometimes you have to deal with older PHP projects which 
need modernising. Unfortunately sometimes new packages can't be
used as you need to support features which have been removed,
or you refactor your codebase to use pdo.

This library allows you to use mysql functions in the same way as 
mysql_query and mysql_fetch_assoc, so you just need to create a 
"proxy function" in order to modernise your application. 
Have a look at example.php to get started.

