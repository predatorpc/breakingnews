<?php

// ����� ������� ����� admin � �������� admin � ���������
// ������������� sql ���� � ���� � ��������� breaking news
// predator_pc 09/2018

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=breakingnews',
    'username' => 'admin',
    'password' => 'admin',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
