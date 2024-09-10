<?php

/**
 * /docker/sybase/init.sql
 *
 * TABLE:
 *
 * create table tbl_string(
 * id        int            null,
 * name    varchar(600)    null,
 * note    text            null
 * )
 *
 * DATA:
 * insert into tbl_string (id,name,note) values (1,'paviel', 'note note note')
 */

echo "<pre>";
// PDO ODBC
try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $pdoOdbc = new PDO('odbc:Driver={CustomDriver};Server=sybase;Port=5000','sa','myPassword', $options);

    $res = $pdoOdbc->query('exec proc_string')->fetchAll();
    var_dump($res); // name + note are null

    $res2 = $pdoOdbc->query("select * from tbl_string")->fetchAll();
    var_dump($res2); // name + note are null
} catch (Exception $e) {
    var_dump($e->getMessage());
}


// PDO DBLIB
try {
    $pdoDblib = new PDO('dblib:version=10.0;host=sybase:5000', 'sa', 'myPassword');
    $pdoDblib->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $res = $pdoDblib->query('exec proc_string')->fetchAll();
    var_dump($res); // name + note contains values

    $res2 = $pdoDblib->query("select * from tbl_string")->fetchAll();
    var_dump($res2); // name + note contains values
} catch (Exception $e) {
    var_dump($e->getMessage());
}

echo "</pre>";

