# Trance - Installation/Configuration Steps

## Laravel Installation using Docker

Reference: [https://laravel.com/docs/11.x#sail-on-linux](https://laravel.com/docs/11.x#sail-on-linux)

```
curl -s https://laravel.build/trance?with=mysql | bash
cd trance
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
```

## Laravel Breeze Installation using Livewire

Reference: [https://laravel.com/docs/11.x/starter-kits#laravel-breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)

```
./vendor/bin/sail artisan breeze:install
```

choosed Livewire (Volt Class API) with Alpine 

```
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## Creating Worklog app

Reference: [https://bootcamp.laravel.com/livewire/creating-chirps](https://bootcamp.laravel.com/livewire/creating-chirps)

```
./vendor/bin/sail artisan make:model -mc Worklog # model, migrations, and controller
```

## Loading .csv

```
LOAD DATA INFILE '/var/lib/mysql-files/trance-20241014.csv' INTO TABLE worklogs
FIELDS TERMINATED BY ':'
IGNORE 1 LINES (id,source,date,task,description);
```

## Livewire + Bootstrap

First, install [Laravel Mix](https://laravel-mix.com/docs/6.0/installation).

In case of the error "ENOSPC: System limit for number of file watchers reached", edit /etc/sysctl.conf, adding:

```
fs.inotify.max_user_watches=524288
```

then save and restart:
In case of the error "ENOSPC: System limit for number of file watchers reached", edit /etc/sysctl.conf, adding:

```
sudo sysctl -p
```

Reference: [https://www.cloudways.com/blog/laravel-bootstrap-template-integration/](https://www.cloudways.com/blog/laravel-bootstrap-template-integration/)

## Calendar

Reference: [https://github.com/omnia-digital/livewire-calendar](https://github.com/omnia-digital/livewire-calendar)