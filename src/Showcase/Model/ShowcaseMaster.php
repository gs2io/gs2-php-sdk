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
 * Showcase Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#showcasemaster
 */
class ShowcaseMaster implements IModel {
	/**
     * @var string Showcase Master GRN
	 */
	private $showcaseId;
	/**
     * @var string Showcase name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string GRN of the GS2-Schedule event that defines the sales period for the Showcase
	 */
	private $salesPeriodEventId;
	/**
     * @var array List of Display Items
	 */
	private $displayItems;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Showcase Master GRN */
	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}
    /** @param string|null $showcaseId Showcase Master GRN */
	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}
    /**
     * @param string|null $showcaseId Showcase Master GRN
     * @return ShowcaseMaster
     */
	public function withShowcaseId(?string $showcaseId): ShowcaseMaster {
		$this->showcaseId = $showcaseId;
		return $this;
	}
    /** @return string|null Showcase name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Showcase name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Showcase name
     * @return ShowcaseMaster
     */
	public function withName(?string $name): ShowcaseMaster {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return ShowcaseMaster
     */
	public function withDescription(?string $description): ShowcaseMaster {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return ShowcaseMaster
     */
	public function withMetadata(?string $metadata): ShowcaseMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null GRN of the GS2-Schedule event that defines the sales period for the Showcase */
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}
    /** @param string|null $salesPeriodEventId GRN of the GS2-Schedule event that defines the sales period for the Showcase */
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}
    /**
     * @param string|null $salesPeriodEventId GRN of the GS2-Schedule event that defines the sales period for the Showcase
     * @return ShowcaseMaster
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): ShowcaseMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}
    /** @return array|null List of Display Items */
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}
    /** @param array|null $displayItems List of Display Items */
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}
    /**
     * @param array|null $displayItems List of Display Items
     * @return ShowcaseMaster
     */
	public function withDisplayItems(?array $displayItems): ShowcaseMaster {
		$this->displayItems = $displayItems;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return ShowcaseMaster
     */
	public function withCreatedAt(?int $createdAt): ShowcaseMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return ShowcaseMaster
     */
	public function withUpdatedAt(?int $updatedAt): ShowcaseMaster {
		$this->updatedAt = $updatedAt;
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
     * @return ShowcaseMaster
     */
	public function withRevision(?int $revision): ShowcaseMaster {
		$this->revision = $revision;
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
            ->withDisplayItems(!array_key_exists('displayItems', $data) || $data['displayItems'] === null ? null : array_map(
                function ($item) {
                    return DisplayItemMaster::fromJson($item);
                },
                $data['displayItems']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "showcaseId" => $this->getShowcaseId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
            "displayItems" => $this->getDisplayItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}