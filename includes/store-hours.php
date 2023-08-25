<?php
    // REQUIRED
    // Set your default time zone (listed here: http://php.net/manual/en/timezones.php)
    date_default_timezone_set('Europe/Vienna');
    // Include the store hours class
    require __DIR__ . '/StoreHours.class.php';

    // REQUIRED
    // Define daily open hours
    // Must be in 24-hour format, separated by dash
    // If closed for the day, leave blank (ex. sunday)
    // If open multiple times in one day, enter time ranges separated by a comma
    $hours = array(
        'mon' => array(''),
        'tue' => array('12:00-23:00'),
        'wed' => array('12:00-23:00'),
        'thu' => array('12:00-23:00'),
        'fri' => array('12:00-24:00'),
        'sat' => array('12:00-24:00'),
        'sun' => array('10:00-24:00')
    );

    // OPTIONAL
    // Add exceptions (great for holidays etc.)
    // MUST be in a format month/day[/year] or [year-]month-day
    // Do not include the year if the exception repeats annually
    $exceptions = array(
        '12/25'  => array(''),
        '01/01' => array('')
    );

    $config = array(
        'separator'      => ' - ',
        'join'           => ' and ',
        'format'         => 'g:ia',
        'overview_weekdays'  => array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun')
    );

    // Instantiate class
    $store_hours = new StoreHours($hours, $exceptions, $config);
    
    // Display open / closed message
    if($store_hours->is_open()) {
        echo "<strong class='open'>Yes, we're open right now!</strong>";
    } else {
        echo "<strong class='closed'>Sorry, we're closed right now.</strong>";
    }

    ?>
