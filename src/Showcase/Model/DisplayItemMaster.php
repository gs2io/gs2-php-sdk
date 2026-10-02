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
 * Displayed Item Master Data
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#displayitemmaster
 */
class DisplayItemMaster implements IModel {
	/**
     * @var string Displayed Item ID
	 */
	private $displayItemId;
	/**
     * @var string Type
	 */
	private $type;
	/**
     * @var string Sales Item name
	 */
	private $salesItemName;
	/**
     * @var string Sales Item Group name
	 */
	private $salesItemGroupName;
	/**
     * @var string GS2-Schedule event GRN with sales periods for this display item
	 */
	private $salesPeriodEventId;
	/**
     * @var int Revision
	 */
	private $revision;
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
     * @return DisplayItemMaster
     */
	public function withDisplayItemId(?string $displayItemId): DisplayItemMaster {
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
     * @return DisplayItemMaster
     */
	public function withType(?string $type): DisplayItemMaster {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Sales Item name */
	public function getSalesItemName(): ?string {
		return $this->salesItemName;
	}
    /** @param string|null $salesItemName Sales Item name */
	public function setSalesItemName(?string $salesItemName) {
		$this->salesItemName = $salesItemName;
	}
    /**
     * @param string|null $salesItemName Sales Item name
     * @return DisplayItemMaster
     */
	public function withSalesItemName(?string $salesItemName): DisplayItemMaster {
		$this->salesItemName = $salesItemName;
		return $this;
	}
    /** @return string|null Sales Item Group name */
	public function getSalesItemGroupName(): ?string {
		return $this->salesItemGroupName;
	}
    /** @param string|null $salesItemGroupName Sales Item Group name */
	public function setSalesItemGroupName(?string $salesItemGroupName) {
		$this->salesItemGroupName = $salesItemGroupName;
	}
    /**
     * @param string|null $salesItemGroupName Sales Item Group name
     * @return DisplayItemMaster
     */
	public function withSalesItemGroupName(?string $salesItemGroupName): DisplayItemMaster {
		$this->salesItemGroupName = $salesItemGroupName;
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
     * @return DisplayItemMaster
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): DisplayItemMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return DisplayItemMaster
     */
	public function withRevision(?int $revision): DisplayItemMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?DisplayItemMaster {
        if ($data === null) {
            return null;
        }
        return (new DisplayItemMaster())
            ->withDisplayItemId(array_key_exists('displayItemId', $data) && $data['displayItemId'] !== null ? $data['displayItemId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withSalesItemName(array_key_exists('salesItemName', $data) && $data['salesItemName'] !== null ? $data['salesItemName'] : null)
            ->withSalesItemGroupName(array_key_exists('salesItemGroupName', $data) && $data['salesItemGroupName'] !== null ? $data['salesItemGroupName'] : null)
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "displayItemId" => $this->getDisplayItemId(),
            "type" => $this->getType(),
            "salesItemName" => $this->getSalesItemName(),
            "salesItemGroupName" => $this->getSalesItemGroupName(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
            "revision" => $this->getRevision(),
        );
    }
}