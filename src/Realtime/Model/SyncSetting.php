<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Realtime\Model;

use Gs2\Core\Model\IModel;


/**
 * Object synchronization setting
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#syncsetting
 */
class SyncSetting implements IModel {
	/**
     * @var string Object catalog
	 */
	private $objectCatalog;
    /** @return string|null Object catalog */
	public function getObjectCatalog(): ?string {
		return $this->objectCatalog;
	}
    /** @param string|null $objectCatalog Object catalog */
	public function setObjectCatalog(?string $objectCatalog) {
		$this->objectCatalog = $objectCatalog;
	}
    /**
     * @param string|null $objectCatalog Object catalog
     * @return SyncSetting
     */
	public function withObjectCatalog(?string $objectCatalog): SyncSetting {
		$this->objectCatalog = $objectCatalog;
		return $this;
	}

    public static function fromJson(?array $data): ?SyncSetting {
        if ($data === null) {
            return null;
        }
        return (new SyncSetting())
            ->withObjectCatalog(array_key_exists('objectCatalog', $data) && $data['objectCatalog'] !== null ? $data['objectCatalog'] : null);
    }

    public function toJson(): array {
        return array(
            "objectCatalog" => $this->getObjectCatalog(),
        );
    }
}