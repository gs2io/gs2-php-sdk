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


class DisplayItem implements IModel {
	/**
     * @var string
	 */
	private $displayItemId;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var SalesItem
	 */
	private $salesItem;
	/**
     * @var SalesItemGroup
	 */
	private $salesItemGroup;
	/**
     * @var string
	 */
	private $salesPeriodEventId;

	public function getDisplayItemId(): ?string {
		return $this->displayItemId;
	}

	public function setDisplayItemId(?string $displayItemId) {
		$this->displayItemId = $displayItemId;
	}

	public function withDisplayItemId(?string $displayItemId): DisplayItem {
		$this->displayItemId = $displayItemId;
		return $this;
	}

	public function getType(): ?string {
		return $this->type;
	}

	public function setType(?string $type) {
		$this->type = $type;
	}

	public function withType(?string $type): DisplayItem {
		$this->type = $type;
		return $this;
	}

	public function getSalesItem(): ?SalesItem {
		return $this->salesItem;
	}

	public function setSalesItem(?SalesItem $salesItem) {
		$this->salesItem = $salesItem;
	}

	public function withSalesItem(?SalesItem $salesItem): DisplayItem {
		$this->salesItem = $salesItem;
		return $this;
	}

	public function getSalesItemGroup(): ?SalesItemGroup {
		return $this->salesItemGroup;
	}

	public function setSalesItemGroup(?SalesItemGroup $salesItemGroup) {
		$this->salesItemGroup = $salesItemGroup;
	}

	public function withSalesItemGroup(?SalesItemGroup $salesItemGroup): DisplayItem {
		$this->salesItemGroup = $salesItemGroup;
		return $this;
	}

	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	public function withSalesPeriodEventId(?string $salesPeriodEventId): DisplayItem {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?DisplayItem {
        if ($data === null) {
            return null;
        }
        return (new DisplayItem())
            ->withDisplayItemId(empty($data['displayItemId']) ? null : $data['displayItemId'])
            ->withType(empty($data['type']) ? null : $data['type'])
            ->withSalesItem(empty($data['salesItem']) ? null : SalesItem::fromJson($data['salesItem']))
            ->withSalesItemGroup(empty($data['salesItemGroup']) ? null : SalesItemGroup::fromJson($data['salesItemGroup']))
            ->withSalesPeriodEventId(empty($data['salesPeriodEventId']) ? null : $data['salesPeriodEventId']);
    }

    public function toJson(): array {
        return array(
            "displayItemId" => $this->getDisplayItemId(),
            "type" => $this->getType(),
            "salesItem" => $this->getSalesItem() !== null ? $this->getSalesItem()->toJson() : null,
            "salesItemGroup" => $this->getSalesItemGroup() !== null ? $this->getSalesItemGroup()->toJson() : null,
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
        );
    }
}