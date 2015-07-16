# WordPress Plugin Template
This project aims to provide a well structured elegant starting point for building WordPress plugins.

#### Twig Templating Engine

The plugin template uses the [Twig Templating Engine](http://twig.sensiolabs.org/) in an attempt to
decouple HTML code from the actual plugin implementation, therefore increasing code maintainability.

#### Composer Autoloader

The plugin template uses [Composer]((https://getcomposer.org/)) for loading classes. Adding or renaming files or classes in the `classes` directory will require regenerating the Composer class map. Regenerating the class map is as simple as executing the following command at your terminal: `composer dump-autoload`

For more information, consult the [Composer Documentation](https://getcomposer.org/doc/).
