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


class DisplayItemMaster implements IModel {
	/**
     * @var string
	 */
	private $displayItemId;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var string
	 */
	private $salesItemName;
	/**
     * @var string
	 */
	private $salesItemGroupName;
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

	public function withDisplayItemId(?string $displayItemId): DisplayItemMaster {
		$this->displayItemId = $displayItemId;
		return $this;
	}

	public function getType(): ?string {
		return $this->type;
	}

	public function setType(?string $type) {
		$this->type = $type;
	}

	public function withType(?string $type): DisplayItemMaster {
		$this->type = $type;
		return $this;
	}

	public function getSalesItemName(): ?string {
		return $this->salesItemName;
	}

	public function setSalesItemName(?string $salesItemName) {
		$this->salesItemName = $salesItemName;
	}

	public function withSalesItemName(?string $salesItemName): DisplayItemMaster {
		$this->salesItemName = $salesItemName;
		return $this;
	}

	public function getSalesItemGroupName(): ?string {
		return $this->salesItemGroupName;
	}

	public function setSalesItemGroupName(?string $salesItemGroupName) {
		$this->salesItemGroupName = $salesItemGroupName;
	}

	public function withSalesItemGroupName(?string $salesItemGroupName): DisplayItemMaster {
		$this->salesItemGroupName = $salesItemGroupName;
		return $this;
	}

	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	public function withSalesPeriodEventId(?string $salesPeriodEventId): DisplayItemMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?DisplayItemMaster {
        if ($data === null) {
            return null;
        }
        return (new DisplayItemMaster())
            ->withDisplayItemId(empty($data['displayItemId']) ? null : $data['displayItemId'])
            ->withType(empty($data['type']) ? null : $data['type'])
            ->withSalesItemName(empty($data['salesItemName']) ? null : $data['salesItemName'])
            ->withSalesItemGroupName(empty($data['salesItemGroupName']) ? null : $data['salesItemGroupName'])
            ->withSalesPeriodEventId(empty($data['salesPeriodEventId']) ? null : $data['salesPeriodEventId']);
    }

    public function toJson(): array {
        return array(
            "displayItemId" => $this->getDisplayItemId(),
            "type" => $this->getType(),
            "salesItemName" => $this->getSalesItemName(),
            "salesItemGroupName" => $this->getSalesItemGroupName(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
        );
    }
}