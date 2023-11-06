## 環境構築

### .envファイルを作成
- `cp .env.example .env`

### composer install
- `docker run --rm -v ${PWD}:/app composer install`

### 起動
- `docker compose up -d`

### キーの生成
- `docker compose exec web php artisan key:generate`

### 起動確認
- `docker compose ps`

