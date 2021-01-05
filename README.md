# 系統畫面

## ◆首頁
- 餐點及活動圖片幻燈片、推薦餐點、及註冊會員與登入
<a href="https://imgur.com/r0Vfet3"><img src="https://i.imgur.com/r0Vfet3.png" title="source: imgur.com" /></a>

## ◆菜單瀏覽
- 所有餐點之瀏覽，顯示價錢及餐點種類
<a href="https://imgur.com/OshmB6x"><img src="https://i.imgur.com/OshmB6x.png" title="source: imgur.com" /></a>

## ◆個別菜單頁面(訂餐頁面)
- 訂購餐點之頁面，可選擇餐點數量
<a href="https://imgur.com/OMYdE2F"><img src="https://i.imgur.com/OMYdE2F.png" title="source: imgur.com" /></a>

## ◆購物車
- 欲訂購之餐點會先加入至購物車內，並顯示小計與總計，也可選擇繼續購物
<a href="https://imgur.com/l0U2IRR"><img src="https://i.imgur.com/l0U2IRR.png" title="source: imgur.com" /></a>

## ◆會員訂單查詢
- 可查詢該會員的訂單，包含歷史訂單
<a href="https://imgur.com/msKOMpN"><img src="https://i.imgur.com/msKOMpN.png" title="source: imgur.com" /></a>

## ◆會員個人資料修改
- 提供會員修改個人資料
<a href="https://imgur.com/e3HUEkS"><img src="https://i.imgur.com/e3HUEkS.png" title="source: imgur.com" /></a>



## ◆後台會員管理
- 查看所有會員，可檢視該會員的資料
<a href="https://imgur.com/Pz1cLax"><img src="https://i.imgur.com/Pz1cLax.png" title="source: imgur.com" /></a>

## ◆後台餐點管理
- 查看所有餐點，可新增餐點
<a href="https://imgur.com/DFs3TZx"><img src="https://i.imgur.com/DFs3TZx.png" title="source: imgur.com" /></a>

## ◆後台訂單管理
- 查看所有訂單，包含已完成及準備中之訂單
<a href="https://imgur.com/XvCa31d"><img src="https://i.imgur.com/XvCa31d.png" title="source: imgur.com" /></a>



## 系統名稱及作用

線上預訂快取系統
    - 讓使用者可以不必至店家現場排隊點餐，節省時間
    - 詳細的餐點資訊
    - 店家可使用這套系統管理會員、餐點及訂單


## 系統的主要功能
★ 前台
  - 首頁 (Route::get('/',[HomeController::class, 'index'])->name('home.index');)  [3A732086 胡東霖](https://github.com/3A732086)
  - 菜單瀏覽 (Route::get('/products', [ProductController::class, 'index'])->name('products.index');) [3A732086 胡東霖](https://github.com/3A732086)
  - 個別餐點資訊 (Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');) [3A732086 胡東霖](https://github.com/3A732086)
  - 購物車 (Route::get('/cartlist',[CartController::class,'index'])->middleware('auth')->name('carts.index'); ) [3A732086 胡東霖](https://github.com/3A732086) [3A732087 許家銓](https://github.com/3A732087)
  - 訂單查詢 (Route::get('/orderlists',[OrderController::class,'index'])->middleware('auth')->name('orders.index');) [3A732086 胡東霖](https://github.com/3A732086) [3A732087 許家銓](https://github.com/3A732087)

★ 後台
  - 會員管理 (Route::get('members', [AdminMemberController::class, 'index'])->name('admin.members.index');) [3A732087 許家銓](https://github.com/3A732087)
  - 餐點管理 (Route::get('menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');) [3A732087 許家銓](https://github.com/3A732087)
  - 訂單管理 (Route::get('orderlists', [AdminOrderlistController::class, 'index'])->name('admin.orderlists.index'); ) [3A732087 許家銓](https://github.com/3A732087)
### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
