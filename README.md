# Perfomance At Scale Code Task (30min time limit)

## Description
We have a data set consisting of candidates and developers.

```php
$candidates = [
    [
        'id' => 1,
        'name' => 'John Dorian',
        'email' => 'jd@yahoo.com',
    ],
    [
        'id' => 2,
        'name' => 'Chris Turk',
        'email' => 'chris.turk@gmail.com',
    ],
    [
        'id' => 3,
        'name' => 'Elliot Reed',
        'email' => 'elliot.reed@gmail.com',
    ],
];
$developers = [
    [
        'name' => 'John Dorian',
        'email' => 'john.dorian@yahoo.com',
    ],
    [
        'name' => 'Chris Turk',
        'email' => 'chris.turk@gmail.com',
    ],
    [
        'name' => 'Elliot Reed',
        'email' => 'elliot.reed@gmail.com',
    ],
];
```

## Goal
Write a script to match candidate ids to developers. Assume this code will run against a dataset of millions of rows of data so performace at scale is key.

## My solution
I have included two functions which can be used to achieve the goal of this task. The DocBlocks demonstrate the difference in complexity between the two approaches represented by Big O notation.

For performance the script uses the user defined function `lookupArray`. The function uses associative arrays to create a lookup table using developers' email addresses and the candidate ids. This allows for efficient lookup without nested loops, resulting in better performance, especially for larger datasets. 

NB: The first record does not have a matching candidate to get a candidate id.

```
$ php main.php 
Developers with ids: 
Array
(
    [0] => Array
        (
            [name] => John Dorian
            [email] => john.dorian@yahoo.com
        )

    [1] => Array
        (
            [name] => Chris Turk
            [email] => chris.turk@gmail.com
            [id] => 2
        )

    [2] => Array
        (
            [name] => Elliot Reed
            [email] => elliot.reed@gmail.com
            [id] => 3
        )

)
```