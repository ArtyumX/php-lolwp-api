# php-lolwp-api
PHP class for LoLWallpapers.net api

# Usage
Here's a basic usage example:
```php
<?php

require 'class.lolwpapi.php';

$api = new LoLWPAPI('YOUR_API_KEY_HERE');

// Get the latest wallpapers (default limit: 20)
echo $api->getWallpapers()
         ->result();

// Get all categories
echo $api->getCategories()
         ->result();

// Get all artists
echo $api->getArtists()
         ->result();
            
// Get all comments
echo $api->getComments()
         ->result();
```

### Output type
By default the **result()** method will return an array. If you would like to get the result in JSON, simply specify it with the **setOutputType()** method as follow : 
```php
$api->setOutputType('json');
```

### Get a {wallpaper|category|artist|comment} by ID.
Simply pass the ID as argument.

```php
// Get a wallpaper by ID
echo $api->getWallpapers(13444)
         ->result();

// Get a category by ID
echo $api->getCategories(311)
         ->result();

// Get an artist by ID
echo $api->getArtists(800)
         ->result();
            
// Get a comment by ID
echo $api->getComments(134)
            ->result();
```

### Query parameters
To get informations about the available query parameters for each endpoints, please read the [documentation](http://docs.lolwallpapers.apiary.io/).

```php
// Endpoint: /wallpapers
echo $api->getWallpapers()
         ->page() // integer
         ->limit() // integer
         ->order() // string
         ->orderby() // string
         ->category_ID() // integer
         ->artist_ID() // integer
         ->search() // string
         ->result();
            
// Endpoint: /categories
echo $api->getCategories()
         ->order() // string
         ->orderby() // string
         ->hide_empty() // boolean
         ->child_of() // integer
         ->childless() // boolean
         ->result();

// Endpoint: /artists
echo $api->getArtists()
         ->order() // string
         ->orderby() // string
         ->result();
            
// Endpoint: /comments
echo $api->getComments()
         ->order() // string
         ->orderby() // string
         ->parent_ID() // integer
         ->wallpaper_ID() // integer
         ->result();
```

### Contributing
If you'd like to contribute, please fork the repository and make changes as
you'd like. Pull requests are warmly welcome.
