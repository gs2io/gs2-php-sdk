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

namespace Gs2\Schedule\Model;

use Gs2\Core\Model\IModel;

/**
 * 現在有効なイベントスケジュールマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class CurrentEventMaster implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 * @return CurrentEventMaster $this
	 */
	public function withNamespaceId(?string $namespaceId): CurrentEventMaster {
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
	 * @return CurrentEventMaster $this
	 */
	public function withSettings(?string $settings): CurrentEventMaster {
		$this->settings = $settings;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "settings" => $this->settings,
        );
    }

    public static function fromJson(array $data): CurrentEventMaster {
        $model = new CurrentEventMaster();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setSettings(isset($data["settings"]) ? $data["settings"] : null);
        return $model;
    }
}