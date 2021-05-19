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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;

/**
 * 素材
 *
 * @author Game Server Services, Inc.
 *
 */
class Material implements IModel {
	/**
     * @var string 強化対象の GS2-Inventory アイテムセットGRN
	 */
	protected $materialItemSetId;

	/**
	 * 強化対象の GS2-Inventory アイテムセットGRNを取得
	 *
	 * @return string|null 強化対象の GS2-Inventory アイテムセットGRN
	 */
	public function getMaterialItemSetId(): ?string {
		return $this->materialItemSetId;
	}

	/**
	 * 強化対象の GS2-Inventory アイテムセットGRNを設定
	 *
	 * @param string|null $materialItemSetId 強化対象の GS2-Inventory アイテムセットGRN
	 */
	public function setMaterialItemSetId(?string $materialItemSetId) {
		$this->materialItemSetId = $materialItemSetId;
	}

	/**
	 * 強化対象の GS2-Inventory アイテムセットGRNを設定
	 *
	 * @param string|null $materialItemSetId 強化対象の GS2-Inventory アイテムセットGRN
	 * @return Material $this
	 */
	public function withMaterialItemSetId(?string $materialItemSetId): Material {
		$this->materialItemSetId = $materialItemSetId;
		return $this;
	}
	/**
     * @var int 消費数量
	 */
	protected $count;

	/**
	 * 消費数量を取得
	 *
	 * @return int|null 消費数量
	 */
	public function getCount(): ?int {
		return $this->count;
	}

	/**
	 * 消費数量を設定
	 *
	 * @param int|null $count 消費数量
	 */
	public function setCount(?int $count) {
		$this->count = $count;
	}

	/**
	 * 消費数量を設定
	 *
	 * @param int|null $count 消費数量
	 * @return Material $this
	 */
	public function withCount(?int $count): Material {
		$this->count = $count;
		return $this;
	}

    public function toJson(): array {
        return array(
            "materialItemSetId" => $this->materialItemSetId,
            "count" => $this->count,
        );
    }

    public static function fromJson(array $data): Material {
        $model = new Material();
        $model->setMaterialItemSetId(isset($data["materialItemSetId"]) ? $data["materialItemSetId"] : null);
        $model->setCount(isset($data["count"]) ? $data["count"] : null);
        return $model;
    }
}