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
 * フォームマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class FormModelMaster implements IModel {
	/**
     * @var string フォームマスター
	 */
	protected $formModelId;

	/**
	 * フォームマスターを取得
	 *
	 * @return string|null フォームマスター
	 */
	public function getFormModelId(): ?string {
		return $this->formModelId;
	}

	/**
	 * フォームマスターを設定
	 *
	 * @param string|null $formModelId フォームマスター
	 */
	public function setFormModelId(?string $formModelId) {
		$this->formModelId = $formModelId;
	}

	/**
	 * フォームマスターを設定
	 *
	 * @param string|null $formModelId フォームマスター
	 * @return FormModelMaster $this
	 */
	public function withFormModelId(?string $formModelId): FormModelMaster {
		$this->formModelId = $formModelId;
		return $this;
	}
	/**
     * @var string フォーム名
	 */
	protected $name;

	/**
	 * フォーム名を取得
	 *
	 * @return string|null フォーム名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * フォーム名を設定
	 *
	 * @param string|null $name フォーム名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * フォーム名を設定
	 *
	 * @param string|null $name フォーム名
	 * @return FormModelMaster $this
	 */
	public function withName(?string $name): FormModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string フォームマスターの説明
	 */
	protected $description;

	/**
	 * フォームマスターの説明を取得
	 *
	 * @return string|null フォームマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * フォームマスターの説明を設定
	 *
	 * @param string|null $description フォームマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * フォームマスターの説明を設定
	 *
	 * @param string|null $description フォームマスターの説明
	 * @return FormModelMaster $this
	 */
	public function withDescription(?string $description): FormModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string フォームのメタデータ
	 */
	protected $metadata;

	/**
	 * フォームのメタデータを取得
	 *
	 * @return string|null フォームのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * フォームのメタデータを設定
	 *
	 * @param string|null $metadata フォームのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * フォームのメタデータを設定
	 *
	 * @param string|null $metadata フォームのメタデータ
	 * @return FormModelMaster $this
	 */
	public function withMetadata(?string $metadata): FormModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var SlotModel[] スロットリスト
	 */
	protected $slots;

	/**
	 * スロットリストを取得
	 *
	 * @return SlotModel[]|null スロットリスト
	 */
	public function getSlots(): ?array {
		return $this->slots;
	}

	/**
	 * スロットリストを設定
	 *
	 * @param SlotModel[]|null $slots スロットリスト
	 */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}

	/**
	 * スロットリストを設定
	 *
	 * @param SlotModel[]|null $slots スロットリスト
	 * @return FormModelMaster $this
	 */
	public function withSlots(?array $slots): FormModelMaster {
		$this->slots = $slots;
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
	 * @return FormModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): FormModelMaster {
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
	 * @return FormModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): FormModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "formModelId" => $this->formModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "slots" => array_map(
                function (SlotModel $v) {
                    return $v->toJson();
                },
                $this->slots == null ? [] : $this->slots
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): FormModelMaster {
        $model = new FormModelMaster();
        $model->setFormModelId(isset($data["formModelId"]) ? $data["formModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setSlots(array_map(
                function ($v) {
                    return SlotModel::fromJson($v);
                },
                isset($data["slots"]) ? $data["slots"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}