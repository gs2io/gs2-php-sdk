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
 * Displayed Item
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#displayitem
 */
class DisplayItem implements IModel {
	/**
     * @var string Displayed Item ID
	 */
	private $displayItemId;
	/**
     * @var string Type
	 */
	private $type;
	/**
     * @var SalesItem Sales Item
	 */
	private $salesItem;
	/**
     * @var SalesItemGroup Sales Item Group
	 */
	private $salesItemGroup;
	/**
     * @var string GS2-Schedule event GRN with sales periods for this display item
	 */
	private $salesPeriodEventId;
    /** @return string|null Displayed Item ID */
	public function getDisplayItemId(): ?string {
		return $this->displayItemId;
	}
    /** @param string|null $displayItemId Displayed Item ID */
	public function setDisplayItemId(?string $displayItemId) {
		$this->displayItemId = $displayItemId;
	}
    /**
     * @param string|null $displayItemId Displayed Item ID
     * @return DisplayItem
     */
	public function withDisplayItemId(?string $displayItemId): DisplayItem {
		$this->displayItemId = $displayItemId;
		return $this;
	}
    /** @return string|null Type */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Type */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Type
     * @return DisplayItem
     */
	public function withType(?string $type): DisplayItem {
		$this->type = $type;
		return $this;
	}
    /** @return SalesItem|null Sales Item */
	public function getSalesItem(): ?SalesItem {
		return $this->salesItem;
	}
    /** @param SalesItem|null $salesItem Sales Item */
	public function setSalesItem(?SalesItem $salesItem) {
		$this->salesItem = $salesItem;
	}
    /**
     * @param SalesItem|null $salesItem Sales Item
     * @return DisplayItem
     */
	public function withSalesItem(?SalesItem $salesItem): DisplayItem {
		$this->salesItem = $salesItem;
		return $this;
	}
    /** @return SalesItemGroup|null Sales Item Group */
	public function getSalesItemGroup(): ?SalesItemGroup {
		return $this->salesItemGroup;
	}
    /** @param SalesItemGroup|null $salesItemGroup Sales Item Group */
	public function setSalesItemGroup(?SalesItemGroup $salesItemGroup) {
		$this->salesItemGroup = $salesItemGroup;
	}
    /**
     * @param SalesItemGroup|null $salesItemGroup Sales Item Group
     * @return DisplayItem
     */
	public function withSalesItemGroup(?SalesItemGroup $salesItemGroup): DisplayItem {
		$this->salesItemGroup = $salesItemGroup;
		return $this;
	}
    /** @return string|null GS2-Schedule event GRN with sales periods for this display item */
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}
    /** @param string|null $salesPeriodEventId GS2-Schedule event GRN with sales periods for this display item */
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}
    /**
     * @param string|null $salesPeriodEventId GS2-Schedule event GRN with sales periods for this display item
     * @return DisplayItem
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): DisplayItem {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?DisplayItem {
        if ($data === null) {
            return null;
        }
        return (new DisplayItem())
            ->withDisplayItemId(array_key_exists('displayItemId', $data) && $data['displayItemId'] !== null ? $data['displayItemId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withSalesItem(array_key_exists('salesItem', $data) && $data['salesItem'] !== null ? SalesItem::fromJson($data['salesItem']) : null)
            ->withSalesItemGroup(array_key_exists('salesItemGroup', $data) && $data['salesItemGroup'] !== null ? SalesItemGroup::fromJson($data['salesItemGroup']) : null)
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null);
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