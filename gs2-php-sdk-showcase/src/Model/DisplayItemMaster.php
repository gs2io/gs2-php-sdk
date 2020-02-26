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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;

/**
 * None
 *
 * @author Game Server Services, Inc.
 *
 */
class DisplayItemMaster implements IModel {
	/**
     * @var string 陳列商品ID
	 */
	protected $displayItemId;

	/**
	 * 陳列商品IDを取得
	 *
	 * @return string|null 陳列商品ID
	 */
	public function getDisplayItemId(): ?string {
		return $this->displayItemId;
	}

	/**
	 * 陳列商品IDを設定
	 *
	 * @param string|null $displayItemId 陳列商品ID
	 */
	public function setDisplayItemId(?string $displayItemId) {
		$this->displayItemId = $displayItemId;
	}

	/**
	 * 陳列商品IDを設定
	 *
	 * @param string|null $displayItemId 陳列商品ID
	 * @return DisplayItemMaster $this
	 */
	public function withDisplayItemId(?string $displayItemId): DisplayItemMaster {
		$this->displayItemId = $displayItemId;
		return $this;
	}
	/**
     * @var string 種類
	 */
	protected $type;

	/**
	 * 種類を取得
	 *
	 * @return string|null 種類
	 */
	public function getType(): ?string {
		return $this->type;
	}

	/**
	 * 種類を設定
	 *
	 * @param string|null $type 種類
	 */
	public function setType(?string $type) {
		$this->type = $type;
	}

	/**
	 * 種類を設定
	 *
	 * @param string|null $type 種類
	 * @return DisplayItemMaster $this
	 */
	public function withType(?string $type): DisplayItemMaster {
		$this->type = $type;
		return $this;
	}
	/**
     * @var string 陳列する商品の名前
	 */
	protected $salesItemName;

	/**
	 * 陳列する商品の名前を取得
	 *
	 * @return string|null 陳列する商品の名前
	 */
	public function getSalesItemName(): ?string {
		return $this->salesItemName;
	}

	/**
	 * 陳列する商品の名前を設定
	 *
	 * @param string|null $salesItemName 陳列する商品の名前
	 */
	public function setSalesItemName(?string $salesItemName) {
		$this->salesItemName = $salesItemName;
	}

	/**
	 * 陳列する商品の名前を設定
	 *
	 * @param string|null $salesItemName 陳列する商品の名前
	 * @return DisplayItemMaster $this
	 */
	public function withSalesItemName(?string $salesItemName): DisplayItemMaster {
		$this->salesItemName = $salesItemName;
		return $this;
	}
	/**
     * @var string 陳列する商品グループの名前
	 */
	protected $salesItemGroupName;

	/**
	 * 陳列する商品グループの名前を取得
	 *
	 * @return string|null 陳列する商品グループの名前
	 */
	public function getSalesItemGroupName(): ?string {
		return $this->salesItemGroupName;
	}

	/**
	 * 陳列する商品グループの名前を設定
	 *
	 * @param string|null $salesItemGroupName 陳列する商品グループの名前
	 */
	public function setSalesItemGroupName(?string $salesItemGroupName) {
		$this->salesItemGroupName = $salesItemGroupName;
	}

	/**
	 * 陳列する商品グループの名前を設定
	 *
	 * @param string|null $salesItemGroupName 陳列する商品グループの名前
	 * @return DisplayItemMaster $this
	 */
	public function withSalesItemGroupName(?string $salesItemGroupName): DisplayItemMaster {
		$this->salesItemGroupName = $salesItemGroupName;
		return $this;
	}
	/**
     * @var string 販売期間とするイベントマスター のGRN
	 */
	protected $salesPeriodEventId;

	/**
	 * 販売期間とするイベントマスター のGRNを取得
	 *
	 * @return string|null 販売期間とするイベントマスター のGRN
	 */
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	/**
	 * 販売期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $salesPeriodEventId 販売期間とするイベントマスター のGRN
	 */
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	/**
	 * 販売期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $salesPeriodEventId 販売期間とするイベントマスター のGRN
	 * @return DisplayItemMaster $this
	 */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): DisplayItemMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "displayItemId" => $this->displayItemId,
            "type" => $this->type,
            "salesItemName" => $this->salesItemName,
            "salesItemGroupName" => $this->salesItemGroupName,
            "salesPeriodEventId" => $this->salesPeriodEventId,
        );
    }

    public static function fromJson(array $data): DisplayItemMaster {
        $model = new DisplayItemMaster();
        $model->setDisplayItemId(isset($data["displayItemId"]) ? $data["displayItemId"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setSalesItemName(isset($data["salesItemName"]) ? $data["salesItemName"] : null);
        $model->setSalesItemGroupName(isset($data["salesItemGroupName"]) ? $data["salesItemGroupName"] : null);
        $model->setSalesPeriodEventId(isset($data["salesPeriodEventId"]) ? $data["salesPeriodEventId"] : null);
        return $model;
    }
}