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

namespace Gs2\Limit\Model;

use Gs2\Core\Model\IModel;

/**
 * 現在有効な回数制限設定
 *
 * @author Game Server Services, Inc.
 *
 */
class CurrentLimitMaster implements IModel {
	/**
     * @var string ネームスペース名
	 */
	protected $namespaceName;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $namespaceName ネームスペース名
	 */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $namespaceName ネームスペース名
	 * @return CurrentLimitMaster $this
	 */
	public function withNamespaceName(?string $namespaceName): CurrentLimitMaster {
		$this->namespaceName = $namespaceName;
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
	 * @return CurrentLimitMaster $this
	 */
	public function withSettings(?string $settings): CurrentLimitMaster {
		$this->settings = $settings;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceName" => $this->namespaceName,
            "settings" => $this->settings,
        );
    }

    public static function fromJson(array $data): CurrentLimitMaster {
        $model = new CurrentLimitMaster();
        $model->setNamespaceName(isset($data["namespaceName"]) ? $data["namespaceName"] : null);
        $model->setSettings(isset($data["settings"]) ? $data["settings"] : null);
        return $model;
    }
}