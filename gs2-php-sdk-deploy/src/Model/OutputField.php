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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;

/**
 * Output に記録するフィールド
 *
 * @author Game Server Services, Inc.
 *
 */
class OutputField implements IModel {
	/**
     * @var string 名前
	 */
	protected $name;

	/**
	 * 名前を取得
	 *
	 * @return string|null 名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $name 名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $name 名前
	 * @return OutputField $this
	 */
	public function withName(?string $name): OutputField {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string フィールド名
	 */
	protected $fieldName;

	/**
	 * フィールド名を取得
	 *
	 * @return string|null フィールド名
	 */
	public function getFieldName(): ?string {
		return $this->fieldName;
	}

	/**
	 * フィールド名を設定
	 *
	 * @param string|null $fieldName フィールド名
	 */
	public function setFieldName(?string $fieldName) {
		$this->fieldName = $fieldName;
	}

	/**
	 * フィールド名を設定
	 *
	 * @param string|null $fieldName フィールド名
	 * @return OutputField $this
	 */
	public function withFieldName(?string $fieldName): OutputField {
		$this->fieldName = $fieldName;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "fieldName" => $this->fieldName,
        );
    }

    public static function fromJson(array $data): OutputField {
        $model = new OutputField();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setFieldName(isset($data["fieldName"]) ? $data["fieldName"] : null);
        return $model;
    }
}