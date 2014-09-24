ojs-cleanCache
==============

A cache cleaner for PKP Open Journal System

INSTALLATION
============

1. Download last version at https://github.com/inia-es/ojs-cleanCache/releases 
1. Unzip it in your OJS site and put it into a new folder, i.e. `cleanCache`
1. So far so easy

USE
===
Once you detect a possible cache fail, usually with a blank screen instead of your OJS site you can acces **cleanCache** through the URL:
```
http://<your journal site>/cleanCache/cleanCache.php
```

This will clean the cache and, if succesful, will redirect you to the journal site.

If **cleanCache** remain stuck in a blank screen, you probably have no cache issue and you should start researching the bug via your web server or PHP log.
