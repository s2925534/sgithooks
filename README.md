# S. Git Hooks
So far implement the message commit, and the pre-commit branch checkup

## Requirements
* [PHP = 5.3 and up]
* [Composer] (https://getcomposer.org/)

# Git hooks implementation.
## Installation
 Install by downloading the folder into your project's vendor folder or using the composer command below
```bash
composer require s2925534/sgithooks
```
## Setup

Add to composer `scripts` section as below and create the `bin` folder.
```composer log
...
    "scripts": {
        "post-install-cmd": [
          "SGitHooks\\Actions\\ConfigSetup::build"
        ],
        "post-update-cmd": [
          "SGitHooks\\Actions\\ConfigSetup::build"
        ]
    },
      "config": {
        "bin-dir": "bin"
      },
  ...
```