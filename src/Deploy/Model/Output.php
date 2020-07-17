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
 * アウトプット
 *
 * @author Game Server Services, Inc.
 *
 */
class Output implements IModel {
	/**
     * @var string アウトプット
	 */
	protected $outputId;

	/**
	 * アウトプットを取得
	 *
	 * @return string|null アウトプット
	 */
	public function getOutputId(): ?string {
		return $this->outputId;
	}

	/**
	 * アウトプットを設定
	 *
	 * @param string|null $outputId アウトプット
	 */
	public function setOutputId(?string $outputId) {
		$this->outputId = $outputId;
	}

	/**
	 * アウトプットを設定
	 *
	 * @param string|null $outputId アウトプット
	 * @return Output $this
	 */
	public function withOutputId(?string $outputId): Output {
		$this->outputId = $outputId;
		return $this;
	}
	/**
     * @var string アウトプット名
	 */
	protected $name;

	/**
	 * アウトプット名を取得
	 *
	 * @return string|null アウトプット名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * アウトプット名を設定
	 *
	 * @param string|null $name アウトプット名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * アウトプット名を設定
	 *
	 * @param string|null $name アウトプット名
	 * @return Output $this
	 */
	public function withName(?string $name): Output {
		$this->name = $name;
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
	 * @return Output $this
	 */
	public function withValue(?string $value): Output {
		$this->value = $value;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Output $this
	 */
	public function withCreatedAt(?int $createdAt): Output {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "outputId" => $this->outputId,
            "name" => $this->name,
            "value" => $this->value,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Output {
        $model = new Output();
        $model->setOutputId(isset($data["outputId"]) ? $data["outputId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}