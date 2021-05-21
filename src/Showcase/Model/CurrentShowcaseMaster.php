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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;

/**
 * 現在有効な陳列棚マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class CurrentShowcaseMaster implements IModel {
	/**
     * @var string 現在有効な陳列棚マスター
	 */
	protected $namespaceId;

	/**
	 * 現在有効な陳列棚マスターを取得
	 *
	 * @return string|null 現在有効な陳列棚マスター
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * 現在有効な陳列棚マスターを設定
	 *
	 * @param string|null $namespaceId 現在有効な陳列棚マスター
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * 現在有効な陳列棚マスターを設定
	 *
	 * @param string|null $namespaceId 現在有効な陳列棚マスター
	 * @return CurrentShowcaseMaster $this
	 */
	public function withNamespaceId(?string $namespaceId): CurrentShowcaseMaster {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string マスターデータ
	 */
	protected $settings;

	/**
	 * マスターデータを取得
	 *
	 * @return string|null マスターデータ
	 */
	public function getSettings(): ?string {
		return $this->settings;
	}

	/**
	 * マスターデータを設定
	 *
	 * @param string|null $settings マスターデータ
	 */
	public function setSettings(?string $settings) {
		$this->settings = $settings;
	}

	/**
	 * マスターデータを設定
	 *
	 * @param string|null $settings マスターデータ
	 * @return CurrentShowcaseMaster $this
	 */
	public function withSettings(?string $settings): CurrentShowcaseMaster {
		$this->settings = $settings;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "settings" => $this->settings,
        );
    }

    public static function fromJson(array $data): CurrentShowcaseMaster {
        $model = new CurrentShowcaseMaster();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setSettings(isset($data["settings"]) ? $data["settings"] : null);
        return $model;
    }
}