<?php

return [

    'admin' => [

        'menu-title' => 'Меню администратора',
        'title'      => 'Административная панель',

        'settings' => [

            'stand' => [

                'title'      => 'Служение со стендом',
                'time-start' => 'Начало служения',
                'time-end'   => 'Окончание служения',

            ],

            'records' => [

                'title'    => 'Записи на странице',
                'per-page' => 'Показывать не более чем',

            ],

            'message' => [

                'title'      => 'Сообщение администратора',
                'global-msg' => 'Сообщение будет показано всем пользователям',

            ],

            'status' => 'Настройки успешно сохранены!'

        ],

    ],

    'user' => [

        'menu-title' => 'Меню пользователя',
        'title'      => 'Профиль пользователя',
        'add-new'    => 'Добавить нового пользователя',
        'no-users'   => 'Нет пользователей...',

        'table' => [

            'col-name' => 'Имя',
            'col-role' => 'Роль',
            'admin'    => 'Администратор',
            'user'     => 'Пользователь',
            'unsigned' => 'Неопределенно',

        ],

        'popup' => [

            'delete'  => 'Ты действительно хочешь удалить пользователя',
            'btn-no'  => 'Нет',
            'btn-yes' => 'Да, хочу',

        ],

        'alert' => [

            'create' => 'Пользователя :name было добавлено!',
            'update' => 'Данные о пользователе успешно обновлены!',
            'delete' => 'Пользователя было удалено!',

        ]

    ],

    'territories' => [

        'title'          => 'Территория',
        'your-title'     => 'Твои территории',
        'marker-title'   => 'Твоя территория здесь',
        'address'        => 'Адрес',
        'user'           => 'Вестник',
        'time-to'        => 'Отработать до',
        'time-start'     => 'Начало',
        'time-end'       => 'Окончание',
        'no-territories' => 'Территории отсутствуют...',
        'no-data'        => 'Данных ещё нет...',
        'statistics'     => 'Статистика обработки',
        'btn-start'      => 'Взять территорию',
        'btn-end'        => 'Сдать территорию',

        'form' => [

            'number'        => 'Номер',
            'coordinates'   => 'Координаты',
            'description'   => 'Описание',
            'assign'        => 'Назначить',
            'assign-nobody' => 'Никому',

            'add-new' => [

                'title' => 'Добавить новую территорию',
                'btn'   => 'Добавить территорию',

            ],

            'update' => [

                'title' => 'Обновить: ',
                'btn'   => 'Обновить территорию'

            ],

        ],

        'status' => [

            'title'     => 'Статус',
            'all'       => 'Все',
            'processed' => 'Обрабатывается',
            'free'      => 'Свободная',
            'pending'   => 'В ожидании',

        ],

        'popup' => [

            'update-start' => 'Ты действительно хочешь попросить об обработке территории',
            'update-end'   => 'Ты действительно хочешь сдать территорию',
            'delete'       => 'Ты действительно хочешь удалить территорию',
            'btn-no'       => 'Нет',
            'btn-yes'      => 'Да, хочу',

        ],

        'alert' => [

            'create' => 'Территория :name успешно добавлена!',
            'update' => 'Территория успешно обновлена!',
            'delete' => 'Территория удалена!',

        ],

        'message' => [

            'territory-end-short' => 'Время на обработку этой территории закончилось.',
            'territory-end'       => 'Время на обработку этой территории закончилось. Сдай ее пожалуйста ответственному за территории.',
            'territory-take'      => 'Твою просьбу об обработке территории было отправлено ответственному за территории.',
            'territory-give'      => 'Территорию сдано.',

        ]

    ],

    'menu' => [

        'settings'    => 'Панель настроек',
        'user'        => 'Моя страница',
        'users'       => 'Пользователи',
        'territories' => 'Территории',
        'schedule'    => 'График служения со стендом'

    ]

];
