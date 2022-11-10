## Basic commands

```bash
$ symfony console d:d:c #Create the database, load DATABASE_URL from .env.local
$ symfony console make:migration #Sync database with the project entities -> Create new migrations version
$ symfony console d:mi:mi #Execute migrations and update table in database
$ sumfony console d:mi:di 
```

## Validation

```bash
$ symfony console doctrine:schema:update
$ symfony console doctrine:schema:validate
```