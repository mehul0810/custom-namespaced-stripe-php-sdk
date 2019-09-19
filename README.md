# Custom Namespaced Stripe PHP SDK
This composer plugin will help you add custom namespace to Stripe SDK for PHP so that you can easily use the custom namespaced Stripe SDK in your WordPress plugins. 

Using this will help you avoid conflicts with other WordPress plugins who are using the same Stripe PHP SDK with different versions.

## How to configure it for your WordPress plugin?
Add the `composer.json` and `scoper.inc.php` in your WordPress plugin for development only. Don't send this files in production. 

If your WordPress plugin has its own `composer.json` then merge it with our  `composer.json` file.

### Additional Steps

1. Replace the word `WP\\Stripe\\` with `CustomNamespace\\Stripe\\` under `autoload` parameter in `composer.json`
2. Replace the prefix `WP` with `CustomNamespace` in `scoper.inc.php`

After moving the files and following the steps above, run the below mentioned command and it will automagically convert the Stripe SDK under `vendor` folder with your custom namespace.

```
$ composer install
```

That's it! You're done.

## Troubleshooting
If you're facing issues with generating files properly or any random error arises. Then, follow the steps as mentioned:

1. Remove `composer.lock` file.
2. Clear Composer cache.
```
$ composer clear-cache
```

## Special Thanks
- [GiveWP](https://givewp.com)
