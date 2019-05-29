# DigitalOcean Spaces Storage Driver

This October CMS plugin allows you to use DigitalOcean Spaces as a filesystem on your installation.

## Requirements

To use DigitalOcean Spaces, you need to have a DigitalOcean account. You can get an account by signing up at [digitalocean.com](https://digitalocean.com). After creating a Space and Spaces Access Key, you will have access to your *Access Key ID* and *Secret Access Key* that lets you use the API. (https://developers.digitalocean.com/documentation/spaces/)

## Plugin Settings

The plugin is configured in your October CMS `filesystems.php` and `cms.php`.

### filesystems.php

Edit your `filesystems.php` to add a disk "backblaze" that uses the `do_spaces` driver:

```php
return [

  ...

  'disks' => [
    'digitalocean' => [
      'driver' => 'do_spaces',
      'key'    => 'XXXXXXXXXXXXXXXXXXXX',
      'secret' => 'xxxXxXX+XxxxxXXxXxxxxxxXxxXXXXXXXxxxX9Xx',
      'region' => '<space region>',
			'space'  => '<your space name>'
    ],
  ],

  ...

];
```

### cms.php

Edit your `cms.php` to configure the media manager to use your "digitalocean" disk:

```php
return [

  ...

  'storage' => [
    'media' => [
      'disk'   => 'digitalocean',
      'folder' => '',
      'path'   => 'https://<your space name>.<space region>.digitaloceanspaces.com/'
    ],
  ],

  ...

];
```

## Change Log

* 1.0.1 - First version

## TODO

* All done!