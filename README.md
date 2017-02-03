# news-bundle

this README is currently in progress. Thank you for your understanding...

Designed to work fine with the DyweeCoreBundle providing great administration features

##Installing

just run
```bash
$ composer require dywee/news-bundle
```

add the bundle to the kernel
```php
new Dywee\NewsBundle\DyweeNewsBundle(),
```

add the routing informations
```yml
dywee_news:
    resource: "@DyweeNewsBundle/Controller"
    type: annotation
    prefix:   /
```

no more configuration needed
