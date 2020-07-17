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

/**
 * フォームの保存領域マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class MoldModelMaster implements IModel {
	/**
     * @var string フォームの保存領域マスター
	 */
	protected $moldModelId;

	/**
	 * フォームの保存領域マスターを取得
	 *
	 * @return string|null フォームの保存領域マスター
	 */
	public function getMoldModelId(): ?string {
		return $this->moldModelId;
	}

	/**
	 * フォームの保存領域マスターを設定
	 *
	 * @param string|null $moldModelId フォームの保存領域マスター
	 */
	public function setMoldModelId(?string $moldModelId) {
		$this->moldModelId = $moldModelId;
	}

	/**
	 * フォームの保存領域マスターを設定
	 *
	 * @param string|null $moldModelId フォームの保存領域マスター
	 * @return MoldModelMaster $this
	 */
	public function withMoldModelId(?string $moldModelId): MoldModelMaster {
		$this->moldModelId = $moldModelId;
		return $this;
	}
	/**
     * @var string フォームの保存領域名
	 */
	protected $name;

	/**
	 * フォームの保存領域名を取得
	 *
	 * @return string|null フォームの保存領域名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * フォームの保存領域名を設定
	 *
	 * @param string|null $name フォームの保存領域名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * フォームの保存領域名を設定
	 *
	 * @param string|null $name フォームの保存領域名
	 * @return MoldModelMaster $this
	 */
	public function withName(?string $name): MoldModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string フォームの保存領域マスターの説明
	 */
	protected $description;

	/**
	 * フォームの保存領域マスターの説明を取得
	 *
	 * @return string|null フォームの保存領域マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * フォームの保存領域マスターの説明を設定
	 *
	 * @param string|null $description フォームの保存領域マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * フォームの保存領域マスターの説明を設定
	 *
	 * @param string|null $description フォームの保存領域マスターの説明
	 * @return MoldModelMaster $this
	 */
	public function withDescription(?string $description): MoldModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string フォームの保存領域のメタデータ
	 */
	protected $metadata;

	/**
	 * フォームの保存領域のメタデータを取得
	 *
	 * @return string|null フォームの保存領域のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * フォームの保存領域のメタデータを設定
	 *
	 * @param string|null $metadata フォームの保存領域のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * フォームの保存領域のメタデータを設定
	 *
	 * @param string|null $metadata フォームの保存領域のメタデータ
	 * @return MoldModelMaster $this
	 */
	public function withMetadata(?string $metadata): MoldModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string フォーム名
	 */
	protected $formModelName;

	/**
	 * フォーム名を取得
	 *
	 * @return string|null フォーム名
	 */
	public function getFormModelName(): ?string {
		return $this->formModelName;
	}

	/**
	 * フォーム名を設定
	 *
	 * @param string|null $formModelName フォーム名
	 */
	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}

	/**
	 * フォーム名を設定
	 *
	 * @param string|null $formModelName フォーム名
	 * @return MoldModelMaster $this
	 */
	public function withFormModelName(?string $formModelName): MoldModelMaster {
		$this->formModelName = $formModelName;
		return $this;
	}
	/**
     * @var int フォームを保存できる初期キャパシティ
	 */
	protected $initialMaxCapacity;

	/**
	 * フォームを保存できる初期キャパシティを取得
	 *
	 * @return int|null フォームを保存できる初期キャパシティ
	 */
	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}

	/**
	 * フォームを保存できる初期キャパシティを設定
	 *
	 * @param int|null $initialMaxCapacity フォームを保存できる初期キャパシティ
	 */
	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}

	/**
	 * フォームを保存できる初期キャパシティを設定
	 *
	 * @param int|null $initialMaxCapacity フォームを保存できる初期キャパシティ
	 * @return MoldModelMaster $this
	 */
	public function withInitialMaxCapacity(?int $initialMaxCapacity): MoldModelMaster {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}
	/**
     * @var int フォームを保存できるキャパシティ
	 */
	protected $maxCapacity;

	/**
	 * フォームを保存できるキャパシティを取得
	 *
	 * @return int|null フォームを保存できるキャパシティ
	 */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	/**
	 * フォームを保存できるキャパシティを設定
	 *
	 * @param int|null $maxCapacity フォームを保存できるキャパシティ
	 */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	/**
	 * フォームを保存できるキャパシティを設定
	 *
	 * @param int|null $maxCapacity フォームを保存できるキャパシティ
	 * @return MoldModelMaster $this
	 */
	public function withMaxCapacity(?int $maxCapacity): MoldModelMaster {
		$this->maxCapacity = $maxCapacity;
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
	 * @return MoldModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): MoldModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return MoldModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): MoldModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "moldModelId" => $this->moldModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "formModelName" => $this->formModelName,
            "initialMaxCapacity" => $this->initialMaxCapacity,
            "maxCapacity" => $this->maxCapacity,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): MoldModelMaster {
        $model = new MoldModelMaster();
        $model->setMoldModelId(isset($data["moldModelId"]) ? $data["moldModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setFormModelName(isset($data["formModelName"]) ? $data["formModelName"] : null);
        $model->setInitialMaxCapacity(isset($data["initialMaxCapacity"]) ? $data["initialMaxCapacity"] : null);
        $model->setMaxCapacity(isset($data["maxCapacity"]) ? $data["maxCapacity"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}