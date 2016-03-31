<?php

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/

/*
 *  Подключаем файлы работы с базой данных
 */
require_once 'data/dataBaseConnection.php';
require_once 'data/dataBaseMessagesManager.php';
require_once 'data/oneTimeAuth.php';
require_once 'data/userCRUD.php';
/*
 *  Запускаем маршрутизатор
 */
Route::start();