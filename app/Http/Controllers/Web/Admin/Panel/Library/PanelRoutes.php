<?php
/*
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 * Author: BeDigit | https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - https://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Web\Admin\Panel\Library;

use Illuminate\Support\Facades\Route;

class PanelRoutes
{
	/**
	 * @param $name
	 * @param $controller
	 * @param array $options
	 */
	public static function resource($name, $controller, array $options = [])
	{
		// CRUD Routes
		Route::post($name . '/search', $controller . '@search')->name('crud.' . $name . '.search');
		Route::get($name . '/reorder/{lang?}', $controller . '@reorder')->name('crud.' . $name . '.reorder');
		Route::post($name . '/reorder/{lang?}', $controller . '@saveReorder')->name('crud.' . $name . '.save.reorder');
		Route::get($name . '/{id}/details', $controller . '@showDetailsRow')->name('crud.' . $name . '.showDetailsRow');
		Route::get($name . '/{id}/revisions', $controller . '@listRevisions')->name('crud.' . $name . '.listRevisions');
		Route::post($name . '/{id}/revisions/{revisionId}/restore', $controller . '@restoreRevision')->name('crud.' . $name . '.restoreRevision');
		Route::post($name . '/bulk_actions', $controller . '@bulkActions')->name('crud.' . $name . '.bulkActions');
		
		$optionsWithDefaultRouteNames = array_merge([
			'names' => [
				'index'   => 'crud.' . $name . '.index',
				'create'  => 'crud.' . $name . '.create',
				'store'   => 'crud.' . $name . '.store',
				'edit'    => 'crud.' . $name . '.edit',
				'update'  => 'crud.' . $name . '.update',
				'show'    => 'crud.' . $name . '.show',
				'destroy' => 'crud.' . $name . '.destroy',
			],
		], $options);
		
		Route::resource($name, $controller, $optionsWithDefaultRouteNames);
	}
}
