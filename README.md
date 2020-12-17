# Deprecation Notice

> **Warning:** This plugin is no longer being maintained.

## Migration Steps
Since October CMS is based on Laravel, the built-in S3 driver (from October.Drivers) completely replaces the functionality of this plugin. Edit your `filesystems.php` file like so:
```
'disks' => [

	// ...

	's3' => [
		'driver'     => 's3',                                   // Use the built-in S3 driver
		'key'        => 'XXXXXXXXXXXXXXXXXXXX',                 // DigitalOcean API key
		'secret'     => '0123456789abcdefghijklmnopqrstuvwxyz', // DigitalOcean API secret
		'endpoint'   => 'https://xyz1.digitaloceanspaces.com',  // DigitalOcean spaces endpoint
		'region'     => 'xyz1',                                 // Should match your endpoint
		'bucket'     => 'assets',                               // Your bucket name
		'visibility' => 'public',                               // Make uploads read-only for anonymous users
	],

],
```

This configures October CMS to use it's own S3 driver to upload files to DigitalOcean spaces, marking them as public (using the **public-read** canned ACL). This change doesn't delete your uploads or make them inaccessable, and you can still upload files just like before.
