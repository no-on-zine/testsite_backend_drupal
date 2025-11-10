<?php

$databases = [];

// 環境変数から取得（Render）
$env_db_host = getenv('DB_HOST');
$env_db_name = getenv('DB_NAME');
$env_db_user = getenv('DB_USER');
$env_db_password = getenv('DB_PASSWORD');
$env_db_port = getenv('DB_PORT');

// ローカル環境用のフォールバック設定
$local_db_host = '127.0.0.1';
$local_db_name = 'drupal';
$local_db_user = 'drupal';
$local_db_password = 'drupal';
$local_db_port = '3306';

$databases['default']['default'] = [
  'database' => $env_db_name ?: $local_db_name,
  'username' => $env_db_user ?: $local_db_user,
  'password' => $env_db_password ?: $local_db_password,
  'host' => $env_db_host ?: $local_db_host,
  'port' => $env_db_port ?: $local_db_port,
  'driver' => 'mysql',
  'prefix' => '',
];

// Drupal の標準設定
$settings['hash_salt'] = 'put-a-unique-salt-here';

// ファイルパスの設定
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = '/var/www/private';
$settings['file_temporary_path'] = '/tmp';

// もし Render 上での HTTPS 経由アクセスなどの調整が必要ならここに追加
if (getenv('RENDER_EXTERNAL_URL')) {
  $settings['trusted_host_patterns'] = [
    '^' . preg_quote(parse_url(getenv('RENDER_EXTERNAL_URL'), PHP_URL_HOST)) . '$',
  ];
}

