# we_moovies_api
la partie API du mini-projet (test) We Moovies

## utilisation avec docker
```
docker compose up --build
```

## puis executer les migrations dans le container SF
```
docker exec -it symfony_app bash
php bin/console doctrine:migrations:migrate
```

puis l'API est dispo sur http://127.0.0.1:8080/
