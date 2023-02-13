# 工作任務管理平台 Task Management System

使用Laravel框架開發的任務管理系統。它可以幫助您組織、分配、追蹤任務，並確保團隊能夠在有限的時間內達成預期的目標。

## 目錄

* [背景](#背景)
* [功能特點](#功能特點)
* [網頁預覽](#網頁預覽)
* [安裝說明](#安裝說明)

<h2 id="背景">背景</h2>

練習在Laravel框架下開發會員登入/註冊功能、連接資料庫、讀取資料。  

目前還在持續開發當中，目前僅提供以下[功能](#功能特點)

<h2 id="功能特點">功能特點</h2>

* 登入/註冊系統
* 發佈/查看任務

<h2 id="網頁預覽">網頁預覽</h2>  

* 首頁  
![image](https://imgur.com/u1MOh4w.jpg)

* 登入/註冊  
![image](https://imgur.com/aHGPwXh.jpg)
![image](https://imgur.com/lzUeEBO.jpg)

* 發佈任務  
![image](https://imgur.com/I20cKwM.jpg)

* 任務清單  
![image](https://imgur.com/CDDUKbv.jpg)

<h2 id="安裝說明">安裝說明</h2>

請確保你的環境已安裝以下套件：

* PHP
* Composer
* MySQL

1. 複製此專案：  
```bash 
git clone https://github.com/[YOUR_GITHUB_USERNAME]/Task-Management-System.git
```

2. 在專案目錄中，運行以下命令安裝所需的依賴：
```bash
composer install
```

3. 配置應用程序的環境變量：
```bash
cp .env.example .env
```
  和填寫```.env```檔案

4. 生成一組加密金鑰：
```bash
php artisan key:generate
```

5. 建立資料庫，並在```.env```檔案中配置資料庫連接

6. 運行數據庫遷移以建立必要的數據表：
```bash
php artisan migrate
```

7. 啟動應用程序：
```bash
php artisan serve
```

現在你可以在瀏覽器中訪問```http://localhost:8000```以開始使用 工作任務管理平台。
