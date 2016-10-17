## Simple application based on CI

---
#### set up enviroment

```sh
$ docker-compose up
```

#### execute the command to set up database structure ( at  "front" container)

```sh
php /var/www/index.php Command migrate
```
