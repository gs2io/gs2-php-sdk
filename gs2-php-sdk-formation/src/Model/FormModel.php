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
 * フォームモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class FormModel implements IModel {
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
	 * @return FormModel $this
	 */
	public function withFormModelId(?string $formModelId): FormModel {
		$this->formModelId = $formModelId;
		return $this;
	}
	/**
     * @var string フォームの種類名
	 */
	protected $name;

	/**
	 * フォームの種類名を取得
	 *
	 * @return string|null フォームの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * フォームの種類名を設定
	 *
	 * @param string|null $name フォームの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * フォームの種類名を設定
	 *
	 * @param string|null $name フォームの種類名
	 * @return FormModel $this
	 */
	public function withName(?string $name): FormModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string フォームの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * フォームの種類のメタデータを取得
	 *
	 * @return string|null フォームの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * フォームの種類のメタデータを設定
	 *
	 * @param string|null $metadata フォームの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * フォームの種類のメタデータを設定
	 *
	 * @param string|null $metadata フォームの種類のメタデータ
	 * @return FormModel $this
	 */
	public function withMetadata(?string $metadata): FormModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var SlotModel[] スリットリスト
	 */
	protected $slots;

	/**
	 * スリットリストを取得
	 *
	 * @return SlotModel[]|null スリットリスト
	 */
	public function getSlots(): ?array {
		return $this->slots;
	}

	/**
	 * スリットリストを設定
	 *
	 * @param SlotModel[]|null $slots スリットリスト
	 */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}

	/**
	 * スリットリストを設定
	 *
	 * @param SlotModel[]|null $slots スリットリスト
	 * @return FormModel $this
	 */
	public function withSlots(?array $slots): FormModel {
		$this->slots = $slots;
		return $this;
	}

    public function toJson(): array {
        return array(
            "formModelId" => $this->formModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "slots" => array_map(
                function (SlotModel $v) {
                    return $v->toJson();
                },
                $this->slots == null ? [] : $this->slots
            ),
        );
    }

    public static function fromJson(array $data): FormModel {
        $model = new FormModel();
        $model->setFormModelId(isset($data["formModelId"]) ? $data["formModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setSlots(array_map(
                function ($v) {
                    return SlotModel::fromJson($v);
                },
                isset($data["slots"]) ? $data["slots"] : []
            )
        );
        return $model;
    }
}