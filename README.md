## Laravel Rest API

### Requirement

REST-API
1. Запрос на получение списка языков
2. Запрос на получение текстов конкретного языка
3. Запрос на получение текстов всех языков
4. Запрос на добавление текста. Например, BTN_CLICK. И это поле добавляется ко всем языкам.
5. Запрос на редактирование текста конкретного языка.Например, редактировать BTN_CLICK. link/?texttype=BTN_CLICK&langid=0&value="Click on button"

P.S.
- Обратить внимание на хранение арабского языка.
- Выдавать ответ в json.
- Предлагаю реализовать 3 языка: Английский, Арабский и Русский.


### API EndPoints
##### Post
1) Список доступных языков **GET** `/api/v1/translates/languages-list`

2) Получение текстов конкретного языка **GET** `/api/v1/translates/ru`

    (Получение текста конкретного языка и texttype **GET** `/api/v1/translates/ru/{texttype}`)

3) Получение текстов всех языков **GET** `/api/v1/translates/`
4) Добавление текста **POST** `/api/v1/translates?texttype=hello&value=tittle&lang=en`

   И это поле добавляется ко всем языкам.
   
5) Редактирование текста **PUT** `/api/v1/translates?texttype=hello&value=tittle&lang=en`

6) Удаление текста **DELETE** `/api/v1/translates?texttype=hello&value=tittle&lang=en`

### Коды ответов

 * `200` - ok
 * `400` - ошибка валидации
 * `404` - страница не найдена
 * `405` - такой метод не существует
