<?php namespace Zaxbux\DOStorageDriver;

use Storage;
use Aws\S3\S3Client;
use Zaxbux\DOStorageDriver\Classes\DigitalOceanSpacesAdapter;
use League\Flysystem\Filesystem;

use System\Classes\PluginBase;

/**
 * Plugin class for Backblaze B2 Storage Driver
 *
 * @author zaxbux
 */
class Plugin extends PluginBase {

	/**
	 * @var array Plugin dependencies
	 */
	public $require = ['October.Drivers'];

    /**
     * {@inheritDoc}
     */
    public function boot() {
        // Register the b2 storage driver
        Storage::extend('do_spaces', function ($app, $config) {
            $client = new S3Client([
							'credentials' => [
								'key'    => $config['key'],
								'secret' => $config['secret'],
							],
							'version' => 'latest',
							'region' => $config['region'],
							'endpoint' => 'https://'.$config['region'].'.digitaloceanspaces.com',
						]);

						$adapter = new DigitalOceanSpacesAdapter($client, $config['space']);
						
            return new Filesystem($adapter);
        });
    }
}
