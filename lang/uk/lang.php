<?php

    return [

        'plugin' => [
            'name'        => 'Adminer для WinterCMS',
            'description' => 'Завантажує екземпляр Adminer з бекенду WinterCMS'
        ],

        'navigation' => [
            'label' => 'Adminer'
        ],

        'settings' => [
            'tabs'              => ['general' => 'Загальні', 'themes' => 'Теми', 'advanced' => 'Додаткові'],
            'label'             => 'Налаштування Adminer',
            'mode'              => 'Режим запуску',
            'mode_comment'      => 'Визначає, як запустити Adminer',
            'full_window'       => 'Повне вікно',
            'iframe'            => 'Iframe',
            'autologin'         => 'Автоматичний вхід',
            'autologin_comment' => 'Увійти безпосередньо до бази даних WinterCMS',
            'themes'            => 'Тема',
            'themes_comment'    => 'Виберіть тему Adminer',
            'themes_no'         => 'Немає теми',
            'hide_menu'         => 'Пункт меню',
            'hide_menu_comment' => 'Приховати пункт Adminer головного меню',
            'link_text'         => 'Відкрити Adminer',
            'link_description'  => 'Ви можете отримати доступ до Adminer звідси:',
            'use_conn'          => 'Автоматичне підключення за замовчуванням',
            'use_conn_default'  => 'Використовувати з\'єднання за умовчанням',
            'use_conn_comment'  => 'Adminer використовуватиме стандартне підключення до бази даних у WinterCMS. Ви можете змінити це налаштування тут.<br>Додайте нові підключення на <strong>config/database.php</strong>. <a href="https://laravel.com/docs/5.6/database#configuration" target="_blank">Докладніше</a>',
        ],

        'permissions' => [
            'tab'   => 'Adminer',
            'label' => 'Доступ до Adminer з бекенду WinterCMS'
        ]

    ];
?>