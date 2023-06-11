<!-- 1.Explain what Laravel's query builder is and how it provides a simple and elegant way to interact with databases. -->
Laravel's query builder is a powerful feature that provides a convenient and expressive way to interact with databases in Laravel applications. It allows you to build and execute database queries using a fluent, chainable interface, making it easier to retrieve, insert, update, and delete records from a database.

The query builder abstracts the underlying database system, allowing you to write database-agnostic code. It supports various database engines such as MySQL, PostgreSQL, SQLite, and SQL Server, among others. This means you can write queries using the query builder syntax, and Laravel will handle the translation of those queries into the appropriate SQL statements for the selected database system.

The query builder offers a wide range of methods that enable you to construct complex queries with ease. You can specify conditions, join multiple tables, group and order results, limit and offset records, and perform aggregate functions, among other operations. The fluent interface allows you to chain methods together, making the query code more readable and concise.


Laravel's query builder is a powerful feature that provides a convenient and expressive way to interact with databases in Laravel applications. It allows you to build and execute database queries using a fluent, chainable interface, making it easier to retrieve, insert, update, and delete records from a database.

The query builder abstracts the underlying database system, allowing you to write database-agnostic code. It supports various database engines such as MySQL, PostgreSQL, SQLite, and SQL Server, among others. This means you can write queries using the query builder syntax, and Laravel will handle the translation of those queries into the appropriate SQL statements for the selected database system.

The query builder offers a wide range of methods that enable you to construct complex queries with ease. You can specify conditions, join multiple tables, group and order results, limit and offset records, and perform aggregate functions, among other operations. The fluent interface allows you to chain methods together, making the query code more readable and concise.

Here's an example to illustrate the simplicity and elegance of the query builder:

$users = DB::table('users')
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();


<!-- 2.Write the code to retrieve the "excerpt" and "description" columns from the "posts" table using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable. -->

$posts = DB::table('posts')
            ->select('excerpt', 'description')
            ->get();

print_r($posts);

<!-- 3.Describe the purpose of the distinct() method in Laravel's query builder. How is it used in conjunction with the select() method? -->

$distinctUserRoles = DB::table('users')
                        ->select('name', 'role')
                        ->distinct()
                        ->get();

4.Write the code to retrieve the first record from the "posts" table where the "id" is 2 using Laravel's query builder. Store the result in the $posts variable. Print the "description" column of the $posts variable

$posts = DB::table('posts')
            ->where('id', 2)
            ->first();

if ($posts) {
    echo $posts->description;
} else {
    echo "No post found.";
}

<!-- 5.Write the code to retrieve the "description" column from the "posts" table where the "id" is 2 using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable. -->

$posts = DB::table('posts')
            ->where('id', 2)
            ->pluck('description');

print_r($posts);

<!-- 6.Explain the difference between the first() and find() methods in Laravel's query builder. How are they used to retrieve single records? -->

In Laravel's query builder, both the first() and find() methods are used to retrieve a single record from a database table. However, they differ in how they determine which record to fetch.

The first() method is typically used when you want to retrieve the first record that matches the specified conditions. It returns the first matching record based on the order defined in the query. If no records match the conditions, it returns null. Here's an example:

    $firstPost = DB::table('posts')
                ->where('published', true)
                ->orderBy('created_at')
                ->first();
In this example, we query the "posts" table and use the where() method to specify the condition that the "published" column should be true. The orderBy() method is used to sort the results by the "created_at" column in ascending order. The first() method retrieves the first record that matches the condition and returns it.

On the other hand, the find() method is used when you want to retrieve a record by its primary key. It expects a single argument, which is the value of the primary key column. It returns the record with the matching primary key value or null if no record is found. Here's an example:
    
    $foundPost = DB::table('posts')->find(2);


<!-- 7.Write the code to retrieve the "title" column from the "posts" table using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable. -->

use Illuminate\Support\Facades\DB;

$posts = DB::table('posts')->pluck('title');

dd($posts);

<!-- 8.Write the code to insert a new record into the "posts" table using Laravel's query builder. Set the "title" and "slug" columns to 'X', and the "excerpt" and "description" columns to 'excerpt' and 'description', respectively. Set the "is_published" column to true and the "min_to_read" column to 2. Print the result of the insert operation. -->

use Illuminate\Support\Facades\DB;

$result = DB::table('posts')->insert([
    'title' => 'X',
    'slug' => 'X',
    'excerpt' => 'excerpt',
    'description' => 'description',
    'is_published' => true,
    'min_to_read' => 2,
]);

dd($result);

<!-- 9.Write the code to update the "excerpt" and "description" columns of the record with the "id" of 2 in the "posts" table using Laravel's query builder. Set the new values to 'Laravel 10'. Print the number of affected rows. -->

use Illuminate\Support\Facades\DB;

$affectedRows = DB::table('posts')
    ->where('id', 2)
    ->update([
        'excerpt' => 'Laravel 10',
        'description' => 'Laravel 10',
    ]);

echo "Number of affected rows: " . $affectedRows;

<!-- 10.Write the code to delete the record with the "id" of 3 from the "posts" table using Laravel's query builder. Print the number of affected rows. -->

use Illuminate\Support\Facades\DB;

$affectedRows = DB::table('posts')
    ->where('id', 3)
    ->delete();

echo "Number of affected rows: " . $affectedRows;

<!-- 11.Explain the purpose and usage of the aggregate methods count(), sum(), avg(), max(), and min() in Laravel's query builder. Provide an example of each. -->

$totalPosts = DB::table('posts')->count();
echo "Total posts: " . $totalPosts;

$totalAmount = DB::table('orders')->sum('amount');
echo "Total amount: " . $totalAmount;

$averageRating = DB::table('reviews')->avg('rating');
echo "Average rating: " . $averageRating;

$highestPrice = DB::table('products')->max('price');
echo "Highest price: " . $highestPrice;

$lowestStock = DB::table('products')->min('stock');
echo "Lowest stock: " . $lowestStock;

<!-- 12.Describe how the whereNot() method is used in Laravel's query builder. Provide an example of its usage. -->

$users = DB::table('users')
    ->whereNot('status', 'active')
    ->get();

<!-- 13.Explain the difference between the exists() and doesntExist() methods in Laravel's query builder. How are they used to check the existence of records? -->

$hasActiveUsers = DB::table('users')
    ->where('status', 'active')
    ->exists();

if ($hasActiveUsers) {
    echo "There are active users.";
} else {
    echo "No active users found.";
}


$noDeletedUsers = DB::table('users')
    ->where('is_deleted', true)
    ->doesntExist();

if ($noDeletedUsers) {
    echo "No deleted users found.";
} else {
    echo "There are deleted users.";
}


<!-- 14.Write the code to retrieve records from the "posts" table where the "min_to_read" column is between 1 and 5 using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable. -->


$posts = DB::table('posts')
    ->whereBetween('min_to_read', [1, 5])
    ->get();

dd($posts);


<!-- 15.Write the code to increment the "min_to_read" column value of the record with the "id" of 3 in the "posts" table by 1 using Laravel's query builder. Print the number of affected rows. -->

$affectedRows = DB::table('posts')
    ->where('id', 3)
    ->increment('min_to_read');

echo "Number of affected rows: " . $affectedRows;