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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;

/**
 * 設定値
 *
 * @author Game Server Services, Inc.
 *
 */
class Config implements IModel {
	/**
     * @var string 名前
	 */
	protected $key;

	/**
	 * 名前を取得
	 *
	 * @return string|null 名前
	 */
	public function getKey(): ?string {
		return $this->key;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $key 名前
	 */
	public function setKey(?string $key) {
		$this->key = $key;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $key 名前
	 * @return Config $this
	 */
	public function withKey(?string $key): Config {
		$this->key = $key;
		return $this;
	}
	/**
     * @var string 値
	 */
	protected $value;

	/**
	 * 値を取得
	 *
	 * @return string|null 値
	 */
	public function getValue(): ?string {
		return $this->value;
	}

	/**
	 * 値を設定
	 *
	 * @param string|null $value 値
	 */
	public function setValue(?string $value) {
		$this->value = $value;
	}

	/**
	 * 値を設定
	 *
	 * @param string|null $value 値
	 * @return Config $this
	 */
	public function withValue(?string $value): Config {
		$this->value = $value;
		return $this;
	}

    public function toJson(): array {
        return array(
            "key" => $this->key,
            "value" => $this->value,
        );
    }

    public static function fromJson(array $data): Config {
        $model = new Config();
        $model->setKey(isset($data["key"]) ? $data["key"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        return $model;
    }
}