<?php
return [
  'database' => [
    'host' => '89.203.249.208',
    'port' => '',
    'charset' => NULL,
    'dbname' => 'espoCRM',
    'user' => 'lupee',
    'password' => 'm1i2s3a4',
    'platform' => 'Mysql'
  ],
  'smtpPassword' => '',
  'logger' => [
    'path' => 'data/logs/espo.log',
    'level' => 'WARNING',
    'rotation' => true,
    'maxFileNumber' => 30,
    'printTrace' => false
  ],
  'restrictedMode' => false,
  'cleanupAppLog' => true,
  'cleanupAppLogPeriod' => '30 days',
  'webSocketMessager' => 'ZeroMQ',
  'clientSecurityHeadersDisabled' => false,
  'clientCspDisabled' => false,
  'clientCspScriptSourceList' => [
    0 => 'https://maps.googleapis.com'
  ],
  'adminUpgradeDisabled' => false,
  'isInstalled' => true,
  'microtimeInternal' => 1721666816.750386,
  'passwordSalt' => '2525da87a85bc24a',
  'cryptKey' => '724e61ef792325da7c0f3f04e74f31a1',
  'hashSecretKey' => '1989e270fe3a85b6e3ed1b94fd12f9c6',
  'defaultPermissions' => [
    'user' => 33,
    'group' => 33
  ],
  'actualDatabaseType' => 'mariadb',
  'actualDatabaseVersion' => '10.5.23',
  'instanceId' => '685d330a-db4f-4323-9e1c-0f98b366a6dc'
];
