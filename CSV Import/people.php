<?php
$people = [];

$handle = fopen('people.csv', 'r');
$csv_header_columns = fgetcsv($handle);

if ( $handle ) {
    while ( $row = fgetcsv($handle, 1000, ',' ) ) {
        $people[] = $row;
    }
}

fclose($handle);
?>

<table>
    <?php foreach ( $csv_header_columns as $column ) : ?>
        <th><?php echo $column; ?></th>
    <?php endforeach; ?>

    <?php foreach ( $people as $person ) : ?>
        <tr>
            <?php foreach ( $person as $person_detail) : ?>
                <td><?php echo $person_detail; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

