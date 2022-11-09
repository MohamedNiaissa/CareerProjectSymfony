## Basic commands

```bash
$ symfony console d:d:c #Create the database, load DATABASE_URL from .env.local
$ symfony console make:migration #Sync database with the project entities -> Create new migrations version
$ symfony console d:mi:mi #Execute migrations and update table in database
$ symfony console doctrine:mi:di #Create new migration
```


## Version20221109134322 and next version
- Remove duplicate of  $this->addSql('ALTER TABLE company CHANGE logo logo VARCHAR(900) DEFAULT NULL');