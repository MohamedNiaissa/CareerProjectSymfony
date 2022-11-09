# v.0.0.1
Initialization of the symfony project.

# v.0.0.2
Initialize and create company controllers, entity..
- {Add} Uix twig component
- {Add} Create company entity with repository `/src/Entity/Company.php`
- {Add} Create company controller `/src/Controller/CompanyController.php`
- {Add} Create company route to send a form
- {Add} Generate new migrations version `Version20221108162456`

# v.0.0.3-beta
Initialize basics README.md, HISTORY.md, AUTHORS.md
- {Add} `/AUTHORS.md`
- {Add} `/HISTORY.md`
- {Update} `/README.md`
- {Update} `/.gitignore`
- {Remove} Template database column in `/migrations`

# v.0.0.3
- Bootstrap extension added and fixed

# v.0.0.4
- Add Company Form
- Company page added
- Data is inserted into the database

# v.0.0.5
Implement basic command instruction to show a list of both pending and unmatched jobs
- {Add} `/src/Command/CreateJobsCommand.php`

# v.0.0.6
Create Mailer service instead of a controller Mailer.
- {Add} Basic templating `/src/Service/Mailer.php`
- {Add} [dev] setup explaination `/src/Service/README.md`

# v.0.0.7
Implement Skill entity
- {Add} Create Skill entity
- {Add} Create Skill fixtures
- {Add} README.md in folder `/src/DataFixtures`
- {Add} Generate new migrations version `Version20221109085905`
- {Update} `./docker-compose.yml` to mysql configuration
- {Update} `./composer.json`