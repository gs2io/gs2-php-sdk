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


class ShowcaseMaster implements IModel {
	/**
     * @var string
	 */
	private $showcaseId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $salesPeriodEventId;
	/**
     * @var array
	 */
	private $displayItems;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}

	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}

	public function withShowcaseId(?string $showcaseId): ShowcaseMaster {
		$this->showcaseId = $showcaseId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): ShowcaseMaster {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): ShowcaseMaster {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): ShowcaseMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	public function withSalesPeriodEventId(?string $salesPeriodEventId): ShowcaseMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}

	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}

	public function withDisplayItems(?array $displayItems): ShowcaseMaster {
		$this->displayItems = $displayItems;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): ShowcaseMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): ShowcaseMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?ShowcaseMaster {
        if ($data === null) {
            return null;
        }
        return (new ShowcaseMaster())
            ->withShowcaseId(array_key_exists('showcaseId', $data) && $data['showcaseId'] !== null ? $data['showcaseId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null)
            ->withDisplayItems(array_map(
                function ($item) {
                    return DisplayItemMaster::fromJson($item);
                },
                array_key_exists('displayItems', $data) && $data['displayItems'] !== null ? $data['displayItems'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "showcaseId" => $this->getShowcaseId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
            "displayItems" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems() !== null && $this->getDisplayItems() !== null ? $this->getDisplayItems() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}