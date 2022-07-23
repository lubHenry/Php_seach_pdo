# Php_search_pdo

This is to create a live search in PHP to filter database results. It lets the users enter the keyword, based on which the search is going to happen.

This code will display a single input field above the list of data from the database. The keyword search is applied to all the database columns to find a match.

It also displays paginated results. The search criteria will be kept alive during the pagination. The results count per page is from the application config.

It uses PDO to connect the MySQL database to fetch results during the search and the pagination.
