<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Super Administrators
    |--------------------------------------------------------------------------
    |
    | Super Administrators are able to access all features regardless of
    | permissions assigned to their account. This is intentionally not managed
    | within the database due to security concerns. By default the user ID
    | 1 is classed as a super administrator.
    |
    | If you would like to add multiple super administrators then you must the
    | user ID to the array below. You can get the user ID from the users table.
    |
    | Example:
    |   1, 2, 3, 4
    |
    */

    'super_admins' => [
        1
    ],

    /*
    |--------------------------------------------------------------------------
    | Super Password
    |--------------------------------------------------------------------------
    |
    | The super password is a password that is used to access the functionality
    | to re-install the site, run custom database queries and more. This should
    | be kept secret and only the people who need it should have it.
    |
    | This is usually automatically set during the initial installation.
    |
    */

    'super_password' => env('READER_SUPER_PASSWORD', 'kEh7sg9W4WAExeBd*B*38eU*Mk9nm^92')

];