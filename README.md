## Instalação

Primeiro clone este repositório e configure seu arquivo .env.

```
git clone git@github.com:benjamimWalker/mental-hospital.git
cp .env.example .env
```
## Configuração

Atualize o composer
```
composer update
```

Instale as dependências do composer.
```
composer install
```

Suba o container.

```
./vendor/bin/sail up -d
```

Execute as migrations iniciais.

```
./vendor/bin/sail php artisan migrate
```

Execute o seeder para popular o banco de dados.

```
./vendor/bin/sail php artisan db:seed
```
