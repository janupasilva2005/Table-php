# Table-php

## Simple library for rendering data in php

### Start with creating an instance

```php
$table = new Table();
```

### Add the table headers as an array

```php
$table->setHeaders(["id", "name", "age"]);
```

### Add data

```php
$table->setData([1, "john", "doe"]);
$table->setData([2, "mark", "down"]);
$table->setData([1, "Puppy", "ham"]);
```

### Finally, Render the table

```php
$table->render();
```
