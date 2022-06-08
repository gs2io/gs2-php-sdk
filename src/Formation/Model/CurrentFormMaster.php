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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


class CurrentFormMaster implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $settings;
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
	public function withNamespaceId(?string $namespaceId): CurrentFormMaster {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	public function getSettings(): ?string {
		return $this->settings;
	}
	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}
	public function withSettings(?string $settings): CurrentFormMaster {
		$this->settings = $settings;
		return $this;
	}

    public static function fromJson(?array $data): ?CurrentFormMaster {
        if ($data === null) {
            return null;
        }
        return (new CurrentFormMaster())
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