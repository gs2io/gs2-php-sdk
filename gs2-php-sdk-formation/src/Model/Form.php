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
 * フォーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Form implements IModel {
	/**
     * @var string フォーム
	 */
	protected $formId;

	/**
	 * フォームを取得
	 *
	 * @return string|null フォーム
	 */
	public function getFormId(): ?string {
		return $this->formId;
	}

	/**
	 * フォームを設定
	 *
	 * @param string|null $formId フォーム
	 */
	public function setFormId(?string $formId) {
		$this->formId = $formId;
	}

	/**
	 * フォームを設定
	 *
	 * @param string|null $formId フォーム
	 * @return Form $this
	 */
	public function withFormId(?string $formId): Form {
		$this->formId = $formId;
		return $this;
	}
	/**
     * @var string フォームの保存領域の名前
	 */
	protected $name;

	/**
	 * フォームの保存領域の名前を取得
	 *
	 * @return string|null フォームの保存領域の名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * フォームの保存領域の名前を設定
	 *
	 * @param string|null $name フォームの保存領域の名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * フォームの保存領域の名前を設定
	 *
	 * @param string|null $name フォームの保存領域の名前
	 * @return Form $this
	 */
	public function withName(?string $name): Form {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int 保存領域のインデックス
	 */
	protected $index;

	/**
	 * 保存領域のインデックスを取得
	 *
	 * @return int|null 保存領域のインデックス
	 */
	public function getIndex(): ?int {
		return $this->index;
	}

	/**
	 * 保存領域のインデックスを設定
	 *
	 * @param int|null $index 保存領域のインデックス
	 */
	public function setIndex(?int $index) {
		$this->index = $index;
	}

	/**
	 * 保存領域のインデックスを設定
	 *
	 * @param int|null $index 保存領域のインデックス
	 * @return Form $this
	 */
	public function withIndex(?int $index): Form {
		$this->index = $index;
		return $this;
	}
	/**
     * @var Slot[] スロットリスト
	 */
	protected $slots;

	/**
	 * スロットリストを取得
	 *
	 * @return Slot[]|null スロットリスト
	 */
	public function getSlots(): ?array {
		return $this->slots;
	}

	/**
	 * スロットリストを設定
	 *
	 * @param Slot[]|null $slots スロットリスト
	 */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}

	/**
	 * スロットリストを設定
	 *
	 * @param Slot[]|null $slots スロットリスト
	 * @return Form $this
	 */
	public function withSlots(?array $slots): Form {
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
	 * @return Form $this
	 */
	public function withCreatedAt(?int $createdAt): Form {
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
	 * @return Form $this
	 */
	public function withUpdatedAt(?int $updatedAt): Form {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "formId" => $this->formId,
            "name" => $this->name,
            "index" => $this->index,
            "slots" => array_map(
                function (Slot $v) {
                    return $v->toJson();
                },
                $this->slots == null ? [] : $this->slots
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Form {
        $model = new Form();
        $model->setFormId(isset($data["formId"]) ? $data["formId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setIndex(isset($data["index"]) ? $data["index"] : null);
        $model->setSlots(array_map(
                function ($v) {
                    return Slot::fromJson($v);
                },
                isset($data["slots"]) ? $data["slots"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}