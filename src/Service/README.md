## Mailer service

Setup [dev] without running a real SMTP
- goto (mailtrap.io)[https://mailtrap.io/]
- register an account for free
- in your .env.local set `MAILER_DSN="username:password@smtp.mailtrap.io:2525"`