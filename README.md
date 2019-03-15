### Explorer

---

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Peac36/Explorer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Peac36/Explorer/?branch=master)

A simple Laravel package helps you to explore the framework commands and bindings.

![Screenshot](https://raw.githubusercontent.com/Peac36/Explorer/master/screenshot.png)


## Installation

Just add the following lines into `config/app.php`:

```
'providers' => [
    ...
    Peac36\Explorer\Provider::class
    ...
]

```

## Commands

* `explore:bindings` - prints all binded classes in the container including the class name and path.

* `explore:commands` - prints registered commands including the class and path.

