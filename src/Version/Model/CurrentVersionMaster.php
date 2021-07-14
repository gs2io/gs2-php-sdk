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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;


class CurrentVersionMaster implements IModel {
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

	public function withNamespaceId(?string $namespaceId): CurrentVersionMaster {
		$this->namespaceId = $namespaceId;
		return $this;
	}

	public function getSettings(): ?string {
		return $this->settings;
	}

	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}

	public function withSettings(?string $settings): CurrentVersionMaster {
		$this->settings = $settings;
		return $this;
	}

    public static function fromJson(?array $data): ?CurrentVersionMaster {
        if ($data === null) {
            return null;
        }
        return (new CurrentVersionMaster())
            ->withNamespaceId(empty($data['namespaceId']) ? null : $data['namespaceId'])
            ->withSettings(empty($data['settings']) ? null : $data['settings']);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "settings" => $this->getSettings(),
        );
    }
}