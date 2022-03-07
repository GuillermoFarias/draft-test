<img src="https://user-images.githubusercontent.com/11460907/156950259-03bc3b30-2920-46b6-a43a-f9dac14e4455.png" alt="drawing" width="100"/>

# Marvin
[![codecov](https://codecov.io/gh/GuillermoFarias/draft-test/branch/master/graph/badge.svg?token=vmrzFxm2c3)](https://codecov.io/gh/GuillermoFarias/draft-test)
[![tests](https://github.com/GuillermoFarias/draft-test/actions/workflows/test.yml/badge.svg?branch=master)](https://github.com/GuillermoFarias/draft-test/actions/workflows/test.yml)
[![StyleCI](https://github.styleci.io/repos/466894091/shield?branch=master)](https://github.styleci.io/repos/466894091?branch=master)
[![CodeFactor](https://www.codefactor.io/repository/github/guillermofarias/draft-test/badge)](https://www.codefactor.io/repository/github/guillermofarias/draft-test)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/127054eda376433e856a22a7589ff29f)](https://www.codacy.com/gh/GuillermoFarias/draft-test/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=GuillermoFarias/draft-test&amp;utm_campaign=Badge_Grade)

![image](https://user-images.githubusercontent.com/11460907/156953589-84c80744-8239-48d5-915e-6c189bd739b1.png)


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

# ¿ How to use   ?

<img src="https://user-images.githubusercontent.com/11460907/156955332-6b59d02d-42b5-4c9a-87dd-b5c7a6aa5e8e.png" alt="drawing" width="90"/>

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
php console marvin:walk
```

recomend run this command over docker
```bash
docker-compose exec app php console marvin:walk
```

### About me

![Guillermo Farías GitHub stats](https://github-readme-stats.vercel.app/api?username=GuillermoFarias&hide_title=false&theme=prussian)
