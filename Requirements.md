# Intro

Information about project is already available in the console:
* php app/console twig:debug 
* php app/console container:debug
* php app/console debug:route

# Problem
However, in big projects it is difficult to go through all this data without some kind of grouping and sorting .

The main idea is to generate user-friendly documentation about project parts.

# Features

* List bundles 
* List services (perhaps groped by bundles, by name)
* List service tags
* List loggers (by environment)
* List twig template operators, filters, tests
* List doctrine entities
* List listeners/events
* List unit/behat tests 
* ...


