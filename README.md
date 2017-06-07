# php-lolwp-api
PHP class for LoLWallpapers.net api

# Usage
Here's a basic usage example:
```php
<?php

require 'class.lolwpapi.php';

$api = new LoLWPAPI('YOUR_API_KEY_HERE');

// Get the latest wallpapers (limit: 20)
print_r($api->getWallpapers()
            ->result());

// Get all categories
print_r($api->getCategories()
            ->result());

// Get all artists
print_r($api->getArtists()
            ->result());
            
// Get all comments
print_r($api->getComments()
            ->result());
```

### Output type
By default the **result()** method will return an array. If you would like to get the result in JSON, simply specify it with the **setOutputType()** method as follow : 
```php
$api->setOutputType('json');
```

### Get {wallpaper|category|artist|comment} by ID.
Simply pass the ID as argument.

```php
// Get a wallpaper by ID
print_r($api->getWallpapers(13444)
            ->result());

// Get a category by ID
print_r($api->getCategories(311)
            ->result());

// Get an artist by ID
print_r($api->getArtists(800)
            ->result());
            
// Get a comment by ID
print_r($api->getComments(134)
            ->result());
```

### Query parameters
To get informations about the available query parameters for each endpoints, please read the [documentation](http://docs.lolwallpapers.apiary.io/).

```php
// Endpoint: /wallpapers
print_r($api->getWallpapers()
            ->page() // integer
            ->limit() // integer
            ->order() // string
            ->orderby() // string
            ->category_ID() // integer
            ->artist_ID() // integer
            ->search() // string
            ->result());
            
// Endpoint: /categories
print_r($api->getCategories()
            ->order() // string
            ->orderby() // string
            ->hide_empty() // boolean
            ->child_of() // integer
            ->childless() // boolean
            ->result());

// Endpoint: /artists
print_r($api->getArtists()
            ->order() // string
            ->orderby() // string
            ->result());
            
// Endpoint: /comments
print_r($api->getComments()
            ->order() // string
            ->orderby() // string
            ->parent_ID() // integer
            ->wallpaper_ID() // integer
            ->result());
```

### Contributing
If you'd like to contribute, please fork the repository and make changes as
you'd like. Pull requests are warmly welcome.
