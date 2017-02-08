DOKUMENTASI 

a. 
- Clone Repository https://github.com/demsyimanm/dot_test
- Buat DB dengan nama "dot"
- Buka console di folder yang sudah diclone dan jalankan perintah di console "php artisan migrate"
- Jalankan perintah "php artisan db:seed"

b. 
1. Login (POST)
  - route = "api/login" 
  - param = - email (string) 
            - password (string)

2. Get All Product (GET)
  - route = "api/get/produk/{token}" 
  - param = 
  
3. Input Product (POST)
  - route = "api/post/produk/input/{token}" 
  - param = - name (string) 
            - description (string)
            - stock (int)
            - image (blob) -> nullable
            
4. Update Product (POST)
  - route = "api/post/produk/update/{id}/{token}" 
  - param = - name (string) 
            - description (string)
            - stock (int)
            - image (blob) -> nullable
            
5. Detail Product (GET)
  - route = "api/post/produk/detail/{id}/{token}" 
  - param = 
  
6. Delete Product (GET)
  - route = "api/post/produk/delete/{id}/{token}" 
  - param = 
