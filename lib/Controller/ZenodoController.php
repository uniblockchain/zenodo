<?php

/**
 * Zenodo - based on files_zenodo from Lars Naesbye Christensen
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Lars Naesbye Christensen, DeIC
 * @author Maxence Lange <maxence@pontapreta.net>
 * @copyright 2017
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\Zenodo\Controller;

use \OCA\Zenodo\Service\ConfigService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;

class ZenodoController extends Controller {

	private $configService;

	private $miscService;

	public function __construct(
		$appName, IRequest $request, ConfigService $configService, $miscService
	) {
		parent::__construct($appName, $request);
		$this->configService = $configService;
		$this->miscService = $miscService;
	}

	//
	// Admin
	//

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 */
	public function dialogZenodo() {
		return new TemplateResponse($this->appName, 'dialog', [], 'blank');
	}


	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 */
	public function publishToZenodo($filename, $metadata, $production) {


		$this->miscService->log(
			"_____" . var_export($metadata, true) . " __ " . $filename . "_ " . $production
		);

		$response = array(
			'published' => true
		);

		return $response;
	}
}