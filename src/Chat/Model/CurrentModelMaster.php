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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;


/**
 * Currently active Message Category Model master data
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#currentmodelmaster
 */
class CurrentModelMaster implements IModel {
	/**
     * @var string Namespace GRN
	 */
	private $namespaceId;
	/**
     * @var string Master data
	 */
	private $settings;
    /** @return string|null Namespace GRN */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId Namespace GRN */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId Namespace GRN
     * @return CurrentModelMaster
     */
	public function withNamespaceId(?string $namespaceId): CurrentModelMaster {
		$this->namespaceId = $namespaceId;
		return $this;
	}
    /** @return string|null Master data */
	public function getSettings(): ?string {
		return $this->settings;
	}
    /** @param string|null $settings Master data */
	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}
    /**
     * @param string|null $settings Master data
     * @return CurrentModelMaster
     */
	public function withSettings(?string $settings): CurrentModelMaster {
		$this->settings = $settings;
		return $this;
	}

    public static function fromJson(?array $data): ?CurrentModelMaster {
        if ($data === null) {
            return null;
        }
        return (new CurrentModelMaster())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
            ->withSettings(array_key_exists('settings', $data) && $data['settings'] !== null ? $data['settings'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "settings" => $this->getSettings(),
        );
    }
}