## 環境構築
#### laravel sail インストール
```
curl -s "https://laravel.build/backend" | bash
```

#### コンテナ起動
```
cd backend
sail up -d
```

#### コンテナ内に入る
```
sail shell
```

#### breeze インストール
```
composer require laravel/breeze --dev

php artisan breeze:install api
```

#### nuxt インストール
```
npx create-nuxt-app frontend
```

#### nuxt.config.js 修正
```
axios: {
  proxy: true
},
proxy: {
  "/api": 'http://localhost:80'
},
```
#### tailwind css エラー
```
https://github.com/nuxt/framework/issues/9115
```
