Interface to Numbers API
========================

A small Joomla! module to display random facts from the Numbers API on your site.

Written by Simon Champion, March 2016.


Introduction
------------

This is a simple module that loads a fact from the Numbers API (http://numbersapi.com/) and displays it on your Joomla! site.

The module allows you to configure it with various options, mapping to the options available on the API.

Dependencies
------------

* Joomla!
* The Numbers API being online.

Note that this extension has only been tested against the current version of Joomla! (3.4.8) at the time of writing.


Installation
------------

This module should be installed via the Extensions manager in Joomla!'s admin panel.


Setup
-----

Once installed, go the configuration panel for the module by navigating Joomla!'s admin menu to Components / Modules. Then find it in the list of modules and click on it.

You will now get the config screen for the module, which contains the following fields:

* Data Option: This field allows you to specify whether you want to show random facts, or facts for a specific fixed number. You can also specify to use a number taken from the URL parameters. (In this case, the default will be random if the URL parameter is not supplied).

* Fixed Number: If you selected to show facts for a fixed number in the Data Option field, then specify the number you want to query here.

* Data Type: Numbers API provides various types of facts that can be requested. These range from mathematical trivia about a given number to interesting facts about specific dates. The options available can be selected here.

Once you've selected your options, set the status to 'Published', set the position and other config parameters as required to place the module where you want it in the site, as per the normal Joomla! process, and hit 'Save'.


Multiple Instances
------------------

As with all Joomla! modules, you can create duplicates of the module with different config parameters and different publishing positions, etc. For example, you might want to have a panel on your site for each of the trivia types.

Use the "Duplicate" button on the list of modules to achieve this. This is standard Joomla! functionality, so please see the Joomla! documentation for more details.


Who wrote this?
---------------

This code was written by Simon Champion.

All code in this repository is released under the GPLv2 licence. The GPLv2 licence document should be included with the code.


Support
-------

Please use the Github issues tracker to report any bugs or feature requests.



Todo
----

* Provide a UI for entering a number to query.
* Allow the trivia type to be random.
* Allow the trivia type to be specified in URL parameters.


Trademarks and Licenses
-----------------------

* Joomla!® is a registered trademark of Open Source Matters, Inc.
* Joomla! is distributed under the GPLv2 licence.
* This package is distributed under the GPLv2 licence. The GPLv2 licence document should be included with the code.
