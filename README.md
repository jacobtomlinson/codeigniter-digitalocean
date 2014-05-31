CodeIgniter DigitalOcean Library
========================

A CodeIgniter library for using the DigitalOcean API. All methods supported.

A port of the [DigitalOcean PHP Class](https://github.com/tuefekci/DigitalOcean-PHP-Class) by [Giacomo Tüfekci](https://github.com/tuefekci).

Documentation for the [Digital Ocean API](https://www.digitalocean.com/api) can be found here.

Installation
---------------------
To install simply copy the contents of the **config**, **helper** and **library** folders into the same folders in your CodeIgniter project application folder.


Config
---------------------
To configure this library you must enter your DigitalOcean **Client ID** and **API Key** into `config/digitalocean.php`.

Instructions on how to generate this information can be found on the [DigitalOcean website](https://www.digitalocean.com/community/articles/how-to-use-the-digitalocean-api).

Example Usage
---------------------
```PHP
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

	public function index()
	{
		$this->load->library('digitalocean');
		
		$query = $this->digitalocean->getDroplets();
		
		print 'Status: ' . $query->status . '<br /><br />';
		
		foreach ($query->droplets as $droplet){
			print 'Name: ' . $droplet->name . '<br />';
			print 'IP: ' . $droplet->ip_address . '<br />';
			print '<br />';
		}
	}
}

/* End of file example.php */
/* Location: ./application/controllers/example.php */
```
The above will result in something like this:
```
Status: OK

Name: your-droplet-name
IP: your-droplet-ip

Name: your-droplet-name
IP: your-droplet-ip

etc.
```