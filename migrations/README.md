## Basic commands

```bash
$ symfony console d:d:c #Connect to the database, load DATABASE_URL from .env.local
$ symfony console make:migration #Sync database with the project entities -> Create new migrations version
$ symfony console d:mi:mi #Execute migrations and update table in database
```