# El Buho API

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)



# End Point Tersedia!

  
  - /soal


## Ambil Data
  - ###  Ambil semua data
    ##### url

     ```/soal```
    ##### response
#
-
    ``` json
    [
        {
             id : 1,
             question  : "sample question",
             opta : "option a",
             ....
             cat : "category"
        },
        {
            .......
        }
    ]
    ```
  - ###  Ambil data menurut kategori
  
 - ##### url
     ``` soal?category=sains ```
 

    
   
- ##### response
#  
 ``` json
    [
        {
             id : 1,
             question  : "sample question",
             opta : "option a",
             ....
             cat : "sains"
        },
        {
            .......
        }
    ]
```



