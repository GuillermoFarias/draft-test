<img src="https://user-images.githubusercontent.com/11460907/156950259-03bc3b30-2920-46b6-a43a-f9dac14e4455.png" alt="drawing" width="100"/>

# Marvin
[![tests](https://github.com/GuillermoFarias/draft-test/actions/workflows/test.yml/badge.svg?branch=master)](https://github.com/GuillermoFarias/draft-test/actions/workflows/test.yml)
[![StyleCI](https://github.styleci.io/repos/466894091/shield?branch=master)](https://github.styleci.io/repos/466894091?branch=master)
[![CodeFactor](https://www.codefactor.io/repository/github/guillermofarias/draft-test/badge)](https://www.codefactor.io/repository/github/guillermofarias/draft-test)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/127054eda376433e856a22a7589ff29f)](https://www.codacy.com/gh/GuillermoFarias/draft-test/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=GuillermoFarias/draft-test&amp;utm_campaign=Badge_Grade)

Test

## Configure docker image

```sh
docker-compose build
```

## Install dependencies

```sh
docker-compose run --rm app composer install
```

## ... And lift off

```sh
docker-compose up -d
```

### Stop service

```sh
docker-compose stop
```

## Testing

```sh
docker-compose run --rm app php -n vendor/bin/phpunit
```

### Get report of the tested

#### Console

```sh
docker-compose run --rm app vendor/bin/phpunit --testdox --coverage-text
```

#### HTML

```sh
docker-compose run --rm app vendor/bin/phpunit --coverage-html coverage-report
```


# How to use

in root exist input.txt file, here replace input test

```
  5 3
  1 1 E
  RFRFRFRF
  3 2 N
  FRRFLLFFRRFLL
  0 3 W
  LLFFFLFLFL
```

next, run command to process file

```bash
php console martian:run
```

recomend run this command over docker
```bash
docker-compose exec app php console martian:run
```

### About me

![Guillermo Farías GitHub stats](https://github-readme-stats.vercel.app/api?username=GuillermoFarias&hide_title=false&theme=prussian)
