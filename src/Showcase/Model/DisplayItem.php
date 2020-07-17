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
 * 陳列された商品
 *
 * @author Game Server Services, Inc.
 *
 */
class DisplayItem implements IModel {
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
	 * @return DisplayItem $this
	 */
	public function withDisplayItemId(?string $displayItemId): DisplayItem {
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
	 * @return DisplayItem $this
	 */
	public function withType(?string $type): DisplayItem {
		$this->type = $type;
		return $this;
	}
	/**
     * @var SalesItem 陳列する商品
	 */
	protected $salesItem;

	/**
	 * 陳列する商品を取得
	 *
	 * @return SalesItem|null 陳列する商品
	 */
	public function getSalesItem(): ?SalesItem {
		return $this->salesItem;
	}

	/**
	 * 陳列する商品を設定
	 *
	 * @param SalesItem|null $salesItem 陳列する商品
	 */
	public function setSalesItem(?SalesItem $salesItem) {
		$this->salesItem = $salesItem;
	}

	/**
	 * 陳列する商品を設定
	 *
	 * @param SalesItem|null $salesItem 陳列する商品
	 * @return DisplayItem $this
	 */
	public function withSalesItem(?SalesItem $salesItem): DisplayItem {
		$this->salesItem = $salesItem;
		return $this;
	}
	/**
     * @var SalesItemGroup 陳列する商品グループ
	 */
	protected $salesItemGroup;

	/**
	 * 陳列する商品グループを取得
	 *
	 * @return SalesItemGroup|null 陳列する商品グループ
	 */
	public function getSalesItemGroup(): ?SalesItemGroup {
		return $this->salesItemGroup;
	}

	/**
	 * 陳列する商品グループを設定
	 *
	 * @param SalesItemGroup|null $salesItemGroup 陳列する商品グループ
	 */
	public function setSalesItemGroup(?SalesItemGroup $salesItemGroup) {
		$this->salesItemGroup = $salesItemGroup;
	}

	/**
	 * 陳列する商品グループを設定
	 *
	 * @param SalesItemGroup|null $salesItemGroup 陳列する商品グループ
	 * @return DisplayItem $this
	 */
	public function withSalesItemGroup(?SalesItemGroup $salesItemGroup): DisplayItem {
		$this->salesItemGroup = $salesItemGroup;
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
	 * @return DisplayItem $this
	 */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): DisplayItem {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "displayItemId" => $this->displayItemId,
            "type" => $this->type,
            "salesItem" => $this->salesItem->toJson(),
            "salesItemGroup" => $this->salesItemGroup->toJson(),
            "salesPeriodEventId" => $this->salesPeriodEventId,
        );
    }

    public static function fromJson(array $data): DisplayItem {
        $model = new DisplayItem();
        $model->setDisplayItemId(isset($data["displayItemId"]) ? $data["displayItemId"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setSalesItem(isset($data["salesItem"]) ? SalesItem::fromJson($data["salesItem"]) : null);
        $model->setSalesItemGroup(isset($data["salesItemGroup"]) ? SalesItemGroup::fromJson($data["salesItemGroup"]) : null);
        $model->setSalesPeriodEventId(isset($data["salesPeriodEventId"]) ? $data["salesPeriodEventId"] : null);
        return $model;
    }
}