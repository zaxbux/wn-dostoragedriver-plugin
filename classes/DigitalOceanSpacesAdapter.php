<?php

namespace Zaxbux\DOStorageDriver\Classes;

use League\Flysystem\Config;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

/**
 * Changes the default behaviour to set the ACL to public-read instead of private.
 */
class DigitalOceanSpacesAdapter extends AwsS3Adapter {
	/**
	 * {@inheritdoc}
	 */
	protected function upload($path, $body, Config $config) {
		$options = $this->getOptionsFromConfig($config);
		$config->set('ACL', array_key_exists('ACL', $options) ? $options['ACL'] : 'public-read');

		return parent::upload($path, $body, $config);
	}
}