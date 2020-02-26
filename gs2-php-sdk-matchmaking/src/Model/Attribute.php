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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;

/**
 * プレイヤーの属性値
 *
 * @author Game Server Services, Inc.
 *
 */
class Attribute implements IModel {
	/**
     * @var string 属性名
	 */
	protected $name;

	/**
	 * 属性名を取得
	 *
	 * @return string|null 属性名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 属性名を設定
	 *
	 * @param string|null $name 属性名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 属性名を設定
	 *
	 * @param string|null $name 属性名
	 * @return Attribute $this
	 */
	public function withName(?string $name): Attribute {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int 属性値
	 */
	protected $value;

	/**
	 * 属性値を取得
	 *
	 * @return int|null 属性値
	 */
	public function getValue(): ?int {
		return $this->value;
	}

	/**
	 * 属性値を設定
	 *
	 * @param int|null $value 属性値
	 */
	public function setValue(?int $value) {
		$this->value = $value;
	}

	/**
	 * 属性値を設定
	 *
	 * @param int|null $value 属性値
	 * @return Attribute $this
	 */
	public function withValue(?int $value): Attribute {
		$this->value = $value;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "value" => $this->value,
        );
    }

    public static function fromJson(array $data): Attribute {
        $model = new Attribute();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        return $model;
    }
}