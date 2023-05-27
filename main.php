<?php

// Data set.
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

/**
 * Approach 1 - Nested Loops.
 * Simply loop through the candidate data, nest a loop for the developer data and make a comparison.
 * The complexity in this approach will lead to performance issues with a large dataset.
 * Time Complexity: O(n*m)
 * Space Complexity: O(1)
 */
function nestedLoop(array $candidates, array $developers): array
{
    foreach ($candidates as $candidate) {
        foreach ($developers as $key => $developer) {
            if ($developer['email'] == $candidate['email']) {
                $developers[$key]['id'] = $candidate['id'];
            }
        }
    }

    return $developers;
}

/**
 * Appraoch 2 - Lookup array
 * Create new array which maps candidate ids to email address.
 * We can then compare developers against this new array to determine id
 * Time Complexity: O(m+n)
 * Space Complexity: O(m)
 */
function lookupArray(array $candidates, array $developers): array 
{
    $candidateIdKeyedByEmail = [];

    foreach ($candidates as $candidate) {
        $candidateIdKeyedByEmail[$candidate['email']] = $candidate['id'];
    }

    foreach ($developers as $key => $developer) {
        if (isset($candidateIdKeyedByEmail[$developer['email']])) {
            $developers[$key]['id'] = $candidateIdKeyedByEmail[$developer['email']];    
        }
    }

    return $developers;
}

echo "Developers with ids: \n";
print_r(binarySearch($candidates, $developers));